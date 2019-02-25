<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Packages\SystemGeneral\Constants\SettingConfig;

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
            $table->integer('order')->default(0);
            $table->string('code')->nullable();
            $table->boolean('is_publish')->default(true)->comment('true: Published');
            $table->timestamps();
        });
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
