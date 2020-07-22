<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class TourDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\TourDate::truncate();

        $countries = \App\Country::all();
        $departCities = \App\DepartCity::all();

        foreach ($countries as $country) {

            foreach ($departCities as $dp) {
                $response = Http::get("https://module.sletat.ru/Main.svc/GetTourDates?dptCityId=" . $dp->id . "&countryId=" . $country->id);

                $res = $response->json()["GetTourDatesResult"]["Data"]["dates"];
                foreach ($res as $item)

                    \App\TourDate::create($item);

            }

        }
    }
}
