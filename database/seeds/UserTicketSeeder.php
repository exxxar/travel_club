<?php

use Illuminate\Database\Seeder;

class UserTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\UserTicket::class, 5)->create();
    }
}
