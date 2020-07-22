<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table("users_roles")->truncate();
        DB::table("users_permissions")->truncate();

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);

       /* $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(DepartCitySeeder::class);
        $this->call(MealSeeder::class);

        $this->call(TourOperatorSeeder::class);
        $this->call(TourDateSeeder::class);
        $this->call(HotelSeeder::class);*/
        Schema::enableForeignKeyConstraints();
    }
}
