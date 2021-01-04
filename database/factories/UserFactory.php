<?php

declare(strict_types=1);

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

// Model Factories

/** @var Factory $factory */

$factory->define(User::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => 'secret',
        //'api_token' => str_random()
    ];
});
