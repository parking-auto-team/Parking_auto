<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'client' => [
            'driver' => 'session',
            'provider' => 'clients',
        ],

        'gerant' => [
            'driver' => 'session',
            'provider' => 'gerants',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'clients' => [
            'driver' => 'eloquent',
            'model' => App\Models\Client::class,
        ],

        'gerants' => [
            'driver' => 'eloquent',
            'model' => App\Models\Gerant::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'gerants' => [
        'provider' => 'gerants',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
    ],

    'clients' => [
        'provider' => 'clients',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,
];
