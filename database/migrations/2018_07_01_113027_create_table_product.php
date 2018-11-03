<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduct extends Migration
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
            $table->string('name');
            $table->string('slug');
            $table->string('sku');
            $table->string('desc');
            $table->text('long_desc')->nullable();

            // D: (draft), P: (Published)
            $table->boolean('is_publish', 1)->default(true)->comment('true: Published, false: Draft');
            $table->boolean('is_feature')->default(false)->comment('Product feature');
            $table->boolean('is_best_seller')->default(false)->comment('Product is best seller');
            $table->boolean('is_free_ship')->default(false)->comment('Product is free ship');

            // original price
            $table->integer('price')->comment('Original price'); // Original price
            $table->integer('sale_price')->nullable()->comment('Sale Price'); // Price which client will pay to buy

            $table->integer('in_stock')->nullable()->comment('Total items in stock'); // Original price
            $table->boolean('manager_stock')->default(false)->comment('Admin manager items in stock');
            $table->boolean('allow_order')->default(false)->comment('Allow order product when stock not available');

            $table->integer('rating')->default(0)->comment('Number of star for this product.');

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
