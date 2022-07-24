<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_history', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('transferee_number');
            $table->text('dial_status');
            $table->dateTime('created_date');
            $table->enum('call_type', ['in', 'out']);
            $table->integer('relation_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfer_history');
    }
}
