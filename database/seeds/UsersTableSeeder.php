<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'email' => 'nicolas.henry@cpnv.ch',
            'password' => bcrypt('secret'),
            'pseudo' => 'Nawakine',
            'firstname' => 'Nicolas',
            'lastname' => 'Henry',
            'api_token' => Str::random(80),
            'admin' => true,
            'creator' => false,
            'classroom_id' => 1,
        ]);
        User::insert([
            'email' => 'alexandre.junod@cpnv.ch',
            'password' => bcrypt('secret'),
            'pseudo' => 'Alex',
            'firstname' => 'Alexandre',
            'lastname' => 'Junod',
            'api_token' => Str::random(80),
            'admin' => true,
            'creator' => false,
            'classroom_id' => 1,
        ]);
        
        factory(App\User::class, 29)->create();

    }
}