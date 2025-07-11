<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'shippo' => [
        'token' => env('SHIPPO_LIVE_TOKEN'),
        'key' => env('SHIPPO_API_KEY'),
        'sendle' => env('SENDLE_CARRIER_ACCOUNT'),
        'canadapost' => env('CANADAPOST_CARRIER_ACCOUNT'),
    ],

    'stallion' => [
        'key' => env('STALLION_API_KEY_VALUE'),
        'origin_postal_code' => env('STALLION_ORIGIN_POSTAL_CODE'),
        'base' => env('STALLION_API_BASE_VALUE')
    ],

    'stripe'=>[
        'key'=>env('STRIPE_KEY_VALUE'),
        'secret'=>env('STRIPE_SECRET_VALUE'),
    ]
];
