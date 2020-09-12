<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $categories = Category::pluck('id')->toArray();
    return [
        //
        'name'        => Str::random(15),
        'description' => $faker->text(),
        'category_id' => $faker->randomElement($categories),
        'price'       => $faker->numberBetween($min = 100, $max = 1000),

    ];
});
