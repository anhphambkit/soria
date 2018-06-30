<?php
use \Packages\Core\Middleware\PermissionMiddleware;
use \Packages\Payment\Permissions\Permission;
/*
| Define your awesome routing
*/
Route::middleware('auth')->prefix(config('eden')['backend_prefix_route']. '/payment')->group(function () {
    Route::get('/', 'WebController@index')->name('payment.index')->middleware(PermissionMiddleware::class. ':'. Permission::PAYMENT_ACCESS);
});