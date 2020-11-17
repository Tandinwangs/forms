<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifts', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('account_number');
            $table->string('amount');
            $table->string('mobile_no');
            $table->string('beneficiary_name');
            $table->string('beneficiary_account_number');
            $table->string('account_type');
            $table->string('beneficiary_bank');
            $table->string('branch');
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
        Schema::dropIfExists('gifts');
    }
}
