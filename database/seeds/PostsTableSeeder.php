<?php

use App\User;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =\Faker\Factory::create();

        for($i = 1; $i<= 15; $i++){
            \App\Post::create([
                'user_id' => User::inRandomOrder()->first()->id,
                'category_id' => \App\Category::inRandomOrder()->first()->id,
                'title' =>$faker->sentence(4) ,
                'body' => $faker->paragraph(),
                'image'=> sprintf("%02d", $i).'.jpg',

            ]);
        }
    }
}
