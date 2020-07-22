<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('Name', 100)->default('');
            $table->string('Alias', 100)->default('');
            $table->string('OriginalName', 100)->default('');
            $table->tinyInteger('Flags')->default(0);
            $table->tinyInteger('Rank')->default(0);
            $table->boolean('HasTickets')->default(false);
            $table->boolean('HotelIsNotInStop')->default(false);
            $table->boolean('IsProVisa')->default(false);
            $table->boolean('IsVisa')->default(false);
            $table->boolean('TicketsIncluded')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
