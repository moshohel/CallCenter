<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCallmenuRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('callmenu_route', function (Blueprint $table) {
            $table->foreign(['ingroup_id'], 'callmenu_route_ibfk_2')->references(['id'])->on('ingroup');
            $table->foreign(['parent_id'], 'callmenu_route_ibfk_1')->references(['id'])->on('callmenu');
            $table->foreign(['callmenu_id'], 'callmenu_route_ibfk_3')->references(['id'])->on('callmenu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('callmenu_route', function (Blueprint $table) {
            $table->dropForeign('callmenu_route_ibfk_2');
            $table->dropForeign('callmenu_route_ibfk_1');
            $table->dropForeign('callmenu_route_ibfk_3');
        });
    }
}
