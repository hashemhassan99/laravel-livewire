<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create([
            'name' => 'web development'
        ]);
        \App\Category::create([
            'name' => 'mobile Application'
        ]);
        \App\Category::create([
            'name' => 'UI\UX'
        ]);
    }
}
