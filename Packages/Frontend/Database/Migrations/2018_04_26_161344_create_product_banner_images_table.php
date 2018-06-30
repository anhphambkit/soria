<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductBannerImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_banner_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('banner_id');
            $table->integer('media_id');
            $table->string('link')->nullable()->comment('If multiple images banner, this field will store link.');
            $table->string('desc')->nullable();
            $table->string('title')->nullable()->comment('Title of slide for this image.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_banner_images');
    }
}
