<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            //Event item belongs to
            $table->integer('event_item_id')->unsigned();
            $table->foreign('event_item_id')->references('id')->on('event_items');


            //User belongs to
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            //qty taken by user
            $table->decimal('qty_taken')->default(0)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
