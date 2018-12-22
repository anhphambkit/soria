<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Packages\SystemGeneral\Constants\ReferencesConfig;
use Illuminate\Support\Facades\DB;

class CreateDataReferenceTypePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $postTypes = [
            [
                'type' => ReferencesConfig::POST_TYPE,
                'value' => "Normal",
                'slug' => "normal",
                'is_publish' => true,
            ],
            [
                'type' => ReferencesConfig::POST_TYPE,
                'value' => "Gallery",
                'slug' => "gallery",
                'is_publish' => true,
            ],
            [
                'type' => ReferencesConfig::POST_TYPE,
                'value' => "Slide",
                'slug' => "slide",
                'is_publish' => true,
            ],
            [
                'type' => ReferencesConfig::POST_TYPE,
                'value' => "Video",
                'slug' => "video",
                'is_publish' => false,
            ],
            [
                'type' => ReferencesConfig::POST_TYPE,
                'value' => "Audio",
                'slug' => "audio",
                'is_publish' => false,
            ]
        ];

        DB::table(ReferencesConfig::REFERENCE_TBL)->insert($postTypes);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table(ReferencesConfig::REFERENCE_TBL)->where('type', '=', ReferencesConfig::POST_TYPE)->delete();
    }
}
