<?php

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
        \App\User::create([
            'name' => 'hashem',
            'email' => 'hashem@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        \App\User::create([
            'name' => 'mohammed',
            'email' => 'mohammed@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        \App\User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
