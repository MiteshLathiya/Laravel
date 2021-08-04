<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

// namespace App\Models\Admin\BookModel;

use App\Models\Admin\BookModel;

use Faker\Generator as Faker;

$factory->define(BookModel::class, function (Faker $faker) {
    return [
        'image'         =>$faker->image(),
        'name'          =>$faker->name(),
        'category'      =>$faker->randomElement(),
        'author'        =>$faker->name(),
        'ISBN_number'   =>$faker->randomNumber(),
        'pages'         =>$faker->numberBetween(50, 500),
        'language'      =>$faker->randomElement(['Gujarati', 'Hindi','English']),
        'description'   =>$faker->text(),
        'price'         =>$faker->numberBetween(10, 500),
        
    ];
});
