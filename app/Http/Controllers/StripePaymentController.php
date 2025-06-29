<?php
      
namespace App\Http\Controllers;
       
use Illuminate\Http\Request;
use Stripe\StripeClient;
use Illuminate\Support\Facades\Config;
       
class StripePaymentController extends Controller
{
    public function stripe()
{
    return view('stripe');
}

public function stripeCheckout(Request $request)
{
    $stripe = new StripeClient(env('STRIPE_SECRET'));

    $session = $stripe->checkout->sessions->create([
        'success_url' => route('stripe.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => route('stripe.index'),
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => $request->product,
                ],
                'unit_amount' => $request->price * 100,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
    ]);

    return redirect($session->url);
}

public function stripeCheckoutSuccess(Request $request)
{
    $stripe = new StripeClient(env('STRIPE_SECRET'));
    $session = $stripe->checkout->sessions->retrieve($request->session_id);

    // You can add logic here to handle the successful payment, such as updating order status

    return view('success', ['session' => $session]);
}
}