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
        Route::post('logout', 'UserController@logout')->name('logout');
        Route::get('user-vendor','UserController@userVendor')->name('user_vendor');
    });
});
Route::get('index', 'UserController@index')->name('index');
Route::get('category', 'CategoryController@index')->name('category');
Route::get('show-category/{id}', 'CategoryController@showCategory')->name('category.show');
Route::get('show-promotion/{promotion}', 'CategoryController@show')->name('promotion.show');
Route::get('option-register', 'UserController@optionRegister')->name('optionRegister');
Route::get('option-login', 'UserController@optionLogin')->name('optionLogin');
Route::post('register_portal', 'UserController@registerPortal')->name('register_portal');
Route::post('vendor_register_portal', 'UserController@vendorRegisterPortal')->name('vendor_register_portal');
Route::post('login_portal', 'UserController@loginPortal')->name('login_portal');
Route::post('vendor_login_portal', 'UserController@vendorLoginPortal')->name('vendor_login_portal');
Route::post('logout_portal', 'UserController@logout')->name('logout_portal');
Route::post('store_calendar', 'googleCalendarController@store')->name('store_calendar');
Route::get('avatar_profile/{vendor}', 'UserController@avatarProfile')->name('avatar_profile');
Route::patch('update_avatar_profile/{vendor}', 'UserController@updateAvatarProfile')->name('update_avatar_profile');

Route::resource('gcalendar', 'gCalendarController');
Route::post('gcalendar', 'gCalendarController@store')->name('cla_store');
Route::get('oauth', ['as' => 'oauthCallback', 'uses' => 'gCalendarController@oauth']);
