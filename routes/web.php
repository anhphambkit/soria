<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*********************************************************
 *
 *                  ROUTE FOR FRONTEND MODULE
 *
 *********************************************************/
Route::domain('{mainDomain}')->group(function () {
    Route::get('/', 'ClientController@index')->name('client.page.home');

    /************ Router Post ************** */
    Route::prefix('post')->group(function () {
        // Post Category:
        Route::get('/detail/{titlePost}', 'Post\PostController@viewDetailPost')->name('client.post.detail');
    });


    /************ Router Shop ************** */
    Route::prefix('shop')->group(function () {
        // Post Category:
        Route::get('/', 'Shop\ShopController@index')->name('client.shop.index');
    });
});