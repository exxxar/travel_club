<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class TourOperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\TourOperator::truncate();

        $countries = \App\Country::all();
        $departCities = \App\DepartCity::all();

        foreach ($countries as $country) {
            try {
                foreach ($departCities as $dp) {
                    $response = Http::get("https://module.sletat.ru/Main.svc/GetTourOperators?townFromId=" . $dp->id . "&countryId=" . $country->id);

                    $res = $response->json()["GetTourOperatorsResult"]["Data"];
                    foreach ($res as $item)

                        \App\TourOperator::create($item);

                }
            } catch (Exception $e) {
                continue;
            }
        }
    }
}
