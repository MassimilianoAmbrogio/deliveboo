<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->string('name', 40);
            $table->float('price', 5, 2);
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->boolean('vegan');
            $table->boolean('available');
            $table->string('typology', 40);
            $table->timestamps();

            // foreign key
            
            $table->foreign('restaurant_id')
             ->references('id')
             ->on('restaurants')
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
        Schema::dropIfExists('dishes');
    }
}
