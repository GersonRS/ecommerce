<?php

/** @var Factory $factory */

use App\Establishment;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Establishment::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'name' => $faker->company,
        'description' => $faker->sentence,
        'type' => $faker->randomElement(['restaurant', 'lunch', 'marketplace', 'drugstore']),
        'address' => $faker->address,
        'number' => $faker->randomDigit,
        'phone' => $faker->phoneNumber,
        'image' =>$faker->imageUrl(640,480,'business',true,'Faker'),
        'thumbnail' =>$faker->imageUrl(200,200,'business',true,'Faker'),
        'delivery_fee' =>$faker->randomFloat(2, 4, 8),
        'minimum_value' =>$faker->randomFloat(2, 10, 20),
        'active' => $faker->boolean(100)
    ];
});
