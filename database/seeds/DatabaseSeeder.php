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

        $path=attachments_path();
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 775, true);
        }
        File::cleanDirectory($path);
        \App\Attachment::truncate();
        //$this->call(AttachmentsTableSeeder::class);

        \App\Comment::truncate();
        $this->call(CommentsTableSeeder::class);

        \App\Vote::truncate();
        $this->call(VotesTableSeeder::class);

        \App\Shop\Category::truncate();
        $this->call(CategoriesTableSeeder::class);

        \App\Shop\Product::truncate();
        $this->call(ProductsTableSeeder::class);

        if(config('database.default')){
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}
