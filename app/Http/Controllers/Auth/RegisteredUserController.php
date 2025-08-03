<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\MergeCart;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    use MergeCart;

    /**
     * Display the registration view.
     */public function create(): View
    {
        // For guests, count items in session cart
        $count = count(session()->get('cart', []));
        return view('auth.register', compact('count'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Link any existing guest orders with the same email address
        $this->linkGuestOrdersToUser($user);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Link existing guest orders to the newly created user account
     */
    private function linkGuestOrdersToUser($user)
    {
        // Find orders with the same email address that don't have a user_id
        $guestOrders = \App\Models\Order::where('customer_email', $user->email)
            ->whereNull('user_id')
            ->get();

        if ($guestOrders->count() > 0) {
            // Update all matching orders to link them to this user
            \App\Models\Order::where('customer_email', $user->email)
                ->whereNull('user_id')
                ->update(['user_id' => $user->id]);

            // Show a success message to the user
            session()->flash('orders_linked', [
                'message' => "We found {$guestOrders->count()} previous order(s) with your email address and linked them to your account!",
                'count' => $guestOrders->count()
            ]);
        }
    }
}
