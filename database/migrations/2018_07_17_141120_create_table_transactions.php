<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         /**
         * @param id
         * @param amount
         * @param phone_number
         * @param request_id
         * @param message
         * @param result_desc
         * @param status
         * @param third_party_trans_id
         * @param transaction_time
         * @param deleted_at
         * @param created_at
         * @param updated_at
         */
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('amount')->nullable();
            $table->string('phone_number')->index();
            $table->string('request_id')->unique();
            $table->string('message')->nullable();
            $table->string('result_desc')->nullable();
            $table->string('status')->default(0);
            $table->string('third_party_trans_id')->nullable()->unique();
            $table->string('transaction_time')->nullable();
            $table->softDeletes(); 
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
        Schema::dropIfExists('transactions');
    }
}
