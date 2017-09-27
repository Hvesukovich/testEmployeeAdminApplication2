<?php

use Faker\Generator as Faker;

$factory->define(App\Admins::class, function (Faker $faker) {
    static $password;
    return [
        'login' => $faker->unique()->firstName,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


