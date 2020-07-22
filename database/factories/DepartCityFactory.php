<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DepartCity;
use Faker\Generator as Faker;

$factory->define(DepartCity::class, function (Faker $faker) {
    return [
        'DepartCityId' => $faker->numberBetween(-10000, 10000),
        'Name' => $faker->word,
        'CountryId' => function () {
            return factory(\App\Country::class)->create()->CountryId;
        },
        'Default' => $faker->boolean,
        'DescriptionUrl' => $faker->word,
        'IsPopular' => $faker->boolean,
        'OriginalName' => $faker->word,
        'ParentId' => function () {
            return factory(\App\DepartCity::class)->create()->ParentId;
        },
    ];
});
