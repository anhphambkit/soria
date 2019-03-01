<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/1/19
 * Time: 21:58
 */
/*********************************************************
 *
 *                  ROUTE FOR FRONTEND MODULE
 *
 *********************************************************/
Route::get('/login', 'Auth\LoginController@showLogin')->name('login');

Route::post('/login', 'Auth\LoginController@postLogin')->name('postLogin');

