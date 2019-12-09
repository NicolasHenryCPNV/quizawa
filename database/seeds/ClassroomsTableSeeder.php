<?php

use App\Classroom;
use Illuminate\Database\Seeder;

class ClassroomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classroom::insert([
            'name' => 'invité',
        ]);
        factory(App\Classroom::class, 50)->create();
    }
}
