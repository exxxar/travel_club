<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TourDate;
use Faker\Generator as Faker;

$factory->define(TourDate::class, function (Faker $faker) {
    return [
        'date' => $faker->word,
    ];
});
