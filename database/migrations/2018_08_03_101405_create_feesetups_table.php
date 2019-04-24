<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feesetups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id');
            $table->string('section');
            $table->string('session');
            $table->string('term');
            $table->string('class');
            $table->integer('feetype_id');
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
        Schema::dropIfExists('feesetups');
    }
}
