<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallmenuRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('callmenu_route', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('parent_id')->index('parent_id');
            $table->enum('option', ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'AFTHR', 'INPUT_TIMEOUT', 'INVALID_INPUT']);
            $table->enum('route', ['INGROUP', 'CALLMENU', 'HANGUP', 'AGENT_EXTEN', 'MOBILE']);
            $table->text('description')->nullable();
            $table->integer('ingroup_id')->nullable()->index('ingroup_id');
            $table->integer('callmenu_id')->nullable()->index('callmenu_id');
            $table->text('hangup_voice')->nullable();
            $table->string('agent_exten', 10)->nullable();
            $table->string('mobile', 20)->nullable();
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
        Schema::dropIfExists('callmenu_route');
    }
}
