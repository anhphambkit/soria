<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Packages\SystemGeneral\Constants\ReferencesConfig;
use function \App\Helper\to_slug_helper;

class AddStatusColumnInvoiceOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('invoice_orders')) {
            if(!Schema::hasColumn('invoice_orders', 'status')) {
                $newStatusInvoiceOrder = DB::table(ReferencesConfig::REFERENCE_TBL)
                                            ->select('id')
                                            ->where('type', '=', ReferencesConfig::STATUS_INVOICE_ORDER_TYPE)
                                            ->where('slug', '=', to_slug_helper(ReferencesConfig::NEW_INVOICE_ORDER_STATUS))
                                            ->first();

                Schema::table('invoice_orders', function (Blueprint $table) use ($newStatusInvoiceOrder) {
                    $table->integer('status')->default($newStatusInvoiceOrder->id);
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
            if(Schema::hasColumn('invoice_orders', 'status')) {
                Schema::table('invoice_orders', function (Blueprint $table) {
                    $table->dropColumn('status');
                });
            }
        }
    }
}
