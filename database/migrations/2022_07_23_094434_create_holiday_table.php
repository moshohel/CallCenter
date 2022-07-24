<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holiday', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('name');
            $table->integer('default_start');
            $table->integer('default_stop');
            $table->integer('ah_override');
            $table->integer('holiday_start');
            $table->integer('holiday_stop');
            $table->enum('status', ['y', 'n']);
            $table->text('user_group');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('holiday');
    }
}
