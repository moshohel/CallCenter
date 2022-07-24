<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_log', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('parent_id')->nullable();
            $table->enum('call_type', ['in', 'out']);
            $table->text('channel');
            $table->dateTime('calldate');
            $table->dateTime('incoming_queued_at')->nullable();
            $table->string('src', 20);
            $table->string('dst', 20);
            $table->enum('call_status', ['CALLMENU', 'INGROUP', 'CONNECTED', 'HANGUP', 'TRANSFER_PROCESS_INITIATED', 'OUTBOUND_PROCESS_INITIATED', 'OUTBOUND_NOT_CONNECTED'])->index('c_index_2');
            $table->text('outbound_dial_status');
            $table->enum('hangup_reason', ['QUEUE_TIMEOUT', 'INGROUP_TRANSFER', 'AFTHRS', 'HANGUP', 'LEAVE_3_WAY_CALL'])->nullable();
            $table->string('agent_exten', 20)->nullable();
            $table->integer('ingroup_id')->nullable()->index('ingroup_id');
            $table->integer('outbound_campaign_id')->nullable()->index('outbound_campaign_id');
            $table->dateTime('connected_at')->nullable();
            $table->text('call_status_before_hangup')->nullable();
            $table->dateTime('hangup_handler_time')->nullable();
            $table->enum('hangup_side', ['agent', 'customer'])->nullable();
            $table->dateTime('agent_hangup_time')->nullable();
            $table->text('record')->nullable();

            $table->index(['call_type', 'agent_exten', 'calldate', 'connected_at'], 'c_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('call_log');
    }
}
