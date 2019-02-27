<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePageCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('parent_id')->default(0)->comment('Id of category parent');
            $table->string('slug')->nullable()->comment('Slug of category');
            $table->string('desc')->nullable();
            $table->integer('order')->nullable()->comment('Order of this category (Just on the same level).');
            $table->string('meta_title')->nullable()->comment('SEO title');
            $table->string('meta_keywords')->nullable()->comment('SEO keywords');
            $table->string('meta_description')->nullable()->comment('SEO description');
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
        Schema::dropIfExists('page_categories');
    }
}
