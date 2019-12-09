<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'question' => $faker->text(10). ' ?',
        'image' => $faker->imageUrl(200, 200, 'cats'),
    ];
});
