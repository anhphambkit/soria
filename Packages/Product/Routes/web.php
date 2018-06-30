<?php
use \Packages\Core\Middleware\PermissionMiddleware;
use \Packages\Product\Permissions\Permission;
/*
| Define your awesome routing
*/
Route::middleware('auth')->prefix(config('eden')['backend_prefix_route']. '/product')->group(function () {
    Route::get('/list', 'WebController@index')->name('product.index')->middleware(PermissionMiddleware::class. ':'. Permission::PRODUCT_ACCESS);
    Route::get('/new', 'WebController@newProduct')->name('product.new')->middleware(PermissionMiddleware::class. ':'. Permission::PRODUCT_CREATE);
    Route::get('/edit/{id}', 'WebController@editProduct')->name('product.edit')->middleware(PermissionMiddleware::class. ':'. Permission::PRODUCT_EDIT)->where('id', '[0-9]+');
    Route::get('/category/list', 'WebController@categoryIndex')->name('product.category.index')->middleware(PermissionMiddleware::class. ':'. Permission::PRODUCT_CATEGORY_ACCESS);
    Route::get('/manufacturer', 'WebController@manufacturerIndex')->name('product.manufacturer.index')->middleware(PermissionMiddleware::class. ':'. Permission::PRODUCT_MANUFACTURER_ACCESS);
});