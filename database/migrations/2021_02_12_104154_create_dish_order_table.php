<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('dish_id');
            $table->integer('quantity')->nullable();
            $table->dateTime('time_order');

            // foreign key
            
            $table->foreign('order_id')
              ->references('id')
              ->on('orders')
              ->onDelete('cascade');


            // foreign key
            
            $table->foreign('dish_id')
              ->references('id')
              ->on('dishes')
              ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dish_order');
    }
}
