<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinSecurityDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fin_security_documents', function (Blueprint $table) {
            $table->id();
            $table->string('DateOfFinSecurityFrom', 100)->default('');
            $table->string('DateOfFinSecurityTo', 100)->default('');
            $table->string('DocumentDate', 100)->default('');
            $table->string('DocumentNumber', 100)->default('');
            $table->integer('FinSecurityAmount')->default('0');
            $table->string('OrgAddress', 100)->default('');
            $table->string('OrgName', 100)->default('');
            $table->string('OrgPostAddress', 100)->default('');
            $table->string('WayToFinSecurity', 100)->default('');
            $table->foreignId('SourseAssuranceId')->nullable();
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
        Schema::dropIfExists('fin_security_documents');
    }
}
