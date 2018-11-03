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
    Route::get('/', function () {
        return view('backend.modern-admin.pages.dashboard');
    })->name('admin.dashboard');

    /************ Router Product ************** */
    Route::prefix('product')->group(function () {
        Route::get('/list', 'ProductCategoryController@indexProduct')->name('admin.product.index');
        Route::get('/new', 'ProductCategoryController@newProduct')->name('admin.product.new');
        Route::get('/edit/{id}', 'ProductCategoryController@editProduct')->name('admin.product.edit')->where('id', '[0-9]+');
        Route::get('/category/list', 'ProductCategoryController@indexCategoryProduct')->name('admin.product.category.index');
        Route::get('/category/new', 'ProductCategoryController@newCategoryProduct')->name('admin.product.category.new');
    });
});
