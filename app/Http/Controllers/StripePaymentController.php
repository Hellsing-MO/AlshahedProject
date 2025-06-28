<?php
      
namespace App\Http\Controllers;
       
use Illuminate\Http\Request;
use Stripe;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
       
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe($value): View
    {
        return view('stripe', compact('value'));
    }
      
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request, $value): RedirectResponse
    {
        $stripe = new  Stripe\StripeClient(env('STRIPE_SECRET'));
      
        $charge =  $stripe->charges->create([
                "amount" => $value * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
                
        return back()
                ->with('success', 'Payment successful!');
    }
}