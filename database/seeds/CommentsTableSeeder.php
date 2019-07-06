<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles=\App\Article::all();

        //부모댓글
        $articles->each(function($article){
            $article->comments()->save(factory(\App\Comment::class)->make());
            $article->comments()->save(factory(\App\Comment::class)->make());
        });

        $faker=app(Faker\Generator::class);

        //자식댓글
        $articles->each(function($article)use($faker){
            $commentIds=$article->comments->pluck('id')->toArray();

            foreach(range(1,5) as $index){
                $article->comments()->save(
                    factory(App\Comment::class)->make([
                        'parent_id'=>$faker->randomElement($commentIds),
                    ])
                );
            }
        });
    }
}
