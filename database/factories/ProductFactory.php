<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstname,
        'last_name' => $faker->lastname,
        'city' => $faker->city
    ];
});
