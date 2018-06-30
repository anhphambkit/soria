<?php
use \Packages\Core\Middleware\PermissionMiddleware;
use \Packages\General\Permissions\Permission;
/*
| Define your awesome routing
*/
Route::middleware('auth')->prefix(config('eden')['backend_prefix_route']. '/general')->group(function () {
    Route::get('/', 'WebController@index')->name('general.index')->middleware(PermissionMiddleware::class. ':'. Permission::GENERAL_ACCESS);
});