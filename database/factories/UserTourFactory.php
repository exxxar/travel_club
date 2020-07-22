<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserTour;
use Faker\Generator as Faker;

$factory->define(UserTour::class, function (Faker $faker) {
    return [
        'UserId' => factory(\App\User::class),
        'TourInfo' => '{}',
        'StartAt' => $faker->dateTime(),
        'EndAt' => $faker->dateTime(),
        'Comment' => '{}',
    ];
});
