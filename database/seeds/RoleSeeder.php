<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        $manager = new Role();
        $manager->name = 'Tour-manager';
        $manager->slug = 'tour-manager';
        $manager->save();

        $developer = new Role();
        $developer->name = 'Buyer';
        $developer->slug = 'buyer';
        $developer->save();
    }
}
