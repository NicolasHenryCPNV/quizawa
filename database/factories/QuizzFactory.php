<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Quizz;
use App\User;
use Faker\Generator as Faker;

$factory->define(Quizz::class, function (Faker $faker) {
    return [
        'name' => $faker->userName,
        'private' => $faker->boolean(),
        'user_id' => User::all()->random()->id,
    ];
});
