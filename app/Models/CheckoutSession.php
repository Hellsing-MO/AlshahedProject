<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckoutSession extends Model
{
    protected $fillable = [
        'user_id',
        'stripe_session_id',
        'shipping_payload',
    ];

    protected $casts = [
        'shipping_payload' => 'array',
    ];
}
