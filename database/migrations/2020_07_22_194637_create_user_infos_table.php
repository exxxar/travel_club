<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('UserId')->nullable();
            $table->string('FullName', 100)->default('');
            $table->integer('Age')->default(18);
            $table->tinyInteger('Sex')->default(0);
            $table->string('Birthday', 100)->default('');
            $table->string('Passport', 100)->default('');
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
        Schema::dropIfExists('user_infos');
    }
}
