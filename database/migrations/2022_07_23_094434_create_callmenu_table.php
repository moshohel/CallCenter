<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('callmenu', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('name');
            $table->text('menu_prompt');
            $table->integer('input_sec');
            $table->integer('calltime_id')->index('calltime_id');
            $table->integer('created_by');
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
        Schema::dropIfExists('callmenu');
    }
}
