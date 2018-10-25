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
        Route::post('/createProductCategory', 'ProductCategoryController@createProductCategory')->name('admin_ajax.product.create_product_category');
        Route::get('/getAllProductCategory', 'ProductCategoryController@getAllProductCategory')->name('admin_ajax.product.get_all_product_category');
        Route::get('/getDetailProductCategory', 'ProductCategoryController@getDetailProductCategory')->name('admin_ajax.product.get_detail_product_category');
        Route::patch('/updateProductCategory', 'ProductCategoryController@updateProductCategory')->name('admin_ajax.product.update_product_category');
    });
});