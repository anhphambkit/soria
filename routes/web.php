<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*********************************************************
 *
 *                  ROUTE FOR FRONTEND MODULE
 *
 *********************************************************/
Route::domain('{mainDomain}')->group(function () {
    Route::get('/', function () {
        return view(config('setting.theme.client') . '.pages.homepage');
    })->name('home');
});