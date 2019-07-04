<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(config('database.default')){
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
        }

        \App\User::truncate();
        $this->call(UsersTableSeeder::class);

        \App\Article::truncate();
        $this->call(ArticlesTableSeeder::class);

        \App\Tag::truncate();
        DB::table('article_tag')->truncate();
        $this->call(TagsTableSeeder::class);

        if(config('database.default')){
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}
