<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Packages\SystemGeneral\Constants\SettingConfig;
use Illuminate\Support\Facades\DB;

class CreateTableSettingGenerals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(SettingConfig::SETTING_TBL, function (Blueprint $table) {
            $table->increments('id');
            $table->string('main_type');
            $table->string('sub_type')->nullable();
            $table->string('slug');
            $table->string('name');
            $table->text('value');
            $table->string('apply_for')->comment('shop | blog | all')->default(SettingConfig::ALL);
            $table->string('type_data')->comment('image | text | bool')->default(SettingConfig::TEXT_TYPE_DATA);
            $table->integer('order')->default(0);
            $table->string('code')->nullable();
            $table->boolean('is_publish')->default(true)->comment('true: Published');
            $table->timestamps();
        });

        $defaultSettings = [
            // Setting for blog:
            [
                'main_type' => SettingConfig::BLOG_INFO_TYPE,
                'sub_type' => null,
                'value' => "storage/settings/blog/logo-default.png",
                'name' => "Blog Logo",
                'slug' => "blog_logo",
                'type_data' => SettingConfig::IMAGE_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_INFO_TYPE,
                'sub_type' => null,
                'value' => "storage/settings/blog/favicon-default.png",
                'name' => "Blog Favicon",
                'slug' => "blog_favicon",
                'type_data' => SettingConfig::IMAGE_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_INFO_TYPE,
                'sub_type' => null,
                'value' => "Soria's Blog. All Rights Reserved.",
                'name' => "Blog Signature",
                'slug' => "blog_signature",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_AUTHOR_INFO_TYPE,
                'sub_type' => null,
                'value' => "storage/settings/blog/author-default.png",
                'name' => "Blog Avatar Author",
                'slug' => "blog_avatar_author",
                'type_data' => SettingConfig::IMAGE_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_AUTHOR_INFO_TYPE,
                'sub_type' => null,
                'value' => "Hi there, I'm Soria Nguyen",
                'name' => "Blog Hi Sentence",
                'slug' => "blog_hi_sentence",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_AUTHOR_INFO_TYPE,
                'sub_type' => null,
                'value' => "I’m a Freelance Interactive Art Director based in France. Focusing across branding and identity, digital and print.",
                'name' => "Blog Introduce Of Author",
                'slug' => "blog_introduce_author",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_AUTHOR_INFO_TYPE,
                'sub_type' => null,
                'value' => "Short About Me",
                'name' => "Blog Short About",
                'slug' => "blog_short_about",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_SOCIALS_TYPE,
                'sub_type' => SettingConfig::FACEBOOK_TYPE,
                'value' => "facebook.com",
                'name' => "Blog Facebook",
                'slug' => "blog_facebook",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_SOCIALS_TYPE,
                'sub_type' => SettingConfig::INSTAGRAM_TYPE,
                'value' => "instagram.com",
                'name' => "Blog Instagram",
                'slug' => "blog_instagram",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_SOCIALS_TYPE,
                'sub_type' => SettingConfig::TWITTER_TYPE,
                'value' => "twitter.com",
                'name' => "Blog Twitter",
                'slug' => "blog_twitter",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
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
                'type_data' => SettingConfig::IMAGE_TYPE_DATA,
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_INFO_TYPE,
                'sub_type' => null,
                'value' => "storage/settings/blog/favicon-default.png",
                'name' => "Shop Favicon",
                'slug' => "shop_favicon",
                'type_data' => SettingConfig::IMAGE_TYPE_DATA,
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_INFO_TYPE,
                'sub_type' => null,
                'value' => "Soria Shop. All Rights Reserved.",
                'name' => "Shop Signature",
                'slug' => "shop_signature",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_CONTACT_TYPE,
                'sub_type' => SettingConfig::ADDRESS_TYPE,
                'value' => "Address 1",
                'name' => "Shop Address",
                'slug' => "shop_address",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_CONTACT_TYPE,
                'sub_type' => SettingConfig::PHONE_TYPE,
                'value' => "(032) 865 2406",
                'name' => "Shop Phone",
                'slug' => "shop_phone",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_CONTACT_TYPE,
                'sub_type' => SettingConfig::PHONE_TYPE,
                'value' => "(077) 353 0707",
                'name' => "Shop Phone",
                'slug' => "shop_phone",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_CONTACT_TYPE,
                'sub_type' => SettingConfig::EMAIL_TYPE,
                'value' => "phamtuananh.bkit@gmail.com",
                'name' => "Shop Email",
                'slug' => "shop_email",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_SOCIALS_TYPE,
                'sub_type' => SettingConfig::FACEBOOK_TYPE,
                'value' => "facebook.com",
                'name' => "Shop Facebook",
                'slug' => "shop_facebook",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_SOCIALS_TYPE,
                'sub_type' => SettingConfig::INSTAGRAM_TYPE,
                'value' => "instagram.com",
                'name' => "Shop Instagram",
                'slug' => "shop_instagram",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_SOCIALS_TYPE,
                'sub_type' => SettingConfig::TWITTER_TYPE,
                'value' => "twitter.com",
                'name' => "Shop Twitter",
                'slug' => "shop_twitter",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
        ];

        DB::table(SettingConfig::SETTING_TBL)->insert($defaultSettings);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_settings');
    }
}
