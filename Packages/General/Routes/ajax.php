<?php

/*
| Define your awesome routing
*/
Route::middleware('auth')->group(function () {
    Route::post('/frontend/general/update', 'AjaxController@update')->name('frontend.general.update')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\General\Permissions\Permission::GENERAL_EDIT);
});