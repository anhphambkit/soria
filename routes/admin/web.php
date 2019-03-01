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
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('backend.modern-admin.pages.dashboard');
        })->name('admin.dashboard')->middleware('admin_portal');

        /************ Router Product ************** */
        Route::prefix('product')->group(function () {
            // Product Category:
            Route::get('/category/list', 'Product\ProductCategoryController@indexCategoryProduct')->name('admin.product.category.index')->middleware('admin_portal');
            Route::get('/category/new', 'Product\ProductCategoryController@newCategoryProduct')->name('admin.product.category.new')->middleware('admin_portal');

            // Product:
            Route::get('/list', 'Product\ProductController@indexProduct')->name('admin.product.index')->middleware('admin_portal');
            Route::get('/new', 'Product\ProductController@newProduct')->name('admin.product.new')->middleware('admin_portal');
        });

        /************ Router Post ************** */
        Route::prefix('post')->group(function () {
            // Post Category:
            Route::get('/list', 'Post\PostController@indexPost')->name('admin.post.index')->middleware('admin_portal');
            Route::get('/new', 'Post\PostCategoryController@newPost')->name('admin.post.new')->middleware('admin_portal');
            Route::get('/edit/{id}', 'Post\PostCategoryController@editPost')->name('admin.post.edit')->where('id', '[0-9]+')->middleware('admin_portal');
            Route::get('/category/list', 'Post\PostCategoryController@indexCategoryPost')->name('admin.post.category.index')->middleware('admin_portal');
            Route::get('/category/new', 'Post\PostCategoryController@newCategoryPost')->name('admin.post.category.new')->middleware('admin_portal');
        });

        /************ Router Setting ************** */
        Route::prefix('setting')->group(function () {
            // Post Category:
            Route::get('/blog-setting', 'General\BlogSettingController@blogSettings')->name('admin.setting.blog')->middleware('admin_portal');
        });
    });
});
