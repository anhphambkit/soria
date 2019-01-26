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

/*********************************************************
 *
 *                  ROUTE FOR FRONTEND MODULE
 *
 *********************************************************/
Route::domain('{mainDomain}')->group(function () {
    /************ Router Post ************** */

    /************ Router Shop ************** */
    Route::prefix('shop')->group(function () {
        Route::post('/add-to-cart', 'Shop\ShopController@addToCart')->name('ajax.shop.add_to_cart');

        /************ Router Product ************** */
//        Route::prefix('product')->group(function () {
//            // Product Detail:
//            Route::get('/detail/{urlProduct}', 'Shop\ShopController@viewDetailProduct')->name('client.product.detail');
//        });
    });
});