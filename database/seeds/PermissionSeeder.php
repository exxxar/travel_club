<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        $permission1  = new Permission();
        $permission1->name = 'Show personal info';
        $permission1->slug = 'show-personal-info';
        $permission1->save();

        $permission2 = new Permission();
        $permission2->name = 'Create user account';
        $permission2->slug = 'create-user-account';
        $permission2->save();

        $permission3 = new Permission();
        $permission3->name = 'Edit personal info';
        $permission3->slug = 'edit-personal-info';
        $permission3->save();


        $permission4 = new Permission();
        $permission4->name = 'Remove user account';
        $permission4->slug = 'remove-user-account';
        $permission4->save();


    }
}
