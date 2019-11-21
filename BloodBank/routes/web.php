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
Auth::routes();
Route::get('/', function () {
    return view('layouts.app');
});
Route::group(['middleware' => 'auth'], function (){

Route::resource('clients', 'ClientsController');
Route::resource('bloodtype', 'BloodTypeController');
Route::resource('governrate', 'GovernorateController');
Route::resource('city', 'CityController');
Route::resource('post', 'PostController');
Route::resource('category', 'CategoryController');
Route::resource('donationrequest', 'DonationRequestController');
Route::resource('notification', 'NotificationController');
Route::resource('setting', 'SettingController');
Route::resource('contact', 'ContactController');
Route::resource('clientable', 'ClientableController');

Route::get('/home', 'HomeController@index')->name('home');
});
