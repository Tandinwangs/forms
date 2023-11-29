<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class AddAdditionalDocsToAccountDetailUpdateTable extends Migration
{
    public function up()
    {
        Schema::table('account_detail_update', function (Blueprint $table) {
            $table->string('doc_upload_2')->nullable()->after('doc_upload');
            $table->string('doc_upload_3')->nullable()->after('doc_upload_2');
            $table->string('doc_upload_4')->nullable()->after('doc_upload_3');
        });
    }


    public function down()
    {
        Schema::table('account_detail_update', function (Blueprint $table) {
            $table->dropColumn(['doc_upload_2', 'doc_upload_3', 'doc_upload_4']);
        });
    }
}
