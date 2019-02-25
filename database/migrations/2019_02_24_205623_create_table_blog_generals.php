<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBlogGenerals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blog_logo');
            $table->integer('blog_favicon');
            $table->integer('blog_avatar_author');
            $table->string('blog_hi_sentence');
            $table->string('blog_introduce_author');
            $table->string('blog_short_description');
            $table->string('blog_facebook');
            $table->string('blog_twitter');
            $table->string('blog_instagram');
            $table->string('blog_personal_images');
            $table->string('blog_signature');
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
        Schema::dropIfExists('blog_settings');
    }
}
