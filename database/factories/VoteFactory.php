<?php

use Faker\Generator as Faker;

$factory->define(App\Vote::class, function (Faker $faker) {
    $userIds=\App\User::pluck('id')->toArray();
    $up=$faker->randomElement([true, false]);
    
    return [
        'user_id'=>$faker->randomElement($userIds),
        'up'=>$up,
        'down'=>!$up,
        'voted_at'=>$faker->dateTimeBetween('-1 months'),
    ];
});
