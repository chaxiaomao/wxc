<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('oid');
            $table->char('ordsn',15);
            $table->integer('uid');
            $table->char('openid',32);
            $table->string('xm',20);
            $table->string('adress',60);
            $table->char('tel',11);
            $table->float('momey',7,2);
            $table->tinyinteger('isplay')->default(0);
            $table->string('ordtime',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
