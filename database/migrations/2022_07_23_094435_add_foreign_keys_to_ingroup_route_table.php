<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToIngroupRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingroup_route', function (Blueprint $table) {
            $table->foreign(['ingroup_id'], 'ingroup_route_ibfk_2')->references(['id'])->on('ingroup');
            $table->foreign(['parent_id'], 'ingroup_route_ibfk_1')->references(['id'])->on('ingroup');
            $table->foreign(['callmenu_id'], 'ingroup_route_ibfk_3')->references(['id'])->on('callmenu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingroup_route', function (Blueprint $table) {
            $table->dropForeign('ingroup_route_ibfk_2');
            $table->dropForeign('ingroup_route_ibfk_1');
            $table->dropForeign('ingroup_route_ibfk_3');
        });
    }
}
