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
Route::group(['middleware' => 'auth'], function (){
    // dashboard page
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    // Profile page
    Route::get('/profile', function () {
        return view('admin.admins.profile');
    });
    Route::get('/home', 'HomeController@index');
    // pages
    Route::post('/changepass', 'ChangePasswordController@changepass');
    Route::post('/edit-profile', 'HomeController@edit_profile');
    Route::resource('admin', 'AdminController');
    Route::resource('bloodtype', 'BloodTypeController');
    Route::resource('governorate', 'GovernorateController');
    Route::resource('city', 'CityController');
    Route::resource('post', 'PostController');
    Route::resource('category', 'CategoryController');
    Route::resource('donation', 'DonationRequestController');
    Route::resource('notification', 'NotificationController');
    Route::resource('setting', 'SettingController');
    Route::resource('contact', 'ContactController');


    Route::resource('role', 'Role\RoleController');
    Route::resource('permission', 'Role\PermissionController');

});
