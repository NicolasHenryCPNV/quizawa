<?php

use App\Question;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Question::class, 29)->create()->each(function ($question) {
            $question->quizz()->associate(factory(App\Quizz::class)->make());
        });
    }
}
