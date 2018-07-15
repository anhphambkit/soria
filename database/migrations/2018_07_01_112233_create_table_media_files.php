<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMediaFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media__files', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('filename');
            $table->string('path_org')->nullable()->comment('Path to original image file.');
            $table->string('path_medium')->nullable()->comment('Path to medium image file.');
            $table->string('path_small')->nullable()->comment('Path to small image file.');
            $table->string('extension')->nullable()->comment('File type (extension file type).');
            $table->string('mimetype');
            $table->string('filesize');
            $table->integer('folder_id')->unsigned();
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
