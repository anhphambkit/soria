<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('products')) {
            if(!Schema::hasColumn('products', 'order')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->integer('order')->default(0)->comment('Order Product');
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
        if(Schema::hasTable('products')) {
            if(Schema::hasColumn('products', 'order')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->dropColumn('order');
                });
            }
        }
    }
}
