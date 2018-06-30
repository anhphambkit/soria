<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->comment('Foreign key Orders table.');
            $table->integer('product_id')->nullable();
            $table->integer('price')->nullable()->comment('Product original price when the order was created.');
            $table->integer('sale_price')->nullable()->comment('Product sale price which price customer must pay.');
            $table->integer('quantity')->nullable();
            $table->integer('total')->nullable()->comment('sale_price * quantity');
            $table->string('size')->nullable()->comment('Size of product.');
            $table->string('color')->nullable()->comment('Color of product.');
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
        Schema::dropIfExists('order_detail');
    }
}
