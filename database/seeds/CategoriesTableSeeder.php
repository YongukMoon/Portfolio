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
        $categories=config('project.categories');

        foreach(transpose_array($categories) as $slug => $names){
            \App\Shop\Category::create([
                'name'=>$names['ko'],
                'slug'=>str_slug($slug),
                'en'=>$names['en'],
                'ko'=>$names['ko'],
            ]);
        }
    }
}
