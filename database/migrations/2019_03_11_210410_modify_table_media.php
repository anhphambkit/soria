<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTableMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('media__files')) {
            if(!Schema::hasColumn('media__files', 'path_300x300')) {
                Schema::table('media__files', function (Blueprint $table) {
                    $table->string('path_300x300')->nullable();
                });
            }

            if(!Schema::hasColumn('media__files', 'path_300x400')) {
                Schema::table('media__files', function (Blueprint $table) {
                    $table->string('path_300x400')->nullable();
                });
            }

            if(!Schema::hasColumn('media__files', 'path_880x400')) {
                Schema::table('media__files', function (Blueprint $table) {
                    $table->string('path_880x400')->nullable();
                });
            }

            if(!Schema::hasColumn('media__files', 'path_150x150')) {
                Schema::table('media__files', function (Blueprint $table) {
                    $table->string('path_150x150')->nullable();
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('media__files')) {
            if(Schema::hasColumn('media__files', 'path_300x300')) {
                Schema::table('media__files', function (Blueprint $table) {
                    $table->dropColumn('path_300x300');
                });
            }

            if(Schema::hasColumn('media__files', 'path_300x400')) {
                Schema::table('media__files', function (Blueprint $table) {
                    $table->dropColumn('path_300x400');
                });
            }

            if(Schema::hasColumn('media__files', 'path_880x400')) {
                Schema::table('media__files', function (Blueprint $table) {
                    $table->dropColumn('path_880x400');
                });
            }

            if(Schema::hasColumn('media__files', 'path_150x150')) {
                Schema::table('media__files', function (Blueprint $table) {
                    $table->dropColumn('path_150x150');
                });
            }
        }
    }
}
