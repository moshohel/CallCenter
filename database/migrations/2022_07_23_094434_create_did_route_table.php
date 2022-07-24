<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDidRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('did_route', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('description', 20);
            $table->string('did_number', 11);
            $table->enum('route', ['CONTEXT_EXTEN', 'INGROUP', 'CALLMENU', 'PHONE']);
            $table->string('context_name', 20)->nullable();
            $table->integer('context_exten')->nullable();
            $table->integer('ingroup_id')->nullable()->index('ingroup_id');
            $table->integer('callmenu_id')->nullable()->index('callmenu_id');
            $table->string('phone', 20)->nullable();
            $table->enum('is_active', ['y', 'n']);
            $table->integer('filtergroup_id');
            $table->enum('filter_action', ['exten']);
            $table->string('filter_context', 25);
            $table->string('filter_exten', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('did_route');
    }
}
