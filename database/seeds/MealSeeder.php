<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Meal::truncate();

        $response = Http::get('https://module.sletat.ru/Main.svc/GetMeals');

        $res = $response->json()["GetMealsResult"]["Data"];
        foreach ($res as $item)
            $meal = \App\Meal::create($item);


    }
}
