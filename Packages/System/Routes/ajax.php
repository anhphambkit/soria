<?php

/*
| Define your awesome routing
*/
Route::middleware('auth')->group(function () {
    Route::post('/system/cache/clear', 'AjaxController@clearCache')->name('system.cache.clear');
});