<?php
use \Packages\Core\Middleware\PermissionMiddleware;
use \Packages\Order\Permissions\Permission;
/*
| Define your awesome routing
*/
Route::middleware('auth')->prefix(config('eden')['backend_prefix_route']. '/order')->group(function () {
    Route::get('/', 'OrderController@index')->name('order.index')->middleware(PermissionMiddleware::class. ':'. Permission::ORDER_ACCESS);

    Route::get('/new', 'OrderController@create')->name('order.order.new')->middleware(PermissionMiddleware::class. ':'. Permission::ORDER_CREATE);
    Route::get('/edit/{id}', 'OrderController@edit')->name('order.order.edit')->middleware(PermissionMiddleware::class. ':'. Permission::ORDER_EDIT);
});