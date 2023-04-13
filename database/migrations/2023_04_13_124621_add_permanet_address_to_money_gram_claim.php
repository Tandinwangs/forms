<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPermanetAddressToMoneyGramClaim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('money_gram_claim', function (Blueprint $table) {
            $table->string('permanent_village')->nullable();
            $table->string('permanent_gewog')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('money_gram_claim', function (Blueprint $table) {
            //
        });
    }
}
