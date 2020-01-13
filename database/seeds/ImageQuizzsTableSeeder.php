<?php

use Illuminate\Database\Seeder;

class ImageQuizzsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ImageQuizz::class, 30)->create();
    }
}
