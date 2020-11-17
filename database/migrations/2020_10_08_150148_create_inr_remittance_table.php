<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInrRemittanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inrremittance', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('idnumber');
            $table->string('mobile_no');
            $table->string('email')->nullable();
            $table->string('amount');
            $table->string('homebranch');
            $table->string('accountnumber');
            $table->string('currentaddress');
            $table->string('remittancepurpose');
            $table->string('chargesoption');
            $table->string('charges');
            $table->string('beneficiaryname');
            $table->string('beneficiaryaddress');
            $table->string('city');
            $table->string('state');
            $table->string('pincode');
            $table->string('beneficiarymobilenumber');
            $table->string('beneficiarybank');
            $table->string('beneficiarybankbranch');
            $table->string('beneficiaryaccountnumber');
            $table->string('ifsccode');
            $table->string('path')->nullable;
            $table->string('document')->nullable();
            $table->string('document2')->nullable();
            $table->string('document3')->nullable();
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
        Schema::dropIfExists('inrremittance');
    }
}
