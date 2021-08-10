<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id('id');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');

            $table->foreign('user_id')->references('id')->on('registers');
            $table->foreign('product_id')->references('id')->on('books');

            // $table->foreign('user_id')->references('id')->on('registers');
          

            $table->string('productname');
            $table->integer('ISBN_number');
            $table->double('qty');
            $table->text('price');
            $table->string('subtotal');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
