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
                'value' => "Gallery",
                'slug' => "gallery",
            ],
            [
                'type' => ReferencesConfig::POST_TYPE,
                'value' => "Slide",
                'slug' => "slide",
            ],
            [
                'type' => ReferencesConfig::POST_TYPE,
                'value' => "Video",
                'slug' => "video",
            ],
            [
                'type' => ReferencesConfig::POST_TYPE,
                'value' => "Audio",
                'slug' => "audio",
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
