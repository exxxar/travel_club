<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FinSecurityDocument;
use Faker\Generator as Faker;

$factory->define(FinSecurityDocument::class, function (Faker $faker) {
    return [
        'DateOfFinSecurityFrom' => $faker->word,
        'DateOfFinSecurityTo' => $faker->word,
        'DocumentDate' => $faker->word,
        'DocumentNumber' => $faker->word,
        'FinSecurityAmount' => $faker->numberBetween(-10000, 10000),
        'OrgAddress' => $faker->word,
        'OrgName' => $faker->word,
        'OrgPostAddress' => $faker->word,
        'WayToFinSecurity' => $faker->word,
        'SourseAssuranceId' => function () {
            return factory(\App\Sourseassurance::class)->create()->SourseAssuranceId;
        },
    ];
});
