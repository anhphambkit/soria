<?php
use \Packages\Core\Middleware\PermissionMiddleware;
use \Packages\Media\Permissions\Permission;
/*
| Define your awesome routing
*/
Route::middleware('auth')->prefix(config('eden')['backend_prefix_route']. '/media')->group(function () {
    Route::get('/', 'WebController@index')->name('media.index')->middleware(PermissionMiddleware::class. ':'. Permission::MEDIA_ACCESS);
    Route::get('/upload', 'WebController@upload')->name('media.upload')->middleware(PermissionMiddleware::class. ':'. Permission::MEDIA_UPLOAD);
});