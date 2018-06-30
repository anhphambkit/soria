<?php

use Illuminate\Database\Migrations\Migration;

class CreateFrontendGeneralConfigSeeder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $generalDefaultConfig = [
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SITE_URL
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SITE_NAME
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SITE_LANG
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_FB
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_TWITTER
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_GOOGLE
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_ZALO
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_PINTEREST
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_LINKEDIN
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SOCIAL_FLICKR
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_PHONE
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SECOND_PHONE
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_THIRD_PHONE
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_FOUR_PHONE
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_COMPANY
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_WORKING_TIME
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_ADD1
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_ADD2
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_ADD3
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_ADD4
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_SKYPE
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_YOUTUBE
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_EMAIL
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_EMAIL2
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_EMAIL3
            ],
            [
                'key'   => \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_EMAIL4
            ],
        ];

        foreach ($generalDefaultConfig as $config){
            $config['package'] = \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_PACKAGE;
            \Illuminate\Support\Facades\DB::table('system_config')->insert($config);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('system_config')->where('package', \Packages\General\Config\GeneralConfig::GENERAL_SYSTEM_CONFIG_PACKAGE)->delete();
    }
}
