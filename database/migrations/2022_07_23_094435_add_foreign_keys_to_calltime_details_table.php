<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCalltimeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calltime_details', function (Blueprint $table) {
            $table->foreign(['calltime_id'], 'calltime_details_ibfk_1')->references(['id'])->on('calltime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calltime_details', function (Blueprint $table) {
            $table->dropForeign('calltime_details_ibfk_1');
        });
    }
}
