<?php

use Illuminate\Database\Seeder;
use App\Packages\SystemGeneral\Constants\SettingConfig;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultSettings = [
            // Setting for blog:
            [
                'main_type' => SettingConfig::BLOG_INFO_TYPE,
                'sub_type' => null,
                'value' => "storage/settings/blog/logo-default.png",
                'name' => "Blog Logo",
                'slug' => "blog_logo",
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_INFO_TYPE,
                'sub_type' => null,
                'value' => "storage/settings/blog/favicon-default.png",
                'name' => "Blog Favicon",
                'slug' => "blog_favicon",
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_INFO_TYPE,
                'sub_type' => null,
                'value' => "Soria's Blog. All Rights Reserved.",
                'name' => "Blog Signature",
                'slug' => "blog_signature",
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_AUTHOR_INFO_TYPE,
                'sub_type' => null,
                'value' => "storage/settings/blog/author-default.png",
                'name' => "Blog Avatar Author",
                'slug' => "blog_avatar_author",
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_AUTHOR_INFO_TYPE,
                'sub_type' => null,
                'value' => "Hi there, I'm Soria Nguyen",
                'name' => "Blog Hi Sentence",
                'slug' => "blog_hi_sentence",
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_AUTHOR_INFO_TYPE,
                'sub_type' => null,
                'value' => "I’m a Freelance Interactive Art Director based in France. Focusing across branding and identity, digital and print.",
                'name' => "Blog Introduce Of Author",
                'slug' => "blog_introduce_author",
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_AUTHOR_INFO_TYPE,
                'sub_type' => null,
                'value' => "Short About Me",
                'name' => "Blog Short About",
                'slug' => "blog_short_about",
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_SOCIALS_TYPE,
                'sub_type' => SettingConfig::FACEBOOK_TYPE,
                'value' => "facebook.com",
                'name' => "Blog Facebook",
                'slug' => "blog_facebook",
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_SOCIALS_TYPE,
                'sub_type' => SettingConfig::INSTAGRAM_TYPE,
                'value' => "instagram.com",
                'name' => "Blog Instagram",
                'slug' => "blog_instagram",
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_SOCIALS_TYPE,
                'sub_type' => SettingConfig::TWITTER_TYPE,
                'value' => "twitter.com",
                'name' => "Blog Twitter",
                'slug' => "blog_twitter",
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],

            //Setting for shop:
            [
                'main_type' => SettingConfig::SHOP_INFO_TYPE,
                'sub_type' => null,
                'value' => "storage/settings/blog/logo-default.png",
                'name' => "Shop Logo",
                'slug' => "shop_logo",
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_INFO_TYPE,
                'sub_type' => null,
                'value' => "storage/settings/blog/favicon-default.png",
                'name' => "Shop Favicon",
                'slug' => "shop_favicon",
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_INFO_TYPE,
                'sub_type' => null,
                'value' => "Soria Shop. All Rights Reserved.",
                'name' => "Shop Signature",
                'slug' => "shop_signature",
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_CONTACT_TYPE,
                'sub_type' => SettingConfig::ADDRESS_TYPE,
                'value' => "Address 1",
                'name' => "Shop Address",
                'slug' => "shop_address",
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_CONTACT_TYPE,
                'sub_type' => SettingConfig::PHONE_TYPE,
                'value' => "(032) 865 2406",
                'name' => "Shop Phone",
                'slug' => "shop_phone",
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_CONTACT_TYPE,
                'sub_type' => SettingConfig::PHONE_TYPE,
                'value' => "(077) 353 0707",
                'name' => "Shop Phone",
                'slug' => "shop_phone",
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_CONTACT_TYPE,
                'sub_type' => SettingConfig::EMAIL_TYPE,
                'value' => "phamtuananh.bkit@gmail.com",
                'name' => "Shop Email",
                'slug' => "shop_email",
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_SOCIALS_TYPE,
                'sub_type' => SettingConfig::FACEBOOK_TYPE,
                'value' => "facebook.com",
                'name' => "Shop Facebook",
                'slug' => "shop_facebook",
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_SOCIALS_TYPE,
                'sub_type' => SettingConfig::INSTAGRAM_TYPE,
                'value' => "instagram.com",
                'name' => "Shop Instagram",
                'slug' => "shop_instagram",
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_SOCIALS_TYPE,
                'sub_type' => SettingConfig::TWITTER_TYPE,
                'value' => "twitter.com",
                'name' => "Shop Twitter",
                'slug' => "shop_twitter",
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
        ];

        DB::table(SettingConfig::SETTING_TBL)->insert($defaultSettings);
    }
}
