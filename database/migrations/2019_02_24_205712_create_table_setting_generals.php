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
                'value' => "storage/settings/logo/logo-primary.png",
                'name' => "Blog Logo Primary",
                'slug' => "blog_logo_primary",
                'type_data' => SettingConfig::IMAGE_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_INFO_TYPE,
                'sub_type' => null,
                'value' => "storage/settings/logo/logo-secondary.png",
                'name' => "Blog Logo Secondary",
                'slug' => "blog_logo_secondary",
                'type_data' => SettingConfig::IMAGE_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_INFO_TYPE,
                'sub_type' => null,
                'value' => "storage/settings/blog/logo-fav.png",
                'name' => "Blog Favicon",
                'slug' => "blog_favicon",
                'type_data' => SettingConfig::IMAGE_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_INFO_TYPE,
                'sub_type' => null,
                'value' => "&copy; Soria Beauty - Blog 2019. All Rights Reserved.",
                'name' => "Blog Signature",
                'slug' => "blog_signature",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_AUTHOR_INFO_TYPE,
                'sub_type' => null,
                'value' => "storage/settings/blog/author/avatar.png",
                'name' => "Blog Avatar Author",
                'slug' => "blog_avatar_author",
                'type_data' => SettingConfig::IMAGE_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_AUTHOR_INFO_TYPE,
                'sub_type' => null,
                'value' => "Xin chào! Tôi là Soria Nguyễn",
                'name' => "Blog Hi Sentence",
                'slug' => "blog_hi_sentence",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_AUTHOR_INFO_TYPE,
                'sub_type' => null,
                'value' => "Tôi là một bác sĩ da liễu. Tôi viết blog chia sẻ những kiến thức về da liễu bệnh lý, da liễu thẩm mỹ và cách chăm sóc đối với từng vấn đề da khác nhau.",
                'name' => "Blog Introduce Of Author",
                'slug' => "blog_introduce_author",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_AUTHOR_INFO_TYPE,
                'sub_type' => null,
                'value' => "<p>Don’t worry if your job is small, </p><br /><p>And your rewards are few.</p><br /><p>Remember that the mighty oak,</p><br /><p>Was once a nut like you.</p><br />",
                'name' => "Blog Short About",
                'slug' => "blog_short_about",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::BLOG_SOCIALS_TYPE,
                'sub_type' => SettingConfig::FACEBOOK_TYPE,
                'value' => "https://www.facebook.com/soria.nguyen.7",
                'name' => "Blog Facebook",
                'slug' => "blog_facebook",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::BLOG,
                'is_publish' => true,
            ],

            //Setting for shop:
            [
                'main_type' => SettingConfig::SHOP_INFO_TYPE,
                'sub_type' => null,
                'value' => "storage/settings/logo/logo-primary.png",
                'name' => "Shop Logo Primary",
                'slug' => "shop_logo_primary",
                'type_data' => SettingConfig::IMAGE_TYPE_DATA,
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_INFO_TYPE,
                'sub_type' => null,
                'value' => "storage/settings/logo/logo-secondary.png",
                'name' => "Shop Logo Secondary",
                'slug' => "shop_logo_secondary",
                'type_data' => SettingConfig::IMAGE_TYPE_DATA,
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_INFO_TYPE,
                'sub_type' => null,
                'value' => "storage/settings/logo/logo-fav.png",
                'name' => "Shop Favicon",
                'slug' => "shop_favicon",
                'type_data' => SettingConfig::IMAGE_TYPE_DATA,
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_INFO_TYPE,
                'sub_type' => null,
                'value' => "&copy; Soria Beauty - Shop 2019. All Rights Reserved.",
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
                'value' => "(0372) 744 289",
                'name' => "Shop Phone",
                'slug' => "shop_phone",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_CONTACT_TYPE,
                'sub_type' => SettingConfig::EMAIL_TYPE,
                'value' => "soriabeauty@gmail.com",
                'name' => "Shop Email",
                'slug' => "shop_email",
                'type_data' => SettingConfig::TEXT_TYPE_DATA,
                'apply_for' => SettingConfig::SHOP,
                'is_publish' => true,
            ],
            [
                'main_type' => SettingConfig::SHOP_SOCIALS_TYPE,
                'sub_type' => SettingConfig::FACEBOOK_TYPE,
                'value' => "https://www.facebook.com/SoriaBeauty.Eucerin",
                'name' => "Shop Facebook",
                'slug' => "shop_facebook",
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
