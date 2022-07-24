<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAgentLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agent_log', function (Blueprint $table) {
            $table->foreign(['campaign_id'], 'agent_log_ibfk_2')->references(['id'])->on('campaign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agent_log', function (Blueprint $table) {
            $table->dropForeign('agent_log_ibfk_2');
        });
    }
}
