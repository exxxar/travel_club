<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('Name', 100)->default('');
            $table->string('OriginalName', 100)->default('')->nullable();
            $table->string('Phone', 100)->default('')->nullable();
            $table->integer('BeachLineId')->nullable();
            $table->integer('CommonRate')->default('0');
            $table->boolean('IsInBonusProgram')->default(true);
            $table->integer('PhotosCount')->default('0');
            $table->integer('PopularityLevel')->default('0');
            $table->double('Rate')->default('0');
            $table->integer('SearchCount')->default('0');
            $table->foreignId('StarId')->nullable();
            $table->string('StarName', 100)->default('');
            $table->foreignId('TownId')->nullable();
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
        Schema::dropIfExists('hotels');
    }
}
