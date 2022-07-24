<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalltimeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calltime_details', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('calltime_id')->index('calltime_id');
            $table->string('day', 15);
            $table->time('start');
            $table->time('end');
            $table->dateTime('last_changed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calltime_details');
    }
}
