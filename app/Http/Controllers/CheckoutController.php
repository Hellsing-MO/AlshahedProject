<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmed;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Services\StallionExpressService;
use Stripe\StripeClient;
use Illuminate\Support\Facades\Log;
use App\Models\CheckoutSession;
use App\Models\Order;

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
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = count(session()->get('cart', []));
        }

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

        $userId = null;
        $customerEmail = null;
        // Support both logged-in and guest users
        if (Auth::check()) {
            $user = Auth::user();
            $cartItems = Cart::with('product')->where('user_id', $user->id)->get();
            $customerEmail = $user->email;
            $userId = $user->id;
        } else {
            // Build cartItems from session for guests
            $sessionCart = session()->get('cart', []);
            $cartItems = collect();
            foreach ($sessionCart as $id => $item) {
                $cartItems->push((object)[
                    'product' => \App\Models\Product::find($item['product_id']),
                    'quantity' => $item['quantity']
                ]);
            }
            $customerEmail = $validated['email'];
        }

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $cartTotal = 0;
        $weight = 0;
        $items = [];

        foreach ($cartItems as $item) {
            $product = $item->product;
            $price = floatval($product->price);
            $cartTotal += $price * $item->quantity;
            $weight += floatval($product->Weight ?? 0.5) * $item->quantity;

            $items[] = [
                "description" => $product->title,
                "sku" => "SKU{$product->id}",
                "quantity" => $item->quantity,
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

        // Prepare Stallion request
        $shippingPayload = [
            "to_address" => $validated,
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

        // Get rate
        try {
            $rateResponse = $stallion->getShippingRates($shippingPayload);

            if (!$rateResponse || !isset($rateResponse['rates']) || empty($rateResponse['rates'])) {
                return back()->with('error', 'No shipping rates found for the provided address. Please check your details and try again.');
            }

            $shippingCost = $rateResponse['rates'][0]['rate'];
        } catch (\Exception $e) {
            Log::error('Stallion Express API Error (Rates): ' . $e->getMessage(), ['payload' => $shippingPayload]);
            return back()->with('error', 'Could not retrieve shipping rates. Please try again later.');
        }
        if ($rateResponse['rates'][0]['currency'] == 'CAD'){
            $shippingCost = $shippingCost*0.73;
        }
        if($validated['country_code']=='CA' && $cartTotal >= 150){
            $shippingCost = 0;
        }
        if($validated['country_code']=='US' && $cartTotal >= 200){
            $shippingCost = 0;
        }

        return view('checkout.review', [
            'cartItems' => $cartItems,
            'cartTotal' => $cartTotal,
            'shippingCost' => $shippingCost,
            'shippingData' => $validated,
            'shippingPayload' => $shippingPayload,
        ], compact('count'));
    }

    public function processPayment(Request $request, StallionExpressService $stallion)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = count(session()->get('cart', []));
        }

        $shippingData = json_decode($request->shipping_data, true);
        $shippingCost = $request->shipping_cost;
        $shippingPayload = json_decode($request->shipping_payload, true);

        $userId = null;
        $customerEmail = null;
        // Support both logged-in and guest users
        if (Auth::check()) {
            $user = Auth::user();
            $cartItems = Cart::with('product')->where('user_id', $user->id)->get();
            $customerEmail = $user->email;
            $userId = $user->id;
        } else {
            $sessionCart = session()->get('cart', []);
            $cartItems = collect();
            foreach ($sessionCart as $id => $item) {
                $cartItems->push((object)[
                    'product' => \App\Models\Product::find($item['product_id']),
                    'quantity' => $item['quantity']
                ]);
            }
            $customerEmail = $shippingData['email'];
        }

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $cartTotal = 0;
        $lineItems = [];

        foreach ($cartItems as $item) {
            $product = $item->product;
            $price = floatval($product->price);
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

        if ( $shippingCost > 0) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => ['name' => 'Shipping'],
                    'unit_amount' => intval($shippingCost * 100),
                ],
                'quantity' => 1,
            ];
        }
        $checkoutSession = CheckoutSession::create([
            'user_id' => $userId,
            'shipping_payload' => $shippingPayload,
        ]);
        // Create Stripe session
        $stripe = new StripeClient(config('services.stripe.secret'));
        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'customer_email' => $customerEmail,
            'metadata' => [
                'user_id' => $userId,
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
        $checkoutSession->update(['stripe_session_id' => $session->id]);

        return redirect($session->url);
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

        $trackingInfo = null;
        try {
            // Add the required postage_type before creating the shipment
            $shippingPayload['postage_type'] = 'standard';

            $response = $stallion->createShipment($shippingPayload);
            if (is_array($response) && isset($response['tracking_number'])) {
                $trackingInfo = [
                    'tracking_number' => $response['tracking_number'],
                    'carrier' => $response['carrier'] ?? null,
                    'status' => $response['status'] ?? null,
                    'tracking_url' => $response['tracking_url'] ?? null,
                ];
            }
        } catch (\Exception $e) {
            Log::error('Stallion Express API Error (Shipment Creation): ' . $e->getMessage(), [
                'stripe_session_id' => $sessionId,
                'payload' => $shippingPayload
            ]);
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
            'status' => $trackingInfo ? 'paid' : 'payment_complete_shipment_failed',
            'tracking_info' => $trackingInfo,
        ]);

        // Dispatch the order confirmation email to the queue
        try {
            Mail::to($order->customer_email)->send(new OrderConfirmed($order));
        } catch (\Exception $e) {
            // Log the error if the email fails to be dispatched
            Log::error('Failed to queue order confirmation email for order ID: ' . $order->id, ['error' => $e->getMessage()]);
        }

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
}