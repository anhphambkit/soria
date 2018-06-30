<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->string('desc')->nullable();
            $table->integer('img_id')->nullable()->comment('Link to media ID');
            $table->string('link')->nullable()->comment('URL on the banner');
            $table->char('type', 1)->default('S')->comment('S: Single image banner, M: Multiple images on the banner.');
            $table->text('data')->nullable()->comment('Store other data, maybe json_encode data.');
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
        Schema::dropIfExists('product_banners');
    }
}
