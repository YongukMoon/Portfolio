<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    $userIds=\App\User::pluck('id')->toArray();

    return [
        'user_id'=>$faker->randomElement($userIds),
        'title'=>$faker->sentence(),
        'content'=>$faker->paragraph(),
        'created_at'=>$faker->dateTimeBetween('-1 months'),
    ];
});
