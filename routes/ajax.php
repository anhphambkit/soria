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
        Route::post('/add-to-cart', 'Shop\ShopController@addOrUpdateProductsToCartOfUser')->name('ajax.shop.add_to_cart');
        Route::post('/delete-product-in-cart', 'Shop\ShopController@deleteProductInCart')->name('ajax.shop.delete_product_in_cart');

        Route::get('/view-cart-header', 'Shop\ShopController@viewCartHeader')->name('ajax.shop.view_cart_header');

        /************ Router Product ************** */
//        Route::prefix('product')->group(function () {
//            // Product Detail:
//            Route::get('/detail/{urlProduct}', 'Shop\ShopController@viewDetailProduct')->name('client.product.detail');
//        });
    });
});