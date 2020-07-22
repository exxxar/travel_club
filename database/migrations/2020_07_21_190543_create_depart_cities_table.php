<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depart_cities', function (Blueprint $table) {
            $table->id();
            $table->string('Name', 100)->default('');
            $table->foreignId('CountryId')->nullable();
            $table->boolean('Default')->default(true);
            $table->string('DescriptionUrl', 500)->nullable();
            $table->boolean('IsPopular')->default(true);
            $table->string('OriginalName', 500)->nullable();
            $table->foreignId('ParentId')->nullable();
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
        Schema::dropIfExists('depart_cities');
    }
}
