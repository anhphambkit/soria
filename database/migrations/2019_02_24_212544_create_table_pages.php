<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('desc');
            $table->longText('content');

            // D: (draft), P: (Published)
            $table->boolean('is_publish')->default(true)->comment('true: Published, false: Draft');
            $table->integer('view')->default(0)->comment('Number of viewed for this product.');
            $table->text('keywords')->nullable();
            $table->string('type_layout')->nullable()->comment('Full Width | Left Sidebar | Right Sidebar | ');
            $table->integer('header_background')->nullable()->comment('Media images backgrounds');
            $table->boolean('is_use_header_image')->default(false);
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
        Schema::dropIfExists('pages');
    }
}
