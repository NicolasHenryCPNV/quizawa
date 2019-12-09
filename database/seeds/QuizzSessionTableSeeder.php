<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizzSessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quizz_session')->insert(
            [
                'started_at' => now(),
                'ended_at' =>now(),
                'classroom_id' => factory(App\Classroom::class)->create()->id,
                'quizz_id' => factory(App\Quizz::class)->create()->id,
            ]
        );
    }
}
