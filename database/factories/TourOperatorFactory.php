<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TourOperator;
use Faker\Generator as Faker;

$factory->define(TourOperator::class, function (Faker $faker) {
    return [
        'TourOperatorId' => $faker->numberBetween(-10000, 10000),
        'Name' => $faker->word,
        'Enabled' => $faker->boolean,
    ];
});
