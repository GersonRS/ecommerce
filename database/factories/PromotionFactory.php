<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promotion;
use Faker\Generator as Faker;

$factory->define(Promotion::class, function (Faker $faker) {
    return [
        'value' => $faker->randomFloat(2, 10, 50),
        'active' => $faker->boolean(50),
    ];
});
