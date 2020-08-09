<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWithdrawalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawal_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('school_detail_id');
            $table->string('reference');
            $table->string('gateway_id')->nullable();
            $table->string('balance_before')->nullable();
            $table->string('balance_after')->nullable();
            $table->string('currency');
            $table->string('amount');
            $table->string('fee')->nullable();
            $table->string('account_number');
            $table->string('fullname');
            $table->string('bank_code');
            $table->string('bank_name')->nullable();
            $table->string('message')->nullable();
            $table->string('status')->default('PENDING');
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
        Schema::dropIfExists('withdrawal_histories');
    }
}
