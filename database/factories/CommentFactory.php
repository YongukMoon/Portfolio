<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    $userIds=\App\User::pluck('id')->toArray();
    // $articleIds=\App\Article::pluck('id')->toArray();

    return [
        'user_id'=>$faker->randomElement($userIds),
        // 'commentable_type'=>\App\Article::class,
        // 'commentable_id'=>$faker->randomElement($articleIds),
        'content'=>$faker->sentence(),
    ];
});
