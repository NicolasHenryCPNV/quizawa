<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Quizz;
use App\Classroom;
use App\User;
use Faker\Generator as Faker;

$factory->define(Quizz::class, function (Faker $faker) {
    return [
        'title' => $faker->userName,
        'description' => $faker->boolean(),
        'image' => Classroom::all()->random()->id,
        'active' => Classroom::all()->random()->id,
        'user_id' => User::all()->random()->id,
    ];
});
