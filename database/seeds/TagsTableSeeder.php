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

        foreach(transpose_array($tags) as $slug => $names){
            \App\Tag::create([
                'name'=>$names['ko'],
                'ko'=>$names['ko'],
                'en'=>$names['en'],
                'slug'=>str_slug($slug),
            ]);
        }

        $articles=\App\Article::all();
        $faker=app(Faker\Generator::class);

        foreach($articles as $article){
            $article->tags()->sync(
                $faker->randomElements(
                    \App\Tag::pluck('id')->toArray(), rand(1,3)
                )
            );
        }
    }
}
