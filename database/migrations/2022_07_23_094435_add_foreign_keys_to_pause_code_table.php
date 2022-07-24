<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPauseCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pause_code', function (Blueprint $table) {
            $table->foreign(['campaign_id'], 'pause_code_ibfk_1')->references(['id'])->on('campaign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pause_code', function (Blueprint $table) {
            $table->dropForeign('pause_code_ibfk_1');
        });
    }
}
