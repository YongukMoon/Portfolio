<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->boolean('notification')->default(1);
            $table->integer('view_count')->default(0);

            if(config('database.default') == 'mysql'){
                DB::statement('ALTER TABLE articles ADD FULLTEXT search(title,content)');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['notification', 'view_count']);

            if(config('database.default') == 'mysql'){
                DB::statement('DROP INDEX search ON articles');
            }
        });
    }
}
