<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Google Analytics Configuration
    |--------------------------------------------------------------------------
    */
    'google_analytics' => [
        'measurement_id' => env('GA_MEASUREMENT_ID', 'G-XXXXXXXXXX'),
        'enabled' => env('GA_ENABLED', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Facebook Pixel Configuration
    |--------------------------------------------------------------------------
    */
    'facebook_pixel' => [
        'pixel_id' => env('FB_PIXEL_ID', 'XXXXXXXXXXXXXXX'),
        'enabled' => env('FB_PIXEL_ENABLED', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Google Tag Manager Configuration
    |--------------------------------------------------------------------------
    */
    'gtm' => [
        'container_id' => env('GTM_CONTAINER_ID', 'GTM-XXXXXXX'),
        'enabled' => env('GTM_ENABLED', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Hotjar Configuration
    |--------------------------------------------------------------------------
    */
    'hotjar' => [
        'site_id' => env('HOTJAR_SITE_ID', 'XXXXXXX'),
        'enabled' => env('HOTJAR_ENABLED', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Events Configuration
    |--------------------------------------------------------------------------
    */
    'events' => [
        'purchase_value' => 97.00,
        'currency' => 'BRL',
        'product_name' => 'Laravel ProStarter',
    ],
];
