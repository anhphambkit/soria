<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('sku')->unique();
            $table->string('desc')->nullable();
            $table->text('long_desc')->nullable();

            // P: sale off by percent (original price is price column)
            // A: sale off by amount (original price is price column)
            // null: Don't have any sale off
            $table->char('sale_type', 1)->nullable()->comment('P: sale off by percent, A: sale off by amount, null: Not sale off');
            $table->integer('sale_value')->nullable();

            // D: (draft), P: (Published)
            $table->char('status', 1)->default('D')->comment('P: Published, D: Draft');
            $table->boolean('is_feature')->default(false)->comment('Product feature');
            $table->boolean('is_best_seller')->default(false)->comment('Product is best seller');
            $table->boolean('is_free_ship')->default(false)->comment('Product is free ship');

            // original price
            $table->integer('price')->nullable()->comment('Original price'); // Original price
            $table->integer('sale_price')->nullable()->comment('Price after apply sale_off base on sale_type and sale_value column.'); // Price which client will pay to buy

            $table->integer('rating')->default(0)->comment('Number of star for this product.');

            $table->integer('img_id')->nullable(); // Feature image of product, id of media

            $table->string('slug')->unique();
            $table->string('keywords')->nullable();

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
        Schema::dropIfExists('products');
    }
}
