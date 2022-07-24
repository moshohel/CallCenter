<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDispoCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dispo_code', function (Blueprint $table) {
            $table->foreign(['campaign_id'], 'dispo_code_ibfk_1')->references(['id'])->on('campaign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dispo_code', function (Blueprint $table) {
            $table->dropForeign('dispo_code_ibfk_1');
        });
    }
}
