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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function () {
    Route::namespace('Admin')->group(function () {
        Route::resource('users', 'UserController');
        Route::resource('categories', 'CategoryController');
        Route::resource('promotions', 'PromotionController');
    });
});
Route::get('index', 'UserController@index');
Route::get('category', 'CategoryController@index')->name('category');
Route::get('show-promotion/{promotion}', 'CategoryController@show')->name('promotion.show');
Route::get('option-register', 'UserController@optionRegister')->name('optionRegister');
Route::post('register_portal', 'UserController@registerPortal')->name('register_portal');
Route::post('login_portal', 'UserController@loginPortal')->name('login_portal');
