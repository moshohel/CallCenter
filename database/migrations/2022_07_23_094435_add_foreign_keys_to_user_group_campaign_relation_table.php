<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserGroupCampaignRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_group_campaign_relation', function (Blueprint $table) {
            $table->foreign(['campaign_id'], 'user_group_campaign_relation_ibfk_2')->references(['id'])->on('campaign');
            $table->foreign(['user_group_id'], 'user_group_campaign_relation_ibfk_1')->references(['id'])->on('user_group');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_group_campaign_relation', function (Blueprint $table) {
            $table->dropForeign('user_group_campaign_relation_ibfk_2');
            $table->dropForeign('user_group_campaign_relation_ibfk_1');
        });
    }
}
