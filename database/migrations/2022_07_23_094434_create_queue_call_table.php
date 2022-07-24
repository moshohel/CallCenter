<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueueCallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queue_call', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('channel');
            $table->dateTime('calldate');
            $table->string('src', 20);
            $table->enum('status', ['QUEUE', 'CONNECTED', 'TIMEOUT', 'CUSTOMER_HANGUP']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queue_call');
    }
}
