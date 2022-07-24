<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingroup', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 30);
            $table->integer('calltime_id')->index('calltime_id');
            $table->enum('next_agent', ['longest_wait_time', 'random', 'agent_ranking']);
            $table->enum('play_welcome_message', ['y', 'n']);
            $table->text('welcome_message');
            $table->integer('drop_call_seconds')->default(360);
            $table->dateTime('last_modified');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingroup');
    }
}
