<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Packages\SystemGeneral\Constants\ReferencesConfig;
use function App\Helper\to_slug_helper;
use Illuminate\Support\Facades\DB;

class CreateDataShipingPaymentMethodReference extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $newData = $this->getNewInsertDataShippingPaymentMethods();

        DB::table(ReferencesConfig::REFERENCE_TBL)->insert($newData);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $rollbackData = $this->getNewInsertDataShippingPaymentMethods();
        foreach ($rollbackData as $data) {
            DB::table(ReferencesConfig::REFERENCE_TBL)
                ->where('type', '=', $data['type'])
                ->where('value', '=', $data['value'])
                ->where('slug', '=', $data['slug'])
                ->delete();
        }
    }

    public function getNewInsertDataShippingPaymentMethods() {
        $shipPaymentTypes = [
            [
                'type' => ReferencesConfig::SHIPPING_METHOD_TYPE,
                'value' => ReferencesConfig::STANDARD_SHIPPING_METHOD,
                'slug' => to_slug_helper(ReferencesConfig::STANDARD_SHIPPING_METHOD),
                'is_publish' => true,
            ],
            [
                'type' => ReferencesConfig::PAYMENT_METHOD_TYPE,
                'value' => ReferencesConfig::COD_PAYMENT_METHOD,
                'slug' => to_slug_helper(ReferencesConfig::COD_PAYMENT_METHOD),
                'is_publish' => true,
            ],
        ];
        return $shipPaymentTypes;
    }
}
