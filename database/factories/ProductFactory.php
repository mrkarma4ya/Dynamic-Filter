<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->unique()->word(),
        'category_id' => \App\Category::inRandomOrder()->first()->id,
        'description' => $faker->paragraph(),
        'price' => rand(1000, 5000),
        // 'main_image' => $faker->imageUrl($width = 700, $height = 400)
        'main_image' => 'https://source.unsplash.com/random/700x400?sig='.rand(1,10000)
    ];
});
