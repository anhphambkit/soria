<?php

Route::get('/', 'WebController@index')->name('frontend.index');
Route::get('/cart', 'WebController@cartDetail')->name('frontend.cart.index')->middleware(\Packages\Frontend\Middleware\CartMiddleware::class);
Route::get('/product/{slug}', 'WebController@productDetail')->name('frontend.product.detail');
Route::get('/post/{slug}.html', 'PostController@detail')->name('frontend.post.detail');