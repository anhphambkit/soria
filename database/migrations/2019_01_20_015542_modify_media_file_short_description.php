<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyMediaFileShortDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('product_categories')) {
            if(Schema::hasColumn('product_categories', 'desc')) {
                Schema::table('product_categories', function (Blueprint $table) {
                    $table->text('desc')->comment('desc')->change();
                });
            }
        }

        if(Schema::hasTable('products')) {
            if(Schema::hasColumn('products', 'desc')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->text('desc')->comment('desc')->change();
                });
            }

            if(Schema::hasColumn('products', 'long_desc')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->longText('long_desc')->comment('long_desc')->change();
                });
            }
        }

        if(Schema::hasTable('post_categories')) {
            if(Schema::hasColumn('post_categories', 'desc')) {
                Schema::table('post_categories', function (Blueprint $table) {
                    $table->text('desc')->comment('desc')->change();
                });
            }
        }

        if(Schema::hasTable('post_categories')) {
            if(Schema::hasColumn('post_categories', 'desc')) {
                Schema::table('post_categories', function (Blueprint $table) {
                    $table->text('desc')->comment('desc')->change();
                });
            }
        }

        if(Schema::hasTable('media__files')) {
            if(!Schema::hasColumn('media__files', 'type')) {
                Schema::table('media__files', function (Blueprint $table) {
                    $table->string('type')->comment('type of media')->default('images');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('media__files')) {
            if(Schema::hasColumn('media__files', 'type')) {
                Schema::table('media__files', function (Blueprint $table) {
                    $table->dropColumn('type');
                });
            }
        }
    }
}
