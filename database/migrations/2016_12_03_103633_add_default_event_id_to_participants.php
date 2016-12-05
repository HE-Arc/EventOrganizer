<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultEventIdToParticipants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->dropForeign('participants_event_id_foreign');
            $table->integer('event_id')->unsigned()->default("0")->change();
            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->dropForeign('participants_event_id_foreign');
            $table->integer('event_id')->unsigned()->change();
            $table->foreign('event_id')->references('id')->on('events');
        });
    }
}
