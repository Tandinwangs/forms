<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNRBLoanApplicationForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nrb_loan_application', function (Blueprint $table) {
            $table->id(); 
            $table->string('code')->unique();
            $table->string('name');
            $table->string('cid');
            $table->string('mobile_no');
            $table->string('email');
            $table->string('branch');
            $table->string('bla_upload')->nullable();
            $table->string('path')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamp('action_date')->nullable();
            $table->enum('status',['pending','approved','rejected']);
            $table->string('reasonforrejection')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nrb_loan_application');
    }
}
