<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZzzIncomingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zzz_incoming', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('channel');
            $table->dateTime('calldate');
            $table->dateTime('queued_at')->nullable();
            $table->string('src', 20);
            $table->string('dst', 20);
            $table->enum('call_status', ['CALLMENU', 'INGROUP', 'CONNECTED', 'HANGUP']);
            $table->enum('hangup_reason', ['TIMEOUT', 'AFTHRS', 'HANGUP'])->nullable();
            $table->string('agent_exten', 20)->nullable();
            $table->integer('ingroup_id')->nullable();
            $table->dateTime('connected_with_agent_at')->nullable();
            $table->text('call_status_before_hangup')->nullable();
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
        Schema::dropIfExists('zzz_incoming');
    }
}
