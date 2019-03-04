<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddColumnEmailInvoiceOrderd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('invoice_orders')) {
            if(!Schema::hasColumn('invoice_orders', 'email')) {
                DB::table('invoice_orders')->truncate();
                DB::table('products_in_order')->truncate();
                Schema::table('invoice_orders', function (Blueprint $table) {
                    $table->string('email');
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
        if(Schema::hasTable('invoice_orders')) {
            if(Schema::hasColumn('invoice_orders', 'email')) {
                Schema::table('invoice_orders', function (Blueprint $table) {
                    $table->dropColumn('email');
                });
            }
        }
    }
}
