<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Hotel::truncate();

        $countries = \App\Country::all();

        foreach ($countries as $country) {

            $response = Http::get("https://module.sletat.ru/Main.svc/GetHotels?all=-1&countryId=" . $country->id);

            $res = $response->json()["GetHotelsResult"]["Data"];
            foreach ($res as $item)
                 \App\Hotel::create($item);

        }
    }
}
