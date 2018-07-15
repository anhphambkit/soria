<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/15/18
 * Time: 11:37
 */

/*********************************************************
 *
 *                  ROUTE FOR ADMIN MODULE
 *
 *********************************************************/
Route::domain('{subDomain}.{mainDomain}')->group(function () {
    /************ Router Product ************** */
    Route::prefix('product')->group(function () {
        Route::post('/createNewProductCategory', 'ProductController@createNewProductCategory')->name('admin_ajax.product.create_new_category');
    });
});