<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Country::truncate();

        $response = Http::get('https://module.sletat.ru/Main.svc/GetCountries');

        $res = $response->json()["GetCountriesResult"]["Data"];
        foreach ($res as $item) {
            $country = \App\Country::create($item);
            $country->CountryId = $item["Id"];

            $country->save();
        }
    }
}
