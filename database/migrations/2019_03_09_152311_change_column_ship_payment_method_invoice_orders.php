<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Packages\SystemGeneral\Constants\ReferencesConfig;
use App\Packages\SystemGeneral\Services\ReferenceServices;

class ChangeColumnShipPaymentMethodInvoiceOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('invoice_orders')) {
            if(Schema::hasColumn('invoice_orders', 'shipping_method')) {
                $defaultShippingMethod = app()->make(ReferenceServices::class)->getReferenceFromAttributeType(ReferencesConfig::SHIPPING_METHOD_TYPE, ReferencesConfig::STANDARD_SHIPPING_METHOD);
                if ($defaultShippingMethod) {
                    Schema::table('invoice_orders', function (Blueprint $table) {
                        $table->dropColumn('shipping_method');
                    });
                    Schema::table('invoice_orders', function (Blueprint $table) use ($defaultShippingMethod) {
                        $table->integer('shipping_method')->default($defaultShippingMethod->id);
                    });
                }
            }
        }

        if(Schema::hasTable('invoice_orders')) {
            if(Schema::hasColumn('invoice_orders', 'payment_method')) {
                $defaultPaymentMethod = app()->make(ReferenceServices::class)->getReferenceFromAttributeType(ReferencesConfig::PAYMENT_METHOD_TYPE, ReferencesConfig::COD_PAYMENT_METHOD);
                if ($defaultPaymentMethod) {
                    Schema::table('invoice_orders', function (Blueprint $table) {
                        $table->dropColumn('payment_method');
                    });
                    Schema::table('invoice_orders', function (Blueprint $table) use ($defaultPaymentMethod){
                        $table->integer('payment_method')->default($defaultPaymentMethod->id);
                    });
                }
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
            if(Schema::hasColumn('invoice_orders', 'shipping_method')) {
                Schema::table('invoice_orders', function (Blueprint $table) {
                    $table->dropColumn('shipping_method');
                });
                Schema::table('invoice_orders', function (Blueprint $table) {
                    $table->string('shipping_method')->default(ReferencesConfig::STANDARD_SHIPPING_METHOD);
                });
            }
        }

        if(Schema::hasTable('invoice_orders')) {
            if(Schema::hasColumn('invoice_orders', 'payment_method')) {
                Schema::table('invoice_orders', function (Blueprint $table) {
                    $table->dropColumn('payment_method');
                });
                Schema::table('invoice_orders', function (Blueprint $table) {
                    $table->string('payment_method')->default(ReferencesConfig::COD_PAYMENT_METHOD);
                });
            }
        }
    }
}
