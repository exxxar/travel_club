<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserInfo;
use Faker\Generator as Faker;

$factory->define(UserInfo::class, function (Faker $faker) {
    return [
        'FullName' => $faker->word,
        'Age' => $faker->numberBetween(-10000, 10000),
        'Sex' => $faker->numberBetween(-10000, 10000),
        'Birthday' => $faker->word,
        'Passport' => $faker->word,
    ];
});
