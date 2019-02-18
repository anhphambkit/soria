<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/1/18
 * Time: 21:45
 */

/*********************************************************
 *
 *                  ROUTE FOR GENERAL
 *
 *********************************************************/
Route::domain('{mainDomain}')->group(function () {
    Route::prefix('address')->group(function () {
        Route::get('/refresh-districts', 'AddressController@getDistrictsByCity')->name('general_ajax.address.refresh_districts');
        Route::get('/refresh-wards', 'AddressController@getWardsByDistrict')->name('general_ajax.address.refresh_wards');
    });
});