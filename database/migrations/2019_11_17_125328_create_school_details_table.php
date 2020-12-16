<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id');
            $table->string('schoolname');
            $table->string('schooladdress');
            $table->string('schoolphone');
            $table->string('schoolemail');
            $table->string('registeredby');
            $table->string('registrarstatus');
            $table->string('corporate_acctname');
            $table->string('corporate_acctno');
            $table->string('bankname');
            $table->string('govt_doc');
            $table->integer('verifystatus')->default('0');
            $table->integer('is_used')->default('0');
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
        Schema::dropIfExists('school_details');
    }
}
