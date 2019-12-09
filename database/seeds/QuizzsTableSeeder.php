<?php

use Illuminate\Database\Seeder;

class QuizzsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Quizz::class, 30)->create()->each(function ($quizz) {
            $quizz->user()->associate(factory(App\User::class)->make());
        });
    }
}
