<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],


    'google' => [
        'client_id' => env('GOOGLE_OAUTH_APP_ID'),
        'client_secret' => env('GOOGLE_OAUTH_APP_SECRET'),
        'redirect' => env('GOOGLE_OAUTH_APP_REDIRECT_URL'),
    ],
    'twitter' => [
        'client_id' => env('TWITTER_OAUTH_APP_ID'),
        'client_secret' => env('TWITTER_OAUTH_APP_SECRET'),
        'redirect' => env('TWITTER_OAUTH_APP_REDIRECT_URL'),
    ],
    'linkedin' => [
        'client_id' => env('LINKEDIN_OAUTH_APP_ID'),
        'client_secret' => env('LINKEDIN_OAUTH_APP_SECRET'),
        'redirect' => env('LINKEDIN_OAUTH_APP_REDIRECT_URL'),
    ],
];
