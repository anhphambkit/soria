<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
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
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('keywords')->nullable();
            $table->text('content')->nullable();
            $table->integer('cat_id')->nullable();
            $table->char('status', 1)->default('D')->comment('P: Published, D: Draft');
            $table->string('desc')->nullable()->comment('Description can insert to meta tag for SEO.');
            $table->integer('img_id')->nullable()->comment('Feature image of post, id of media.'); //
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
