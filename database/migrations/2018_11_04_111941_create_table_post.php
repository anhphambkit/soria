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
            $table->text('desc');
            $table->longText('content');
            
            // D: (draft), P: (Published)
            $table->boolean('is_publish')->default(true)->comment('true: Published, false: Draft');
            $table->boolean('at_homepage')->default(false)->comment('Show post in homepage');

            $table->integer('rating')->default(0)->comment('Number of star for this product.');
            $table->integer('view')->default(0)->comment('Number of viewed for this product.');

            $table->string('keywords')->nullable();
            $table->integer('type_article')->nullable()->comment('Reference Gallery | Slide | Video | Audio');
            $table->integer('created_by')->default(1);

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
