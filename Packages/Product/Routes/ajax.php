<?php

/*
| Define your awesome routing
*/
Route::middleware('auth')->prefix('product')->group(function () {
    // Category
    Route::post('/category/create', 'AjaxController@createCategory')->name('product.category.create')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Product\Permissions\Permission::PRODUCT_CATEGORY_CREATE);

    Route::post('/category/update/{id}', 'AjaxController@updateCategory')->name('product.category.update')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Product\Permissions\Permission::PRODUCT_CATEGORY_EDIT)->where('id', '[0-9]+');

    Route::delete('/category/delete', 'AjaxController@deleteCategory')->name('product.category.delete')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Product\Permissions\Permission::PRODUCT_CATEGORY_DELETE)->where('id', '[0-9]+');

    Route::get('/category/{id}', 'AjaxController@getCategory')->name('product.category.get')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Product\Permissions\Permission::PRODUCT_CATEGORY_ACCESS)->where('id', '[0-9]+');

    // Manufacturer
    Route::post('/manufacturer/create', 'ManufacturerController@createManufacturer')->name('product.manufacturer.create')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Product\Permissions\Permission::PRODUCT_MANUFACTURER_CREATE);

    Route::post('/manufacturer/update/{id}', 'ManufacturerController@updateManufacturer')->name('product.manufacturer.update')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Product\Permissions\Permission::PRODUCT_MANUFACTURER_EDIT)->where('id', '[0-9]+');

    Route::delete('/manufacturer/delete', 'ManufacturerController@deleteManufacturer')->name('product.manufacturer.delete')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Product\Permissions\Permission::PRODUCT_MANUFACTURER_DELETE)->where('id', '[0-9]+');

    Route::get('/manufacturer/{id}', 'ManufacturerController@getManufacturer')->name('product.manufacturer.get')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Product\Permissions\Permission::PRODUCT_MANUFACTURER_ACCESS)->where('id', '[0-9]+');

    // Product
    Route::post('create', 'AjaxController@createProduct')->name('product.create')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Product\Permissions\Permission::PRODUCT_CREATE);

    Route::post('update/{id}', 'AjaxController@updateProduct')->name('product.update')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Product\Permissions\Permission::PRODUCT_EDIT)->where('id', '[0-9]+');

    Route::delete('delete', 'AjaxController@deleteProduct')->name('product.delete')->middleware(\Packages\Core\Middleware\PermissionMiddleware::class.':'.\Packages\Product\Permissions\Permission::PRODUCT_DELETE);
});