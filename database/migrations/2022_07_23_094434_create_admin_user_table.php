<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_user', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('name');
            $table->string('password', 50);
            $table->integer('user_group_id')->index('user_group_id');
            $table->enum('is_active', ['y', 'n']);
            $table->integer('created_by');
            $table->dateTime('created_date');
            $table->integer('modified_by')->nullable();
            $table->dateTime('modified_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_user');
    }
}
