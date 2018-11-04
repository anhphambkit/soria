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
        // Product Category:
        Route::get('/list', 'Product\ProductCategoryController@indexProduct')->name('admin.product.index');
        Route::get('/new', 'Product\ProductCategoryController@newProduct')->name('admin.product.new');
        Route::get('/edit/{id}', 'Product\ProductCategoryController@editProduct')->name('admin.product.edit')->where('id', '[0-9]+');
        Route::get('/category/list', 'Product\ProductCategoryController@indexCategoryProduct')->name('admin.product.category.index');
        Route::get('/category/new', 'Product\ProductCategoryController@newCategoryProduct')->name('admin.product.category.new');
    });

    /************ Router Post ************** */
    Route::prefix('post')->group(function () {
        // Post Category:
        Route::get('/list', 'Post\PostCategoryController@indexPost')->name('admin.post.index');
        Route::get('/new', 'Post\PostCategoryController@newPost')->name('admin.post.new');
        Route::get('/edit/{id}', 'Post\PostCategoryController@editPost')->name('admin.post.edit')->where('id', '[0-9]+');
        Route::get('/category/list', 'Post\PostCategoryController@indexCategoryPost')->name('admin.post.category.index');
        Route::get('/category/new', 'Post\PostCategoryController@newCategoryPost')->name('admin.post.category.new');
    });
});
