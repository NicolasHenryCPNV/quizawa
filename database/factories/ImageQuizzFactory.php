<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ImageQuizz;
use App\Quizz;
use Faker\Generator as Faker;

$factory->define(ImageQuizz::class, function (Faker $faker) {
    return [
        'url' => $faker->imageUrl(200, 200, 'cats'),
        'quizz_id' => Quizz::all()->random()->id,
    ];
});
