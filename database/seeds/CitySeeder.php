<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\City::truncate();

        $countries = \App\Country::all();

        foreach ($countries as $country) {

            $response = Http::get("https://module.sletat.ru/Main.svc/GetCities?countryId=" . $country->id);

            $res = $response->json()["GetCitiesResult"]["Data"];
            foreach ($res as $item)
                $city = \App\City::create($item);

        }
    }
}
