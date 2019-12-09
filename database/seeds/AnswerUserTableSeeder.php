<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answer_user')->insert(
            [
                'user_id' => factory(App\User::class)->create()->id,
                'answer_id' => factory(App\Answer::class)->create()->id,
            ]
        );
    }
}
