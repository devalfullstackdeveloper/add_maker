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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '627417762038-a838j88peqrju91gbt1iuquh3qd8irri.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/index',
        ],

        "apple" => [
            "client_id" => "<your_client_id>",
            "client_secret" => "<your_client_secret>",
        ],   

        'facebook' => [
            'client_id' => '582030087310098',
            'client_secret' => 'cfe6940466a5a0fda8b755589e0eb0fc',
            'redirect' => 'https://127.0.0.1:8000/index',
        ],
    
];
