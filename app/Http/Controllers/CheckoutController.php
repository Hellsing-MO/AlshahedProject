<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Services\StallionExpressService;
use Stripe\StripeClient;

class CheckoutController extends Controller
{
    public function showShippingForm()
    {
        $user = Auth::user();
        if (Cart::where('user_id', $user->id)->count() === 0) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }
        
        return view('checkout.shipping');
    }

    public function calculateShipping(Request $request, StallionExpressService $stallion)
    {
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

        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

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
        $rateResponse = $stallion->getShippingRates($shippingPayload);
        $shippingCost = $rateResponse['rates'][0]['amount'] ?? 0;

        return view('checkout.review', [
            'cartItems' => $cartItems,
            'cartTotal' => $cartTotal,
            'shippingCost' => $shippingCost,
            'shippingData' => $validated
        ]);
    }

    public function processPayment(Request $request, StallionExpressService $stallion)
    {
        $shippingData = json_decode($request->shipping_data, true);
        $shippingCost = $request->shipping_cost;
        
        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

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

        if ($cartTotal < 150 && $shippingCost > 0) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => ['name' => 'Shipping'],
                    'unit_amount' => intval($shippingCost * 100),
                ],
                'quantity' => 1,
            ];
        }

        // Create Stripe session
        $stripe = new StripeClient(env('STRIPE_SECRET'));
dd('hi');
        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'customer_email' => $shippingData['email'],
            'metadata' => [
                'user_id' => $user->id,
                'shipping_name' => $shippingData['name'],
                'shipping_address' => $shippingData['address1'],
                'shipping_city' => $shippingData['city'],
                'shipping_province' => $shippingData['province_code'],
                'shipping_postal_code' => $shippingData['postal_code'],
                'shipping_country' => $shippingData['country_code'],
                'shipping_phone' => $shippingData['phone']
            ],
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');
        
        if (!$sessionId) {
            return redirect()->route('home')->with('error', 'Invalid session');
        }

        $stripe = new StripeClient(env('STRIPE_SECRET'));
        $session = $stripe->checkout->sessions->retrieve($sessionId);
        
        // Here you would typically create an order record in your database
        // Clear the user's cart
        Cart::where('user_id', Auth::id())->delete();

        return view('checkout.success', [
            'orderTotal' => $session->amount_total / 100,
            'shippingName' => $session->metadata->shipping_name,
            'shippingAddress' => $session->metadata->shipping_address,
            'shippingCity' => $session->metadata->shipping_city,
            'shippingProvince' => $session->metadata->shipping_province,
            'shippingPostalCode' => $session->metadata->shipping_postal_code
        ]);
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }
}