<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateModifySeoColumnsPostProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('posts')) {
            if(Schema::hasColumn('posts', 'meta_title')) {
                Schema::table('posts', function (Blueprint $table) {
                    $table->text('meta_title')->nullable()->comment('SEO title')->change();
                });
            }
            if(Schema::hasColumn('posts', 'meta_keywords')) {
                Schema::table('posts', function (Blueprint $table) {
                    $table->text('meta_keywords')->nullable()->comment('SEO meta_keywords')->change();
                });
            }
            if(Schema::hasColumn('posts', 'meta_description')) {
                Schema::table('posts', function (Blueprint $table) {
                    $table->text('meta_description')->nullable()->comment('SEO description')->change();
                });
            }
        }

        if(Schema::hasTable('products')) {
            if(Schema::hasColumn('products', 'meta_title')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->text('meta_title')->nullable()->comment('SEO title')->change();
                });
            }
            if(Schema::hasColumn('products', 'meta_keywords')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->text('meta_keywords')->nullable()->comment('SEO meta_keywords')->change();
                });
            }
            if(Schema::hasColumn('products', 'meta_description')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->text('meta_description')->nullable()->comment('SEO description')->change();
                });
            }
        }

        if(Schema::hasTable('product_categories')) {
            if(Schema::hasColumn('product_categories', 'meta_title')) {
                Schema::table('product_categories', function (Blueprint $table) {
                    $table->text('meta_title')->nullable()->comment('SEO title')->change();
                });
            }
            if(Schema::hasColumn('product_categories', 'meta_keywords')) {
                Schema::table('product_categories', function (Blueprint $table) {
                    $table->text('meta_keywords')->nullable()->comment('SEO meta_keywords')->change();
                });
            }
            if(Schema::hasColumn('product_categories', 'meta_description')) {
                Schema::table('product_categories', function (Blueprint $table) {
                    $table->text('meta_description')->nullable()->comment('SEO description')->change();
                });
            }
        }

        if(Schema::hasTable('post_categories')) {
            if(Schema::hasColumn('post_categories', 'meta_title')) {
                Schema::table('post_categories', function (Blueprint $table) {
                    $table->text('meta_title')->nullable()->comment('SEO title')->change();
                });
            }
            if(Schema::hasColumn('post_categories', 'meta_keywords')) {
                Schema::table('post_categories', function (Blueprint $table) {
                    $table->text('meta_keywords')->nullable()->comment('SEO meta_keywords')->change();
                });
            }
            if(Schema::hasColumn('post_categories', 'meta_description')) {
                Schema::table('post_categories', function (Blueprint $table) {
                    $table->text('meta_description')->nullable()->comment('SEO description')->change();
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
                    $table->string('meta_title')->nullable()->comment('SEO meta_title')->change();
                });
            }
            if(Schema::hasColumn('posts', 'meta_keywords')) {
                Schema::table('posts', function (Blueprint $table) {
                    $table->string('meta_keywords')->nullable()->comment('SEO meta_keywords')->change();
                });
            }
            if(Schema::hasColumn('posts', 'meta_description')) {
                Schema::table('posts', function (Blueprint $table) {
                    $table->string('meta_description')->nullable()->comment('SEO meta_description')->change();
                });
            }
        }

        if(Schema::hasTable('products')) {
            if(Schema::hasColumn('products', 'meta_title')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->string('meta_title')->nullable()->comment('SEO meta_title')->change();
                });
            }
            if(Schema::hasColumn('products', 'meta_keywords')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->string('meta_keywords')->nullable()->comment('SEO meta_keywords')->change();
                });
            }
            if(Schema::hasColumn('products', 'meta_description')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->string('meta_description')->nullable()->comment('SEO meta_description')->change();
                });
            }
        }

        if(Schema::hasTable('product_categories')) {
            if(Schema::hasColumn('product_categories', 'meta_title')) {
                Schema::table('product_categories', function (Blueprint $table) {
                    $table->string('meta_title')->nullable()->comment('SEO meta_title')->change();
                });
            }
            if(Schema::hasColumn('product_categories', 'meta_keywords')) {
                Schema::table('product_categories', function (Blueprint $table) {
                    $table->string('meta_keywords')->nullable()->comment('SEO meta_keywords')->change();
                });
            }
            if(Schema::hasColumn('product_categories', 'meta_description')) {
                Schema::table('product_categories', function (Blueprint $table) {
                    $table->string('meta_description')->nullable()->comment('SEO meta_description')->change();
                });
            }
        }

        if(Schema::hasTable('post_categories')) {
            if(Schema::hasColumn('post_categories', 'meta_title')) {
                Schema::table('post_categories', function (Blueprint $table) {
                    $table->string('meta_title')->nullable()->comment('SEO meta_title')->change();
                });
            }
            if(Schema::hasColumn('post_categories', 'meta_keywords')) {
                Schema::table('post_categories', function (Blueprint $table) {
                    $table->string('meta_keywords')->nullable()->comment('SEO meta_keywords')->change();
                });
            }
            if(Schema::hasColumn('post_categories', 'meta_description')) {
                Schema::table('post_categories', function (Blueprint $table) {
                    $table->string('meta_description')->nullable()->comment('SEO meta_description')->change();
                });
            }
        }
    }
}
