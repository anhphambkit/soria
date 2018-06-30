<?php

/*
| Define your awesome routing
*/
Route::middleware('auth')->group(function () {
    Route::post('/frontend/banner/create', 'BannerController@create')->name('frontend.banner.create')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Frontend\Permissions\Permission::FRONTEND_BANNER_CREATE);

    Route::post('/frontend/banner/update/{id}', 'BannerController@update')->name('frontend.banner.update')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Frontend\Permissions\Permission::FRONTEND_BANNER_EDIT)->where('id', '[0-9]+');

    Route::delete('/frontend/banner/delete', 'BannerController@delete')->name('frontend.banner.delete')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Frontend\Permissions\Permission::FRONTEND_BANNER_DELETE);
});


Route::post('/frontend/cart/add', 'CartController@add')->name('frontend.cart.add');
Route::post('/frontend/cart/update/{rowId}', 'CartController@update')->name('frontend.cart.update');
Route::post('/frontend/cart/remove/{rowId}', 'CartController@remove')->name('frontend.cart.remove');
Route::post('/frontend/cart/destroy', 'CartController@destroy')->name('frontend.cart.destroy');
Route::post('/frontend/cart/checkout', 'CartController@checkout')->name('frontend.cart.checkout');