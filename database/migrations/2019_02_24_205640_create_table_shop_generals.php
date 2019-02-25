<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableShopGenerals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_logo');
            $table->integer('shop_favicon');
            $table->string('shop_address');
            $table->string('shop_phone');
            $table->string('shop_phone_secondary');
            $table->string('shop_work_hours');
            $table->string('shop_email');
            $table->string('shop_facebook');
            $table->string('shop_twitter');
            $table->string('shop_instagram');
            $table->string('shop_signature');
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
        Schema::dropIfExists('shop_settings');
    }
}
