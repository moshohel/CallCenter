<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToIngroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingroup', function (Blueprint $table) {
            $table->foreign(['calltime_id'], 'ingroup_ibfk_1')->references(['id'])->on('calltime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingroup', function (Blueprint $table) {
            $table->dropForeign('ingroup_ibfk_1');
        });
    }
}
