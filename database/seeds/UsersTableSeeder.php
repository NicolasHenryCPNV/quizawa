<?php

use App\User;
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
        ]);

        factory(App\User::class, 30)->create();
        /* factory(App\User::class, 50)->create()->each(function ($user) {
            $user->posts()->save(factory(App\Post::class)->make());
        }); */
    }
}
