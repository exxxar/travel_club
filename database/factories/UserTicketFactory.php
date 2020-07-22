<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserTicket;
use Faker\Generator as Faker;

$factory->define(UserTicket::class, function (Faker $faker) {
    return [
        'UserId' => factory(\App\User::class),
        'TourId' => factory(\App\UserTour::class),
        'TicketInfo' => '{}',
        'TotalPayment' => $faker->randomFloat(0, 0, 9999999999.),
        'CurrentPayment' => $faker->randomFloat(0, 0, 9999999999.),
        'ContactPhone' => $faker->word,
        'DepartureAt' => $faker->dateTime(),
        'DepartureFrom' => $faker->word,
        'deleted_at' => $faker->dateTime(),
    ];
});
