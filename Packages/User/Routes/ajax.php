<?php

use \Packages\Core\Middleware\PermissionMiddleware;
use \Packages\User\Permissions\Permission;
/*
| Define your awesome routing
*/
Route::middleware('auth')->group(function () {

    Route::get('/user/{id}', 'AjaxController@getUser')->name('user.get');

    Route::get('/role/{id}', 'AjaxController@getRole')->name('user.role.get')->middleware(PermissionMiddleware::class.':'.Permission::ROLE_VIEW_ROLES);
    Route::post('/role/update/{id}', 'AjaxController@roleUpdate')->name('user.role.update')->middleware(PermissionMiddleware::class.':'.Permission::ROLE_UPDATE_ROLES)->where('id', '([2-9]{1}|[0-9]{2,})');

    Route::post('/user/update/{id}', 'AjaxController@userUpdate')->name('user.update.profile')->middleware(PermissionMiddleware::class.':'.Permission::USER_UPDATE_PROFILE);

    Route::post('/user/update-user-role/{userId}', 'AjaxController@userUpdateRole')->name('user.update.user-role')->middleware(PermissionMiddleware::class.':'.Permission::ROLE_UPDATE_ROLES);

});