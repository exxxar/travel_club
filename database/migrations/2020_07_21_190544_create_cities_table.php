<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->integer('CountryId')->nullable();
            $table->integer('OriginalName')->nullable();
            $table->string('Name', 100)->default('');
            $table->boolean('Default')->default(true);
            $table->string('DescriptionUrl', 500)->default('')->nullable();
            $table->boolean('IsPopular')->default(true);
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
        Schema::dropIfExists('cities');
    }
}
