<?php
use \Packages\Core\Middleware\PermissionMiddleware;
use \Packages\Frontend\Permissions\Permission;
/*
| Frontend UI
*/
Route::middleware('auth')->prefix(config('eden')['backend_prefix_route']. '/frontend')->group(function () {
    Route::get('/banners', 'BannerController@index')->name('frontend.banner.index')->middleware(PermissionMiddleware::class. ':'. Permission::FRONTEND_BANNER_ACCESS);

    Route::get('/banners/new', 'BannerController@create')->name('frontend.banner.new')->middleware(PermissionMiddleware::class. ':'. Permission::FRONTEND_BANNER_CREATE);

    Route::get('/banners/edit/{id}', 'BannerController@edit')->name('frontend.banner.edit')->middleware(PermissionMiddleware::class. ':'. Permission::FRONTEND_BANNER_EDIT);
});