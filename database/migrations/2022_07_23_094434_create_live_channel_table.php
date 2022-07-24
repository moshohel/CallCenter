<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveChannelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_channel', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('phone', 30);
            $table->string('extension', 10);
            $table->text('channel');
            $table->enum('status', ['live', 'parked']);
            $table->string('parked_at', 10);
            $table->dateTime('created_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('live_channel');
    }
}
