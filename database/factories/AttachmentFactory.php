<?php

use Faker\Generator as Faker;

$factory->define(App\Attachment::class, function (Faker $faker) {
    $articleIds=\App\Article::pluck('id')->toArray();
    $path=$faker->image(attachments_path());

    return [
        'article_id'=>$faker->randomElement($articleIds),
        'filename'=>File::basename($path),
        'bytes'=>File::size($path),
        'mime'=>File::mimeType($path),
        //'created_at'=>$faker->dateTimeBetween('-1 months'),
    ];
});
