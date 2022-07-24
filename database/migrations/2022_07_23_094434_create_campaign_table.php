<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 20);
            $table->enum('type', ['inbound', 'outbound', 'blended']);
            $table->integer('call_time_id')->index('call_time_id');
            $table->string('callerid', 20);
            $table->text('carrier');
            $table->enum('recording_enabled', ['y', 'n']);
            $table->enum('pause_code_enabled', ['y', 'n']);
            $table->enum('after_hangup_pause_agent', ['y', 'n']);
            $table->enum('submit_disposition', ['y', 'n']);
            $table->integer('max_dispo_sec');
            $table->integer('max_pause_sec');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaign');
    }
}
