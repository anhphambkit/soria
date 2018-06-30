<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
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
            $table->string('title')->nullable();
            $table->string('desc')->nullable();
            $table->string('note')->nullable()->comment('Customer note in this order.');
            $table->string('shipping_address')->nullable()->comment('Address shipping.');
            $table->string('customer_phone')->nullable()->comment('Contact phone when delivery.');
            $table->string('customer_name')->nullable()->comment('Customer name.');
            $table->integer('user_id')->nullable()->comment('Customer who create this order.');
            $table->char('payment_type', 3)->default('COD')->comment('COD: Cost on delivery. PAY: Paypal');
            $table->integer('fee_ship')->default(0)->comment('Fee ship');
            $table->dateTime('ship_date')->nullable()->comment('Date which the order was shipped.');
            $table->integer('tax')->nullable()->comment('(%) Tax percent when create this order.');
            $table->integer('total')->default(0)->comment('Total order.');
            $table->char('shipping_status', 1)->default('I')->comment('I: In stock, O: On delivery, C: Completed');
            $table->char('payment_status', 1)->default('P')->comment('P: Pending, C: Completed');
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
        Schema::dropIfExists('orders');
    }
}
