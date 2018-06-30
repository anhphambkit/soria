<?php
use \Packages\Core\Middleware\PermissionMiddleware;
use \Packages\Media\Permissions\Permission;
/*
| Define your awesome routing
*/
Route::middleware('auth')->prefix('media')->group(function () {
    Route::post('/upload', 'AjaxController@upload')->name('ajax.media.upload')->middleware(PermissionMiddleware::class. ':'. Permission::MEDIA_UPLOAD);

    Route::delete('/delete', 'AjaxController@delete')->name('ajax.media.delete')->middleware(PermissionMiddleware::class. ':'. Permission::MEDIA_DELETE);
});