<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    return [
        'CountryId' => $faker->numberBetween(-10000, 10000),
        'Name' => $faker->word,
        'Alias' => $faker->word,
        'OriginalName' => $faker->word,
        'Flags' => $faker->numberBetween(-8, 8),
        'Rank' => $faker->numberBetween(-8, 8),
        'HasTickets' => $faker->boolean,
        'HotelIsNotInStop' => $faker->boolean,
        'IsProVisa' => $faker->boolean,
        'IsVisa' => $faker->boolean,
        'TicketsIncluded' => $faker->boolean,
    ];
});
