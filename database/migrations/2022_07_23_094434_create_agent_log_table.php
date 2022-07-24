<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_log', function (Blueprint $table) {
            $table->integer('id', true);
            $table->dateTime('event_time');
            $table->string('agent_exten', 20);
            $table->integer('campaign_id')->index('campaign_id');
            $table->dateTime('pause_epoch')->nullable();
            $table->integer('pause_sec')->nullable();
            $table->string('pause_code', 20)->nullable()->index('pause_code');
            $table->dateTime('wait_epoch')->nullable();
            $table->integer('wait_sec')->nullable();
            $table->dateTime('out_initiation_epoch')->nullable();
            $table->integer('out_initiation_sec')->nullable();
            $table->dateTime('talk_epoch')->nullable();
            $table->integer('talk_sec')->nullable();
            $table->dateTime('dispo_epoch')->nullable();
            $table->integer('dispo_sec')->nullable();
            $table->string('dispo_code', 20)->nullable()->index('index_agl_dispo');
            $table->dateTime('dead_epoch')->nullable();
            $table->integer('dead_sec')->nullable();
            $table->dateTime('hangup_epoch')->nullable();
            $table->integer('call_id')->nullable()->index('call_log_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_log');
    }
}
