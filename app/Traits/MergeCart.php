<?php

namespace App\Traits;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

trait MergeCart
{
    protected function mergeGuestCartWithUserCart()
    {
        if (Auth::check()) {
            $sessionCart = session()->get('cart', []);
            
            if (!empty($sessionCart)) {
                foreach ($sessionCart as $productId => $item) {
                    // Check if the product already exists in user's cart
                    $existingCartItem = Cart::where('user_id', Auth::id())
                        ->where('product_id', $productId)
                        ->first();

                    if ($existingCartItem) {
                        // Update quantity if product exists
                        $existingCartItem->quantity += $item['quantity'];
                        $existingCartItem->save();
                    } else {
                        // Create new cart item if product doesn't exist
                        Cart::create([
                            'user_id' => Auth::id(),
                            'product_id' => $productId,
                            'quantity' => $item['quantity']
                        ]);
                    }
                }

                // Clear the session cart after merging
                session()->forget('cart');
            }
        }
    }
} 