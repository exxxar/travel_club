<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DepartCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\DepartCity::truncate();

        $response = Http::get('https://module.sletat.ru/Main.svc/GetDepartCities');

        $res = $response->json()["GetDepartCitiesResult"]["Data"];
        foreach ($res as $item)
            $departCity = \App\DepartCity::create($item);


    }
}
