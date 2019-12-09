<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClassroomsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(QuizzsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
        $this->call(AnswerUserTableSeeder::class);
        $this->call(QuizzSessionTableSeeder::class);
    }
}
