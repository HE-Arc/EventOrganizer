<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->bigIncrements('id')->change();
            $table->dropForeign('orders_user_id_foreign');
            $table->dropColumn('user_id');
            $table->integer('participant_id')->unsigned();
            $table->foreign('participant_id')->references('id')->on('participants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->increments('id')->change();
            $table->foreign('user_id')->references('id')->on('users');
            $table->dropForeign('participant_id');
            $table->dropColumn('participant_id');
        });
    }
}
