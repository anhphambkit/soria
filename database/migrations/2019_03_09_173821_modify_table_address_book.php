<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ModifyTableAddressBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('address_book')) {
            if(Schema::hasColumn('address_book', 'name_address_book')) {
                Schema::table('address_book', function (Blueprint $table) {
                    $table->string('name_address_book')->nullable()->change();
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
        if(Schema::hasTable('address_book')) {
            if(Schema::hasColumn('address_book', 'name_address_book')) {
                DB::table('address_book')->whereNull('name_address_book')->update(['name_address_book' => "Default" ]);
                Schema::table('address_book', function (Blueprint $table) {
                    $table->string('name_address_book')->nullable(false)->change();
                });
            }
        }
    }
}
