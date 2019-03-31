<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Packages\SystemGeneral\Constants\SettingConfig;
use Illuminate\Support\Facades\DB;

class ModifyTableGeneralSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $updateData = [
            'main_type' => SettingConfig::SHOP_INFO_TYPE,
            'value' => "Soria Beauty <br/> Chuyên dược mỹ phẩm Eucerin chính hãng 100%",
            'name' => "Shop Title",
            'slug' => "shop_title",
            'type_data' => SettingConfig::TEXT_TYPE_DATA,
            'apply_for' => SettingConfig::SHOP,
            'is_publish' => true,
        ];
        DB::table(SettingConfig::SETTING_TBL)
            ->where('main_type', $updateData['main_type'])
            ->where('slug', $updateData['slug'])
            ->update(['value' => $updateData['value']]);

        // Insert new data:
        $newData = $this->getNewDataGeneralSetting();

        foreach ($newData as $data) {
            DB::table(SettingConfig::SETTING_TBL)
                ->insert($data);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       $updateData = [
           'main_type' => SettingConfig::SHOP_INFO_TYPE,
           'value' => "Soria Beauty Shop <br/> Chuyên dược mỹ phẩm Eucerin chính hãng 100%",
           'name' => "Shop Title",
           'slug' => "shop_title",
           'type_data' => SettingConfig::TEXT_TYPE_DATA,
           'apply_for' => SettingConfig::SHOP,
           'is_publish' => true,
       ];
        DB::table(SettingConfig::SETTING_TBL)
            ->where('main_type', $updateData['main_type'])
            ->where('slug', $updateData['slug'])
            ->update(['value' => $updateData['value']]);

        $newData = $this->getNewDataGeneralSetting();

        foreach ($newData as $data) {
            DB::table(SettingConfig::SETTING_TBL)
                ->where('main_type', $data['main_type'])
                ->where('slug', $data['slug'])
                ->delete();
        }
    }

    /**
     * @return array
     */
    public function getNewDataGeneralSetting() {
        return [
            [
                'main_type' => SettingConfig::WEB_INFO_TYPE,
                'value' => "https://www.soriabeauty.com/",
                'name' => "Website Link",
                'slug' => "website_link",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::ALL,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::WEB_INFO_TYPE,
                'value' => "2415663121778791",
                'name' => "ID Facebook App",
                'slug' => "id_facebook_app",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::ALL,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_INFO_TYPE,
                'value' => "VNĐ",
                'name' => "Currency",
                'slug' => "currency",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::WEB_INFO_TYPE,
                'value' => "vi_VN",
                'name' => "Locale",
                'slug' => "locale",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::ALL,
                'is_publish' => true,
            ],
        ];
    }
}
