<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ActivityLogs', function (Blueprint $table) {
            $table->increments('record_id');
            $table->timestamps();
            $table->string('user_id');
            $table->string('username');
            $table->string('current_url');
            $table->string('action');
            $table->string('ip_address');
            $table->string('user_agent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ActivityLogs');
    }
}
