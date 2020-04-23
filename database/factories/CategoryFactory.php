<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Establishment;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'image' =>$faker->imageUrl(640,480,'food',true,'Faker'),
        'establishment_id' => Establishment::all()->random()->id,
        'active' => $faker->boolean(50),
        'order' => $faker->randomDigit
    ];
});
