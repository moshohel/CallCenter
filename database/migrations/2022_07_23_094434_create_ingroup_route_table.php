<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngroupRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingroup_route', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('parent_id')->index('parent_id');
            $table->enum('option', ['DROP', 'AFTHR', 'NO_AGENT_NO_QUEUE']);
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
        Schema::dropIfExists('ingroup_route');
    }
}
