<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\HotelStar;
use Faker\Generator as Faker;

$factory->define(HotelStar::class, function (Faker $faker) {
    return [
        'HotelStarsId' => $faker->numberBetween(-10000, 10000),
        'Name' => $faker->word,
    ];
});
