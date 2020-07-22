<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('user_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('UserId')->nullable();
            $table->unsignedInteger('TourId')->nullable();
            $table->json('TicketInfo');
            $table->double('TotalPayment')->default(0.0);
            $table->double('CurrentPayment')->default(0.0);
            $table->string('ContactPhone', 100)->default('');
            $table->timestamp('DepartureAt')->nullable();
            $table->string('DepartureFrom', 100)->default('')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_tickets');
    }
}
