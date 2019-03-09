<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Packages\SystemGeneral\Constants\ReferencesConfig;
use Illuminate\Support\Facades\DB;
use function \App\Helper\to_slug_helper;

class CreateDataReferenceTypePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $postTypes = $this->getNewInsertDataPostTypes();

        DB::table(ReferencesConfig::REFERENCE_TBL)->insert($postTypes);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $rollbackData = $this->getNewInsertDataPostTypes();
        foreach ($rollbackData as $data) {
            DB::table(ReferencesConfig::REFERENCE_TBL)
                ->where('type', '=', $data['type'])
                ->where('value', '=', $data['value'])
                ->where('slug', '=', $data['slug'])
                ->delete();
        }
    }

    public function getNewInsertDataPostTypes() {
        $postTypes = [
            [
                'type' => ReferencesConfig::POST_TYPE,
                'value' => ReferencesConfig::NORMAL_POST_TYPE,
                'slug' => to_slug_helper(ReferencesConfig::NORMAL_POST_TYPE),
                'is_publish' => true,
            ],
            [
                'type' => ReferencesConfig::POST_TYPE,
                'value' => ReferencesConfig::GALLERY_POST_TYPE,
                'slug' => to_slug_helper(ReferencesConfig::GALLERY_POST_TYPE),
                'is_publish' => true,
            ],
            [
                'type' => ReferencesConfig::POST_TYPE,
                'value' => ReferencesConfig::SLIDE_POST_TYPE,
                'slug' => to_slug_helper(ReferencesConfig::SLIDE_POST_TYPE),
                'is_publish' => true,
            ],
            [
                'type' => ReferencesConfig::POST_TYPE,
                'value' => ReferencesConfig::VIDEO_POST_TYPE,
                'slug' => to_slug_helper(ReferencesConfig::VIDEO_POST_TYPE),
                'is_publish' => false,
            ],
            [
                'type' => ReferencesConfig::POST_TYPE,
                'value' => ReferencesConfig::AUDIO_POST_TYPE,
                'slug' => to_slug_helper(ReferencesConfig::AUDIO_POST_TYPE),
                'is_publish' => false,
            ]
        ];
        return $postTypes;
    }
}
