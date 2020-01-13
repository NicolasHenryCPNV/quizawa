<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Classroom;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
        'password' => bcrypt('secret'), // secret
        'api_token' => Str::random(80),
        'remember_token' => Str::random(10),
        'pseudo' => $faker->firstName,
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'admin' => $faker->boolean(),
        'creator' => $faker->boolean(),
        'classroom_id' => Classroom::all()->random()->id,
    ];
});
