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
    /**
     * Pages:
     */
    Route::get('/', 'Shop\ShopController@index')->name('client.page.home');

    /************ Router Post ************** */
    Route::prefix('blog')->group(function () {
        // Blog page:
        Route::get('/', 'Post\PostController@index')->name('client.blog.home');

        // Post Category:
        Route::get('/category/{urlCategory}', 'Post\PostController@viewCategoryPage')->name('client.blog.category_page');

        Route::prefix('post')->group(function () {
            // Post Detail
            Route::get('/detail/{urlPost}', 'Post\PostController@viewDetailPost')->name('client.post.detail');
        });
    });


    /************ Router Shop ************** */
    Route::prefix('shop')->group(function () {
        // Shop Home:
        Route::get('/', 'Shop\ShopController@index')->name('client.shop.index');

        // Cart Page
        Route::get('/cart', 'Shop\ShopController@cart')->name('client.shop.cart');
        Route::get('/complete-order', 'Shop\ShopController@completeOrder')->name('client.shop.complete_order');

        // Check out:
        Route::prefix('checkout')->group(function () {
            Route::get('/shipping', 'Shop\ShopController@checkoutShipping')->name('client.shop.checkout_shipping');
            Route::get('/payment', 'Shop\ShopController@checkoutPayment')->name('client.shop.checkout_payment');
        });


        /************ Router Product ************** */
        Route::prefix('product')->group(function () {
            // Product Detail:
            Route::get('/detail/{urlProduct}', 'Shop\ShopController@viewDetailProduct')->name('client.product.detail');
        });
    });
});