<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Packages\SystemGeneral\Constants\SettingConfig;
use Illuminate\Support\Facades\DB;
use App\Packages\Shop\Constants\MainServiceConfig;

class ModifySettingGeneralEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Update General Shop/Blog:
        $dataUpdate = [
            'main_type' => SettingConfig::SHOP_CONTACT_TYPE,
            'sub_type' => SettingConfig::EMAIL_TYPE,
            'value' => "hotro@soriabeauty.com",
            'name' => "Shop Email",
            'slug' => "shop_email",
            'type_data' => SettingConfig::TEXT_TYPE_DATA,
            'apply_for' => SettingConfig::SHOP,
            'is_publish' => true,
        ];

        DB::table(SettingConfig::SETTING_TBL)
            ->where('main_type', $dataUpdate['main_type'])
            ->where('sub_type', $dataUpdate['sub_type'])
            ->where('slug', $dataUpdate['slug'])
            ->update([ 'value' => $dataUpdate['value'] ]);


        // Update main Services Info:
        $dataService = [
            'title' => "Email",
            'desc' => "<p>Mọi thắc mắc hay yêu cầu hỗ trợ, vui lòng gửi email tới:</p><p>hotro@soriabeauty.com</p>",
            'icon' => "icon-f-72",
            'order' => 5,
        ];

        DB::table(MainServiceConfig::MAIN_SERVICES_TBL)
            ->where('title', $dataService['title'])
            ->where('order', $dataService['order'])
            ->where('icon', $dataService['icon'])
            ->update([ 'desc' => $dataService['desc'] ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
