<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddColumnEmailAddressView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('DROP VIEW IF EXISTS address_book_view');
        DB::statement("
            CREATE OR REPLACE VIEW address_book_view AS
            SELECT 
                address_book.*,
                districts.name as district_name,
                provinces_cities.name as province_city_name,
                wards.name as ward_name
            FROM address_book
            LEFT JOIN districts ON address_book.district_code = districts.code
            LEFT JOIN provinces_cities ON address_book.province_city_code = provinces_cities.code
            LEFT JOIN wards ON address_book.ward_code = wards.code
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS address_book_view');
    }
}
