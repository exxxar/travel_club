<?php

use Illuminate\Database\Seeder;

class UserTourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\UserTour::class, 5)->create();
    }
}
