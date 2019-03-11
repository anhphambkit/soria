<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Packages\SystemGeneral\Constants\SettingConfig;
use Illuminate\Support\Facades\DB;

class AddDataSettingSeoGeneral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $dataCreate = $this->newDataMetaSeoGenerals();

        DB::table(SettingConfig::SETTING_TBL)->insert($dataCreate);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $dataCreate = $this->newDataMetaSeoGenerals();

        foreach ($dataCreate as $data) {
            DB::table(SettingConfig::SETTING_TBL)
                ->where('main_type', $data['main_type'])
                ->where('slug', $data['slug'])
                ->delete();
        }
    }

    /**
     * @return array
     */
    public function newDataMetaSeoGenerals() {
        $newData = [
            [
                'main_type' => SettingConfig::SHOP_INFO_TYPE,
                'value' => "Soria Beauty shop <br/> Chuyên dược mỹ phẩm Eucerin chính hãng 100%",
                'name' => "Shop Title",
                'slug' => "shop_title",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_INFO_TYPE,
                'value' => "Soria beauty, soriabeauty, dược mỹ phẩm, eucerin, Eucerin",
                'name' => "Shop Meta Keywords",
                'slug' => "shop_meta_keywords",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_INFO_TYPE,
                'value' => "Soria Beauty - Shop online TP HCM <br/> Chuyên dược mỹ phẩm Eucerin chính hãng 100%",
                'name' => "Shop Meta Description",
                'slug' => "shop_meta_description",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],

            [
                'main_type' => SettingConfig::BLOG_INFO_TYPE,
                'value' => "Soria Nguyễn - Soria Beauty <br/> Blog chia sẻ kiến thức bệnh da, chăm sóc da.",
                'name' => "Blog Title",
                'slug' => "blog_title",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_INFO_TYPE,
                'value' => "Soria Beauty, Soria Nguyễn, kiến thức bệnh da, kiến thức chăm sóc da, bệnh da, chăm sóc da",
                'name' => "Blog Meta Keywords",
                'slug' => "blog_meta_keywords",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_INFO_TYPE,
                'value' => "Soria Nguyễn - Soria Beauty <br/> Blog chia sẻ kiến thức bệnh da, chăm sóc da.",
                'name' => "Blog Meta Description",
                'slug' => "blog_meta_description",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
        ];
        return $newData;
    }
}
