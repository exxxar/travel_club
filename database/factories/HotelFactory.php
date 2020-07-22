<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hotel;
use Faker\Generator as Faker;

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        'HotelId' => $faker->numberBetween(-10000, 10000),
        'Name' => $faker->word,
        'CommonRate' => $faker->numberBetween(-10000, 10000),
        'IsInBonusProgram' => $faker->boolean,
        'PhotosCount' => $faker->numberBetween(-10000, 10000),
        'PopularityLevel' => $faker->numberBetween(-10000, 10000),
        'Rate' => $faker->randomFloat(0, 0, 9999999999.),
        'SearchCount' => $faker->numberBetween(-10000, 10000),
        'StarId' => function () {
            return factory(\App\Hotelstar::class)->create()->StarId;
        },
        'StarName' => $faker->word,
        'TownId' => function () {
            return factory(\App\Town::class)->create()->TownId;
        },
    ];
});
