<?php

declare(strict_types=1);

use App\Models\User;

return [

    // Authentication Defaults

    'defaults' => [
        'guard' => 'api',
    ],

    // Authentication Guards

    'guards' => [
        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
    ],

    // User Providers

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => User::class,
        ]
    ],

    // Resetting Passwords

    'passwords' => [
        //
    ],

];
