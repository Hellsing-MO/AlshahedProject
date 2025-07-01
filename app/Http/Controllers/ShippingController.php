<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Services\StallionExpressService;
use Stripe\StripeClient;

class ShippingController extends Controller
{
    public function showShippingForm()
    {
        return view('shipping.form');
    }

    public function calculateShippingAndPay(Request $request, StallionExpressService $stallion)
    {
        $request->validate([
            'name' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'province_code' => 'required',
            'postal_code' => 'required',
            'country_code' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        $cartTotal = 0;
        $weight = 0;
        $lineItems = [];
        $items = [];

        foreach ($cartItems as $item) {
            $product = $item->product;
            $price = floatval($product->price);
            $cartTotal += $price * $item->quantity;
            $weight += floatval($product->Weight ?? 0.5) * $item->quantity;

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => ['name' => $product->title],
                    'unit_amount' => intval($price * 100),
                ],
                'quantity' => $item->quantity,
            ];

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
            "to_address" => [
                "name" => $request->name,
                "address1" => $request->address1,
                "city" => $request->city,
                "province_code" => $request->province_code,
                "postal_code" => $request->postal_code,
                "country_code" => $request->country_code,
                "phone" => $request->phone,
                "email" => $request->email,
                "is_residential" => true,
            ],
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
        dd($rateResponse);
        $shippingCost = $rateResponse['rates'][0]['amount'] ?? 0;

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
        $stripe = new StripeClient(config('services.stripe.secret'));

        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($session->url);
    }
}
