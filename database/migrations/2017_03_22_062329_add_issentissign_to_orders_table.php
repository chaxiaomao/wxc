<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIssentissignToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
		Schema::table('orders', function (Blueprint $table) {
            //
            $table->tinyinteger('issent')->default(0);
			$table->tinyinteger('issign')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		
		Schema::table('orders', function (Blueprint $table) {
            //
            $table->drop_column('issent');
			$table->drop_column('issign');
        });
    }
}
