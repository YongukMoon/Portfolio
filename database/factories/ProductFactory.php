<?php

use Faker\Generator as Faker;

$factory->define(App\Shop\Product::class, function (Faker $faker) {
    $categoryIds=\App\Shop\Category::pluck('id')->toArray();

    return [
        'title'=>$faker->words(1, true),
        'category_id'=>$faker->randomElement($categoryIds),
        'price'=>rand(10000,100000),
        'stock'=>rand(1,10),
    ];
});
