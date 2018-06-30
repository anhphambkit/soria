<?php
use \Packages\Core\Middleware\PermissionMiddleware;
use \Packages\User\Permissions\Permission;
/*
| Define your awesome routing
*/
Route::middleware('auth')->prefix(config('eden')['backend_prefix_route']. '/user')->group(function () {
    Route::get('/profile', 'WebController@profile')->name('user.profile')->middleware(PermissionMiddleware::class. ':'. Permission::USER_VIEW_PROFILE);
    Route::get('/roles', 'WebController@roles')->name('user.role.index')->middleware(PermissionMiddleware::class. ':'. Permission::ROLE_VIEW_ROLES);

    // We prevent to update Root which always have id = 1
    Route::get('/role/{id}', 'WebController@editRole')->name('user.role.edit')->middleware(PermissionMiddleware::class. ':'. Permission::ROLE_UPDATE_ROLES)->where('id', '([2-9]{1}|[1-9]{1}[0-9]{1,})');
});

Route::get(config('eden')['backend_prefix_route']. '/login', 'WebController@login')->name('user.view.login')->middleware('guest');
Route::post(config('eden')['backend_prefix_route']. '/login', '\App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::get(config('eden')['backend_prefix_route']. '/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
