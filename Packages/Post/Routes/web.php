<?php
use \Packages\Core\Middleware\PermissionMiddleware;
use \Packages\Post\Permissions\Permission;
/*
| Define your awesome routing
*/
Route::middleware('auth')->prefix(config('eden')['backend_prefix_route']. '/post')->group(function () {
    Route::get('/list', 'WebController@index')->name('post.index')->middleware(PermissionMiddleware::class. ':'. Permission::POST_ACCESS);
    Route::get('/new', 'WebController@newPost')->name('post.new')->middleware(PermissionMiddleware::class. ':'. Permission::POST_CREATE);
    Route::get('/edit/{id}', 'WebController@editPost')->name('post.edit')->middleware(PermissionMiddleware::class. ':'. Permission::POST_EDIT)->where('id', '[0-9]+');
    Route::get('/category/list', 'WebController@categoryIndex')->name('post.category.index')->middleware(PermissionMiddleware::class. ':'. Permission::POST_CATEGORY_ACCESS);
});