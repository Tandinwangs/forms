<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebitCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debit_card_request', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('mobile_no')->nullable();
            $table->string('email')->nunllable();
            $table->string('cid');
            $table->string('branch');
            $table->string('account_number');
            $table->string('reason',2000)->nullable();
            $table->string('account_type');
            $table->string('debit_card_type');
            $table->string('request_for');
            $table->string('name_on_card');
            $table->string('nationality');
            $table->date('dob');
            $table->string('address',2000);
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
        Schema::dropIfExists('debit_card_request_table');
    }
}
