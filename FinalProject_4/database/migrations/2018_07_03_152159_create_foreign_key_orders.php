<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeyOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('orders', function (Blueprint $table) {
		    $table->foreign('product_id') //название столбца в нашей таблице
		          ->references('id') //название столбца в таблице
		          ->on('products'); //отсюда
		    $table->foreign('user_id') //название столбца в нашей таблице
		          ->references('id') //название столбца в таблице
		          ->on('users'); //отсюда
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
    }
}
