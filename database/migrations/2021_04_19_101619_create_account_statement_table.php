<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountStatementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_statement_requests', function (Blueprint $table) {
            $table->id();
            $table->string('account_number');
            $table->string('phone_number');
            $table->string('email');
            $table->date('from_date');
            $table->date('to_date');
            $table->enum('status',['0','1','2'])->default('0');
            $table->string('otp')->nullable();
            $table->string('count')->default('0');
            $table->timestamp('otp_gen_time')->nullable();
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
        Schema::dropIfExists('account_statement_requests');
    }
}
