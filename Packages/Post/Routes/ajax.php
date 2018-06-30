<?php

/*
| Define your awesome routing
*/
Route::middleware('auth')->prefix('post')->group(function () {

    // Category
    Route::post('/category/create', 'AjaxController@createCategory')->name('post.category.create')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Post\Permissions\Permission::POST_CATEGORY_CREATE);

    Route::post('/category/update/{id}', 'AjaxController@updateCategory')->name('post.category.update')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Post\Permissions\Permission::POST_CATEGORY_EDIT)->where('id', '[0-9]+');

    Route::delete('/category/delete', 'AjaxController@deleteCategory')->name('post.category.delete')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Post\Permissions\Permission::POST_CATEGORY_DELETE)->where('id', '[0-9]+');

    Route::get('/category/{id}', 'AjaxController@getCategory')->name('post.category.get')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Post\Permissions\Permission::POST_CATEGORY_ACCESS)->where('id', '[0-9]+');

    // Post
    Route::post('/post/create', 'AjaxController@createPost')->name('post.create')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Post\Permissions\Permission::POST_CREATE);

    Route::post('/post/update/{id}', 'AjaxController@updatePost')->name('post.update')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Post\Permissions\Permission::POST_EDIT)->where('id', '[0-9]+');

    Route::delete('/post/delete', 'AjaxController@deletePost')->name('post.delete')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Post\Permissions\Permission::POST_DELETE);
});