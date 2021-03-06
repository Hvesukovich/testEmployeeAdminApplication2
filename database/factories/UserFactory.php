<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'DateOfBirth' => $faker->date(),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'address' => $faker->address,
        'img' => '../../images/holder.jpg',
        'remember_token' => str_random(10),
    ];
});
