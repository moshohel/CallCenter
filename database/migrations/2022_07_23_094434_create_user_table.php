<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('name');
            $table->string('extension', 10)->unique('extension');
            $table->string('password', 20)->unique('password');
            $table->string('api_key', 10)->unique('api_key');
            $table->enum('on_hook', ['y', 'n']);
            $table->integer('conf_room')->nullable();
            $table->integer('user_group_id')->index('user_group_id');
            $table->enum('is_active', ['y', 'n']);
            $table->integer('created_by');
            $table->dateTime('created_date');
            $table->integer('modified_by')->nullable();
            $table->dateTime('modified_date')->nullable();
            $table->enum('is_logged_in', ['y', 'n'])->nullable();
            $table->enum('status', ['paused', 'active', 'being_connected', 'initiating_outbound', 'in_live_call', 'in_dispo', 'in_dead_call', 'in_hangup', 'logged_out']);
            $table->string('channel', 30)->nullable();
            $table->text('customer_channel')->nullable();
            $table->text('transferee_channel')->nullable();
            $table->text('parked_at')->nullable();
            $table->text('current_call_id')->nullable();
            $table->text('current_agent_log_id')->nullable();
            $table->integer('campaign_id')->nullable();
            $table->string('panel_id', 30)->nullable();
            $table->text('session_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
