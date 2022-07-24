<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUiNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ui_notification', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('panel_id', 30);
            $table->text('subject');
            $table->text('value');
            $table->integer('is_processed')->default(0);
            $table->integer('is_expired')->default(0);
            $table->dateTime('created_date');

            $table->index(['panel_id', 'is_processed', 'is_expired'], 'ui_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ui_notification');
    }
}
