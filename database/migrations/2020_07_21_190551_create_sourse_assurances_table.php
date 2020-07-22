<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourseAssurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sourse_assurances', function (Blueprint $table) {
            $table->id();
            $table->string('Name', 100)->default('');
            $table->string('NameShort', 100)->default('');
            $table->string('Number', 100)->default('');
            $table->string('PhysicalAddress', 100)->default('');
            $table->string('PostAddress', 100)->default('');
            $table->string('Site', 100)->default('');
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
        Schema::dropIfExists('sourse_assurances');
    }
}
