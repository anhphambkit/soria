<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Packages\SystemGeneral\Constants\ReferencesConfig;
use function \App\Helper\to_slug_helper;

class CreateReferenceStatusOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $statusOrderTypes = $this->getNewInsertDataStatusOrderTypes();

        DB::table(ReferencesConfig::REFERENCE_TBL)->insert($statusOrderTypes);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $rollbackData = $this->getNewInsertDataStatusOrderTypes();
        foreach ($rollbackData as $data) {
            DB::table(ReferencesConfig::REFERENCE_TBL)
                ->where('type', '=', $data['type'])
                ->where('value', '=', $data['value'])
                ->where('slug', '=', $data['slug'])
                ->delete();
        }
    }

    public function getNewInsertDataStatusOrderTypes() {
        $statusOrderTypes = [
            [
                'type' => ReferencesConfig::STATUS_INVOICE_ORDER_TYPE,
                'value' => ReferencesConfig::NEW_INVOICE_ORDER_STATUS,
                'slug' => to_slug_helper(ReferencesConfig::NEW_INVOICE_ORDER_STATUS),
                'is_publish' => true,
            ],
            [
                'type' => ReferencesConfig::STATUS_INVOICE_ORDER_TYPE,
                'value' => ReferencesConfig::PROCESSING_INVOICE_ORDER_STATUS,
                'slug' => to_slug_helper(ReferencesConfig::PROCESSING_INVOICE_ORDER_STATUS),
                'is_publish' => true,
            ],
            [
                'type' => ReferencesConfig::STATUS_INVOICE_ORDER_TYPE,
                'value' => ReferencesConfig::COMPLETE_INVOICE_ORDER_STATUS,
                'slug' => to_slug_helper(ReferencesConfig::COMPLETE_INVOICE_ORDER_STATUS),
                'is_publish' => true,
            ],
        ];
        return $statusOrderTypes;
    }
}
