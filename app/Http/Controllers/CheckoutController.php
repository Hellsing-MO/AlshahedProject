<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Services\StallionExpressService;
use Stripe\StripeClient;
use Stripe\Exception\ApiErrorException;
use App\Models\CheckoutSession;
use App\Models\Order;
use Exception;

class CheckoutController extends Controller
{
    public function showShippingForm()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = count(session()->get('cart', []));
        }
        // Support both logged-in and guest users
        if (Auth::check()) {
            $user = Auth::user();
            $cartCount = Cart::where('user_id', $user->id)->count();
        } else {
            $cartCount = count(session()->get('cart', []));
        }
        if ($cartCount === 0) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }
        return view('checkout.shipping', compact('count'));
    }

    public function calculateShipping(Request $request, StallionExpressService $stallion)
    {
        try {
            // Get cart count for view
            $count = $this->getCartCount();

            // Validate shipping information
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'address1' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'province_code' => 'required|string|size:2',
                'postal_code' => 'required|string|max:10',
                'country_code' => 'required|string|size:2',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255',
            ]);

            Log::info('Calculating shipping for order', [
                'user_id' => Auth::id(),
                'destination' => $validated['city'] . ', ' . $validated['province_code'],
                'country' => $validated['country_code']
            ]);

            // Get cart items with error handling
            $cartData = $this->getCartItemsWithValidation();
            if (!$cartData['success']) {
                return redirect()->route('cart')->with('error', $cartData['message']);
            }

            $cartItems = $cartData['items'];
            $customerEmail = $cartData['email'] ?? $validated['email'];
            $userId = $cartData['user_id'];

            // Calculate totals and prepare shipping items
            $calculationResult = $this->calculateCartTotalsAndItems($cartItems);
            if (!$calculationResult['success']) {
                Log::error('Cart calculation failed', ['error' => $calculationResult['message']]);
                return redirect()->route('cart')->with('error', $calculationResult['message']);
            }

            $cartTotal = $calculationResult['total'];
            $weight = $calculationResult['weight'];
            $items = $calculationResult['items'];

            // Prepare Stallion shipping payload
            $shippingPayload = [
                "to_address" => array_merge($validated, ['is_residential' => true]),
                "is_return" => false,
                "weight_unit" => "lbs",
                "weight" => max($weight, 0.5),
                "length" => 9,
                "width" => 12,
                "height" => 1,
                "size_unit" => "cm",
                "items" => $items,
                "package_type" => "Parcel",
                "signature_confirmation" => true,
                "insured" => true,
                "tax_identifier" => [
                    "tax_type" => "IOSS",
                    "number" => "IM1234567890",
                    "issuing_authority" => "GB"
                ]
            ];

            // Get shipping rates with error handling
            try {
                Log::info('Requesting shipping rates from StallionExpress', [
                    'weight' => $weight,
                    'destination' => $validated['country_code']
                ]);

                $rateResponse = $stallion->getShippingRates($shippingPayload);
                
                if (!$rateResponse || !isset($rateResponse['rates']) || empty($rateResponse['rates'])) {
                    Log::error('No shipping rates returned from StallionExpress', [
                        'payload' => $shippingPayload,
                        'response' => $rateResponse
                    ]);
                    return redirect()->route('cart')->with('error', 'Unable to calculate shipping rates. Please try again or contact support.');
                }

                $shippingCost = $rateResponse['rates'][0]['rate'] ?? 0;
                
                // Currency conversion if needed
                if (isset($rateResponse['rates'][0]['currency']) && $rateResponse['rates'][0]['currency'] == 'CAD') {
                    $shippingCost = $shippingCost * 0.73; // Convert CAD to USD
                }
                
                // Apply free shipping rules
                if ($validated['country_code'] == 'CA' && $cartTotal >= 150) {
                    $shippingCost = 0;
                    Log::info('Free shipping applied for Canadian order over $150');
                }
                if ($validated['country_code'] == 'US' && $cartTotal >= 200) {
                    $shippingCost = 0;
                    Log::info('Free shipping applied for US order over $200');
                }

                Log::info('Shipping calculation completed', [
                    'cart_total' => $cartTotal,
                    'shipping_cost' => $shippingCost,
                    'free_shipping_applied' => $shippingCost == 0
                ]);

                return view('checkout.review', [
                    'cartItems' => $cartItems,
                    'cartTotal' => $cartTotal,
                    'shippingCost' => $shippingCost,
                    'shippingData' => $validated,
                    'shippingPayload' => $shippingPayload,
                ], compact('count'));

            } catch (Exception $e) {
                Log::error('StallionExpress API error during rate calculation', [
                    'error' => $e->getMessage(),
                    'payload' => $shippingPayload
                ]);
                return redirect()->route('cart')->with('error', 'Shipping service temporarily unavailable. Please try again later.');
            }

        } catch (Exception $e) {
            Log::error('General error in calculateShipping', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id()
            ]);
            return redirect()->route('cart')->with('error', 'An error occurred while calculating shipping. Please try again.');
        }
    }

    public function processPayment(Request $request, StallionExpressService $stallion)
    {
        try {
            // Get cart count for view
            $count = $this->getCartCount();

            // Validate payment request data
            $request->validate([
                'shipping_data' => 'required|json',
                'shipping_cost' => 'required|numeric|min:0',
                'shipping_payload' => 'required|json'
            ]);

            $shippingData = json_decode($request->shipping_data, true);
            $shippingCost = floatval($request->shipping_cost);
            $shippingPayload = json_decode($request->shipping_payload, true);

            if (!$shippingData || !$shippingPayload) {
                Log::error('Invalid shipping data in payment process', [
                    'shipping_data' => $request->shipping_data,
                    'shipping_payload' => $request->shipping_payload
                ]);
                return redirect()->route('checkout.shipping')->with('error', 'Invalid shipping information. Please try again.');
            }

            Log::info('Processing payment', [
                'user_id' => Auth::id(),
                'shipping_cost' => $shippingCost
            ]);

            // Get cart items with validation
            $cartData = $this->getCartItemsWithValidation();
            if (!$cartData['success']) {
                return redirect()->route('cart')->with('error', $cartData['message']);
            }

            $cartItems = $cartData['items'];
            $customerEmail = $cartData['email'] ?? $shippingData['email'];
            $userId = $cartData['user_id'];

            // Calculate cart totals and line items for Stripe
            $cartTotal = 0;
            $lineItems = [];

            foreach ($cartItems as $item) {
                $product = $item->product;
                if (!$product) {
                    Log::error('Product not found during payment processing', ['item' => $item]);
                    return redirect()->route('cart')->with('error', 'Some items in your cart are no longer available.');
                }
                
                $price = floatval($product->price);
                if ($price <= 0) {
                    Log::error('Invalid product price during payment', ['product_id' => $product->id, 'price' => $price]);
                    return redirect()->route('cart')->with('error', 'Invalid product pricing. Please contact support.');
                }
                
                $cartTotal += $price * $item->quantity;

                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => ['name' => $product->title],
                        'unit_amount' => intval($price * 100),
                    ],
                    'quantity' => $item->quantity,
                ];
            }

            // Add shipping cost if applicable
            if ($shippingCost > 0) {
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => ['name' => 'Shipping'],
                        'unit_amount' => intval($shippingCost * 100),
                    ],
                    'quantity' => 1,
                ];
            }

            // Create checkout session record
            try {
                $checkoutSession = CheckoutSession::create([
                    'user_id' => $userId,
                    'shipping_payload' => $shippingPayload,
                ]);
            } catch (Exception $e) {
                Log::error('Failed to create checkout session', ['error' => $e->getMessage()]);
                return redirect()->route('cart')->with('error', 'Unable to process checkout. Please try again.');
            }

            // Create Stripe session with error handling
            try {
                $stripe = new StripeClient(config('services.stripe.secret'));
                
                $session = $stripe->checkout->sessions->create([
                    'payment_method_types' => ['card'],
                    'line_items' => $lineItems,
                    'mode' => 'payment',
                    'customer_email' => $customerEmail,
                    'metadata' => [
                        'user_id' => $userId ?? '',
                        'shipping_name' => $shippingData['name'],
                        'shipping_address' => $shippingData['address1'],
                        'shipping_city' => $shippingData['city'],
                        'shipping_province' => $shippingData['province_code'],
                        'shipping_postal_code' => $shippingData['postal_code'],
                        'shipping_country' => $shippingData['country_code'],
                        'shipping_phone' => $shippingData['phone'],
                    ],
                    'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
                    'cancel_url' => route('checkout.cancel'),
                ]);
                
                // Update checkout session with Stripe session ID
                $checkoutSession->update(['stripe_session_id' => $session->id]);

                Log::info('Stripe session created successfully', [
                    'session_id' => $session->id,
                    'user_id' => $userId,
                    'total_amount' => $session->amount_total
                ]);

                return redirect($session->url);
                
            } catch (ApiErrorException $e) {
                Log::error('Stripe API error during payment processing', [
                    'error' => $e->getMessage(),
                    'user_id' => $userId
                ]);
                return redirect()->route('cart')->with('error', 'Payment service temporarily unavailable. Please try again later.');
            } catch (Exception $e) {
                Log::error('Unexpected error during Stripe session creation', [
                    'error' => $e->getMessage(),
                    'user_id' => $userId
                ]);
                return redirect()->route('cart')->with('error', 'An error occurred while processing payment. Please try again.');
            }

        } catch (Exception $e) {
            Log::error('General error in processPayment', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id()
            ]);
            return redirect()->route('cart')->with('error', 'An error occurred during checkout. Please try again.');
        }
    }

    public function success(Request $request,StallionExpressService $stallion)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = count(session()->get('cart', []));
        }
        $sessionId = $request->query('session_id');
        
        if (!$sessionId) {
            return redirect()->route('home')->with('error', 'Invalid session');
        }

        $stripe = new StripeClient(config('services.stripe.secret'));
        $session = $stripe->checkout->sessions->retrieve($sessionId);
        $checkoutSession = CheckoutSession::where('stripe_session_id', $sessionId)->firstOrFail();
        $shippingPayload = $checkoutSession->shipping_payload;
        // Here you would typically create an order record in your database
        // Clear the user's cart
        if (Auth::check()) {
            Cart::where('user_id', Auth::id())->delete();
        } else {
            session()->forget('cart');
        }

        $response = $stallion->createShipment($shippingPayload);
        $trackingInfo = null;
        if (is_array($response) && isset($response['tracking_number'])) {
            $trackingInfo = [
                'tracking_number' => $response['tracking_number'],
                'carrier' => $response['carrier'] ?? null,
                'status' => $response['status'] ?? null,
                'tracking_url' => $response['tracking_url'] ?? null,
            ];
        }

        // --- ORDER CREATION ---
        $userId = Auth::id();
        $customerName = $session->metadata->shipping_name;
        $customerEmail = $session->customer_email;
        $shippingAddress = [
            'address1' => $session->metadata->shipping_address,
            'city' => $session->metadata->shipping_city,
            'province' => $session->metadata->shipping_province,
            'postal_code' => $session->metadata->shipping_postal_code,
            'country' => $shippingPayload['to_address']['country_code'] ?? '',
            'phone' => $shippingPayload['to_address']['phone'] ?? '',
        ];
        // Get products from the original cart/shipping payload
        $products = [];
        if (!empty($shippingPayload['items'])) {
            foreach ($shippingPayload['items'] as $item) {
                // Try to get the product image
                $productModel = \App\Models\Product::where('title', $item['description'])->first();
                $image = $productModel ? $productModel->image : null;
                $products[] = array_merge($item, ['image' => $image]);
            }
        }
        $total = $session->amount_total / 100;
        $order = Order::create([
            'user_id' => $userId,
            'customer_name' => $customerName,
            'customer_email' => $customerEmail,
            'shipping_address' => $shippingAddress,
            'products' => $products,
            'total' => $total,
            'stripe_session_id' => $sessionId,
            'status' => 'paid',
            'tracking_info' => $trackingInfo,
        ]);

        return view('checkout.success', [
            'order' => $order,
            'orderTotal' => $total,
            'shippingName' => $customerName,
            'shippingAddress' => $session->metadata->shipping_address,
            'shippingCity' => $session->metadata->shipping_city,
            'shippingProvince' => $session->metadata->shipping_province,
            'shippingPostalCode' => $session->metadata->shipping_postal_code
        ], compact('count'));
    }

    public function cancel()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = count(session()->get('cart', []));
        }
        return view('checkout.cancel', compact('count'));
    }

    /**
     * Get cart count for both authenticated and guest users
     */
    private function getCartCount()
    {
        if (Auth::id()) {
            return Cart::where('user_id', Auth::id())->count();
        } else {
            return count(session()->get('cart', []));
        }
    }

    /**
     * Get cart items with validation for both authenticated and guest users
     */
    private function getCartItemsWithValidation()
    {
        try {
            if (Auth::check()) {
                $user = Auth::user();
                $cartItems = Cart::with('product')->where('user_id', $user->id)->get();
                
                if ($cartItems->isEmpty()) {
                    return [
                        'success' => false,
                        'message' => 'Your cart is empty.'
                    ];
                }
                
                // Validate that all products still exist
                foreach ($cartItems as $item) {
                    if (!$item->product) {
                        return [
                            'success' => false,
                            'message' => 'Some items in your cart are no longer available.'
                        ];
                    }
                }
                
                return [
                    'success' => true,
                    'items' => $cartItems,
                    'email' => $user->email,
                    'user_id' => $user->id
                ];
            } else {
                // Handle guest cart from session
                $sessionCart = session()->get('cart', []);
                
                if (empty($sessionCart)) {
                    return [
                        'success' => false,
                        'message' => 'Your cart is empty.'
                    ];
                }
                
                $cartItems = collect();
                foreach ($sessionCart as $id => $item) {
                    $product = \App\Models\Product::find($item['product_id']);
                    if (!$product) {
                        return [
                            'success' => false,
                            'message' => 'Some items in your cart are no longer available.'
                        ];
                    }
                    
                    $cartItems->push((object)[
                        'product' => $product,
                        'quantity' => $item['quantity']
                    ]);
                }
                
                return [
                    'success' => true,
                    'items' => $cartItems,
                    'email' => null,
                    'user_id' => null
                ];
            }
        } catch (Exception $e) {
            Log::error('Error getting cart items', ['error' => $e->getMessage()]);
            return [
                'success' => false,
                'message' => 'Unable to load cart items. Please try again.'
            ];
        }
    }

    /**
     * Calculate cart totals and prepare items for shipping
     */
    private function calculateCartTotalsAndItems($cartItems)
    {
        try {
            $cartTotal = 0;
            $weight = 0;
            $items = [];

            foreach ($cartItems as $item) {
                $product = $item->product;
                
                if (!$product) {
                    return [
                        'success' => false,
                        'message' => 'Invalid product in cart.'
                    ];
                }
                
                $price = floatval($product->price);
                if ($price <= 0) {
                    return [
                        'success' => false,
                        'message' => 'Invalid product price for: ' . $product->title
                    ];
                }
                
                $quantity = intval($item->quantity);
                if ($quantity <= 0) {
                    return [
                        'success' => false,
                        'message' => 'Invalid quantity for: ' . $product->title
                    ];
                }
                
                $cartTotal += $price * $quantity;
                $weight += floatval($product->Weight ?? 0.5) * $quantity;

                $items[] = [
                    "description" => $product->title,
                    "sku" => "SKU{$product->id}",
                    "quantity" => $quantity,
                    "value" => $price,
                    "currency" => "CAD",
                    "country_of_origin" => "CA",
                    "hs_code" => "123456",
                    "manufacturer_name" => "Honey Supplier",
                    "manufacturer_address1" => "123 Bee Lane",
                    "manufacturer_city" => "Toronto",
                    "manufacturer_province_code" => "ON",
                    "manufacturer_postal_code" => "M5V 2H1",
                    "manufacturer_country_code" => "CA",
                ];
            }

            return [
                'success' => true,
                'total' => $cartTotal,
                'weight' => $weight,
                'items' => $items
            ];
        } catch (Exception $e) {
            Log::error('Error calculating cart totals', ['error' => $e->getMessage()]);
            return [
                'success' => false,
                'message' => 'Unable to calculate cart totals. Please try again.'
            ];
        }
    }
}