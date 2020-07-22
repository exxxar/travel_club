<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SourseAssurance;
use Faker\Generator as Faker;

$factory->define(SourseAssurance::class, function (Faker $faker) {
    return [
        'Name' => $faker->word,
        'NameShort' => $faker->word,
        'Number' => $faker->word,
        'PhysicalAddress' => $faker->word,
        'PostAddress' => $faker->word,
        'Site' => $faker->word,
    ];
});
