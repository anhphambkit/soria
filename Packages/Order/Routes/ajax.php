<?php

/*
| Define your awesome routing
*/

// Orders
Route::post('/order/create', 'OrderController@create')->name('order.order.create');
Route::post('/order/cal-bill', 'OrderController@calBilling')->name('order.order.cal-billing');
Route::middleware('auth')->group(function () {
    Route::post('/order/update/{id}', 'OrderController@update')->name('order.order.update')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Order\Permissions\Permission::ORDER_EDIT)->where('id', '[0-9]+');

    Route::delete('/order/delete', 'OrderController@delete')->name('order.order.delete')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Order\Permissions\Permission::ORDER_DELETE);


});

