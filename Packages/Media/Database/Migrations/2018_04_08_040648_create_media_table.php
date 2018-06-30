<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('path_org')->nullable()->comment('Path to original image file.');
            $table->string('path_medium')->nullable()->comment('Path to medium image file.');
            $table->string('path_small')->nullable()->comment('Path to small image file.');
            $table->string('type')->nullable()->comment('File type (extension file type).');
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
        Schema::dropIfExists('media');
    }
}
