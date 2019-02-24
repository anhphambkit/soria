<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('invoice_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->boolean('is_guest')->default(true);
            $table->string('customer');
            $table->string('mobile_phone');
            $table->string('address');
            $table->string('shipping_method');
            $table->string('payment_method');
            $table->integer('sub_total');
            $table->integer('discount_on_products')->default(0);
            $table->integer('discount_price')->nullable();
            $table->integer('shipping_fee')->nullable();
            $table->integer('total_price');
            $table->string('discount_code')->nullable();
            $table->boolean('is_home')->default(true);
            $table->boolean('is_free_shipping')->default(false);
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
        Schema::dropIfExists('invoice_orders');
    }
}
