<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCallLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('call_log', function (Blueprint $table) {
            $table->foreign(['outbound_campaign_id'], 'call_log_ibfk_2')->references(['id'])->on('campaign');
            $table->foreign(['ingroup_id'], 'call_log_ibfk_1')->references(['id'])->on('ingroup');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('call_log', function (Blueprint $table) {
            $table->dropForeign('call_log_ibfk_2');
            $table->dropForeign('call_log_ibfk_1');
        });
    }
}
