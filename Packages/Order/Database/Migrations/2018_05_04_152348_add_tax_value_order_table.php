<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTaxValueOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->float('tax_value')->default(0)->comment('Tax price include in this order.');
            $table->float('tax')->default(0)->comment('Tax percent.')->change();
            $table->float('fee_ship')->default(0)->change();
            $table->float('total')->default(0)->comment('Full total order, use must pay')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('tax_value');
        });
    }
}
