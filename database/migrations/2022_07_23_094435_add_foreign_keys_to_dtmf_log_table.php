<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDtmfLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dtmf_log', function (Blueprint $table) {
            $table->foreign(['incoming_id'], 'dtmf_log_ibfk_1')->references(['id'])->on('zzz_incoming');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dtmf_log', function (Blueprint $table) {
            $table->dropForeign('dtmf_log_ibfk_1');
        });
    }
}
