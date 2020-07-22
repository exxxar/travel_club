<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Meal;
use Faker\Generator as Faker;

$factory->define(Meal::class, function (Faker $faker) {
    return [
        'MealId' => $faker->numberBetween(-10000, 10000),
        'Name' => $faker->word,
    ];
});
