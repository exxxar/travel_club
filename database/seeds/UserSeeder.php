<?php

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $tourManager = Role::where('slug', 'Tour-manager')->first();
        $buyer = Role::where('slug', 'Buyer')->first();

        $editPersonalInfo = Permission::where('slug', 'edit-personal-info')->first();
        $showPersonalInfo = Permission::where('slug', 'show-personal-info')->first();
        $createUserAccount = Permission::where('slug', 'create-user-account')->first();
        $removeUserAccount = Permission::where('slug', 'remove-user-account')->first();


        $user1 = new User();
        $user1->name = 'admin 1';
        $user1->phone = '+380710000001';
        $user1->email = 'admin@admin.com';
        $user1->password = bcrypt('admin');
        $user1->save();
        $user1->roles()->attach($tourManager);
        $user1->permissions()->attach([
            $editPersonalInfo->id,
            $showPersonalInfo->id,
            $createUserAccount->id,
            $removeUserAccount->id]);

        $user2 = new User();
        $user2->name = 'user';
        $user2->email = 'user@user.com';
        $user2->phone = '+380710000002';
        $user2->password = bcrypt('user');
        $user2->save();
        $user2->roles()->attach($buyer);
        $user2->permissions()->attach($showPersonalInfo);
    }
}
