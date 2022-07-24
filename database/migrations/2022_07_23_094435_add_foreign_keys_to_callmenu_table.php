<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCallmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('callmenu', function (Blueprint $table) {
            $table->foreign(['calltime_id'], 'callmenu_ibfk_2')->references(['id'])->on('calltime');
            $table->foreign(['calltime_id'], 'callmenu_ibfk_1')->references(['id'])->on('calltime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('callmenu', function (Blueprint $table) {
            $table->dropForeign('callmenu_ibfk_2');
            $table->dropForeign('callmenu_ibfk_1');
        });
    }
}
