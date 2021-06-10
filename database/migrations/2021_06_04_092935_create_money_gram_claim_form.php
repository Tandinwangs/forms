<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneyGramClaimForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money_gram_claim', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('moneygram_reference_number');
            $table->string('title');
            $table->string('name');
            $table->string('occupation');
            $table->date('date_of_birth');
            $table->string('country_of_birth');
            $table->string('current_address');
            $table->string('dzongkhag');
            $table->string('postal_code');
            $table->string('country');
            $table->string('mobile_no');
            $table->string('email');
            $table->string('cid');
            $table->string('relation');
            $table->string('bank_name');
            $table->string('branch');
            $table->string('account_number');
            $table->string('account_holder_name');
            $table->string('sender_title');
            $table->string('sender_name');
            $table->string('remittance_purpose');
            $table->string('incentive');
            $table->string('document')->nullable();
            $table->string('document2')->nullable();
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
        Schema::dropIfExists('money_gram_claim');
    }
}
