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
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
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

    'production_sync' => [
        'url' => env('PROD_WEBHOOK_URL', 'https://tonightonscreen.com/api/webhooks/sync'),
        'secret' => env('WEBHOOK_SECRET', 'tos_live_sync_secret_key_2026'),
        'enabled' => env('SYNC_TO_PRODUCTION', true),
        'auto_sync' => env('SYNC_ON_SAVE', true),
        'timeout' => (int) env('SYNC_TIMEOUT', 60),
    ],

];
