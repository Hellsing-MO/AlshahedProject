<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_email',
        'shipping_address',
        'products',
        'total',
        'stripe_session_id',
        'status',
        'tracking_info',
    ];

    protected $casts = [
        'shipping_address' => 'array',
        'products' => 'array',
        'tracking_info' => 'array',
    ];

    //
}
