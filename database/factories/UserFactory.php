<?php

use App\User;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'gender' => random_int(0, 1),
        'address' => $faker->address(),
        'password' => bcrypt('admin'), // password
        'remember_token' => Str::random(10),
        'phone' => $faker->phoneNumber(),
        'firstname' => $faker->name,
        'lastname' => $faker->name
    ];
});
