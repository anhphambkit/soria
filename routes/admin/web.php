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
        return view('backend.ModernAdmin.pages.dashboard');
    })->name('admin.dashboard');

    /************ Router Product ************** */
    Route::prefix('product')->group(function () {
        Route::get('/list', 'ProductController@indexProduct')->name('admin.product.index');
        Route::get('/new', 'ProductController@newProduct')->name('admin.product.new');
        Route::get('/edit/{id}', 'ProductController@editProduct')->name('admin.product.edit')->where('id', '[0-9]+');
        Route::get('/category/list', 'ProductController@indexCategoryProduct')->name('admin.product.category.index');
        Route::get('/category/new', 'ProductController@newCategoryProduct')->name('admin.product.category.new');
    });
});
