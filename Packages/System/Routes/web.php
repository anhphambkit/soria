<?php
use \Packages\Core\Middleware\PermissionMiddleware;
use \Packages\System\Permissions\Permission;
/*
| Define your awesome routing
*/
Route::middleware('auth')->prefix(config('eden')['backend_prefix_route']. '/system')->group(function () {
    Route::get('/', 'WebController@index')->name('system.index')->middleware(PermissionMiddleware::class. ':'. Permission::SYSTEM_ACCESS);
});