<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispoCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispo_code', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('order_id');
            $table->integer('campaign_id')->index('campaign_id');
            $table->string('code', 20);
            $table->text('name');
            $table->dateTime('created_date');
            $table->integer('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispo_code');
    }
}
