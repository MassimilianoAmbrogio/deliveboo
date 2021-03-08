<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name', 40)->unique();
            $table->string('address');
            $table->char('vat_num', 13)->unique();
            $table->string('phone', 30)->unique();
            $table->string('slug', 50);
            $table->text('image_logo')->nullable();
            $table->timestamps();

            // foreign key
            
            $table->foreign('user_id')
                 ->references('id')
                 ->on('users')
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
        Schema::dropIfExists('restaurants');
    }
}
