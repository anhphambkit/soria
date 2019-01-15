<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSeoColumnsPostProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('posts')) {
            if(!Schema::hasColumn('posts', 'meta_title')) {
                Schema::table('posts', function (Blueprint $table) {
                    $table->string('meta_title')->nullable()->comment('SEO title');
                });
            }
            if(!Schema::hasColumn('posts', 'meta_keywords')) {
                Schema::table('posts', function (Blueprint $table) {
                    $table->renameColumn('keywords', 'meta_keywords');
                });
            }
            if(!Schema::hasColumn('posts', 'meta_description')) {
                Schema::table('posts', function (Blueprint $table) {
                    $table->string('meta_description')->nullable()->comment('SEO description');
                });
            }
        }

        if(Schema::hasTable('products')) {
            if(!Schema::hasColumn('products', 'meta_title')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->string('meta_title')->nullable()->comment('SEO title');
                });
            }
            if(!Schema::hasColumn('products', 'meta_keywords')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->renameColumn('keywords', 'meta_keywords');
                });
            }
            if(!Schema::hasColumn('products', 'meta_description')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->string('meta_description')->nullable()->comment('SEO description');
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
        if(Schema::hasTable('posts')) {
            if(Schema::hasColumn('posts', 'meta_title')) {
                Schema::table('posts', function (Blueprint $table) {
                    $table->dropColumn('meta_title');
                });
            }
            if(Schema::hasColumn('posts', 'meta_keywords')) {
                Schema::table('posts', function (Blueprint $table) {
                    $table->renameColumn('meta_keywords', 'keywords');
                });
            }
            if(Schema::hasColumn('posts', 'meta_description')) {
                Schema::table('posts', function (Blueprint $table) {
                    $table->dropColumn('meta_description');
                });
            }
        }

        if(Schema::hasTable('products')) {
            if(Schema::hasColumn('products', 'meta_title')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->dropColumn('meta_title');
                });
            }
            if(Schema::hasColumn('products', 'meta_keywords')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->renameColumn('meta_keywords', 'keywords');
                });
            }
            if(Schema::hasColumn('products', 'meta_description')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->dropColumn('meta_description');
                });
            }
        }
    }
}
