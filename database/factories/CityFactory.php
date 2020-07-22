<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'CityId' => $faker->numberBetween(-10000, 10000),
        'Name' => $faker->word,
        'Default' => $faker->boolean,
        'DescriptionUrl' => $faker->word,
        'IsPopular' => $faker->boolean,
        'ParentId' => function () {
            return factory(\App\City::class)->create()->ParentId;
        },
    ];
});
