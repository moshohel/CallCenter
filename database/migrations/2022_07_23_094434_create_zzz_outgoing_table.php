<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZzzOutgoingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zzz_outgoing', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('channel')->nullable();
            $table->dateTime('dialtime');
            $table->integer('campaign_id');
            $table->string('src', 20);
            $table->string('dst', 20);
            $table->string('agent_exten', 20);
            $table->enum('call_status', ['PROCESS_INITIATED', 'CONNECTED', 'NOT_CONNECTED', 'HANGUP']);
            $table->text('dial_status')->nullable();
            $table->text('call_status_before_hangup')->nullable();
            $table->dateTime('connected_with_customer_at')->nullable();
            $table->dateTime('hangup_handler_time')->nullable();
            $table->dateTime('agent_hangup_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zzz_outgoing');
    }
}
