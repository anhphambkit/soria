<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Packages\Shop\Constants\MainServiceConfig;
use Illuminate\Support\Facades\DB;

class ModifyTableMainServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $updateService = [
            'title' => "Freeship",
            'desc' => "<p>Soria Beauty miễn phí giao hàng với tất cả đơn hàng trong nội thành HCM và các đơn hàng có tổng giá trị >600k ở ngoại thành HCM!</p>"
        ];
        DB::table(MainServiceConfig::MAIN_SERVICES_TBL)
            ->where('title', $updateService['title'])
            ->update(['desc' => $updateService['desc']]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $updateService = [
            'title' => "Freeship",
            'desc' => "<p>Soria Beauty miễn phí giao hàng với đơn hàng >600k</p>"
        ];
        DB::table(MainServiceConfig::MAIN_SERVICES_TBL)
            ->where('title', $updateService['title'])
            ->update(['desc' => $updateService['desc']]);
    }
}
