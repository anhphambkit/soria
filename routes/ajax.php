<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/1/18
 * Time: 21:45
 */

/** Router Upload */
Route::prefix('upload')->group(function() {
    Route::post('/image', 'MediaController@uploadImage')->name('ajax.upload.image');
});