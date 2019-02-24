<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAddressBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_book', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_address_book');
            $table->integer('user_id');
            $table->boolean('is_guest')->default(true);
            $table->string('full_name');
            $table->string('mobile_phone');
            $table->integer('province_city_code');
            $table->integer('district_code');
            $table->integer('ward_code');
            $table->string('address');
            $table->boolean('is_home')->default(true);
            $table->boolean('is_default')->default(false);
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
        Schema::dropIfExists('address_book');
    }
}
