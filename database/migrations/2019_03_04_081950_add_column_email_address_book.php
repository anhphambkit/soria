<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddColumnEmailAddressBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('address_book')) {
            if(!Schema::hasColumn('address_book', 'email')) {
                DB::table('address_book')->truncate();
                Schema::table('address_book', function (Blueprint $table) {
                    $table->string('email');
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
            if(Schema::hasColumn('address_book', 'email')) {
                Schema::table('address_book', function (Blueprint $table) {
                    $table->dropColumn('email');
                });
            }
        }
    }
}
