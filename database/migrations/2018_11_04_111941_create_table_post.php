<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('desc');
            $table->longText('content');
            $table->text('image_feature')->default('post-default.jpg');

            // D: (draft), P: (Published)
            $table->boolean('is_publish', 1)->default(true)->comment('true: Published, false: Draft');
            $table->boolean('at_homepage')->default(false)->comment('Show post in homepage');

            $table->integer('rating')->default(0)->comment('Number of star for this product.');

            $table->string('keywords')->nullable();
            $table->string('type_article')->nullable()->comment('Gallery | Slide | Video | Audio');

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
        Schema::dropIfExists('posts');
    }
}
