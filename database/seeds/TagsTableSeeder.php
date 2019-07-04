<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags=config('project.tags');

        foreach($tags as $slug => $name){
            \App\Tag::create([
                'name'=>$name,
                'slug'=>str_slug($slug),
            ]);
        }

        $articles=\App\Article::all();
        $faker=app(Faker\Generator::class);

        foreach($articles as $article){
            $article->tags()->sync(
                $faker->randomElement(
                    \App\Tag::pluck('id')->toArray(), rand(1, 7)
                )
            );
        }
    }
}