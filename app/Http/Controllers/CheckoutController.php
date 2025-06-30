<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use Stripe\StripeClient;

class CheckoutController extends Controller
{
    public function showCheckoutForm(Request $request)
    {
        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        return view('checkout', compact('cartItems'));
    }

    public function processCheckout(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'province_code' => 'required',
            'postal_code' => 'required',
            'country_code' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'shipping_cost' => 'required|numeric'
        ]);

        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();
        $lineItems = [];

        $cartTotal = 0;

        foreach ($cartItems as $item) {
            $product = $item->product;
            $unitAmount = floatval($product->price) * 100;

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->title,
                    ],
                    'unit_amount' => intval($unitAmount),
                ],
                'quantity' => $item->quantity,
            ];

            $cartTotal += floatval($product->price) * $item->quantity;
        }

        // Add shipping as a line item if it's not free
        if ($cartTotal < 150 && $request->shipping_cost > 0) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Shipping',
                    ],
                    'unit_amount' => intval($request->shipping_cost * 100),
                ],
                'quantity' => 1,
            ];
        }

        $stripe = new StripeClient(env('STRIPE_SECRET'));

        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($session->url);
    }

    public function checkoutSuccess(Request $request)
    {
        $session_id = $request->get('session_id');
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        $session = $stripe->checkout->sessions->retrieve($session_id);

        Cart::where('user_id', Auth::id())->delete();

        return view('checkout/success');
    }

    public function checkoutCancel()
    {
        return view('checkout/cancel');
    }
}
