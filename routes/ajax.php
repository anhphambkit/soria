<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/1/18
 * Time: 21:45
 */

Route::get('/testAjax', 'Admin\Ajax\TestController@test')->name('test_ajax');