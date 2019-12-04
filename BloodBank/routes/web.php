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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Front'], function () {
    Route::get('/home', 'Maincontroller@home');
    Route::any('/client-signup', 'Maincontroller@client_signup');
    Route::any('/forgetPassword', 'Maincontroller@forgetPassword');
    Route::any('/client-login', 'Maincontroller@client_login');
    Route::any('/client-logout', 'Maincontroller@client_logout');

    Route::get('/about_us', 'Maincontroller@about_us');
    Route::get('/article/{id}', 'Maincontroller@article');
    Route::any('/contact_us', 'Maincontroller@contact_us');
    Route::get('/donator/{id}', 'Maincontroller@donator');
    Route::get('/donation_requests', 'Maincontroller@donation_requests');

    Route::group(['middleware' => 'auth:client-web'], function () {
        Route::get('/profile', 'Maincontroller@profile');
        Route::any('/new_request', 'Maincontroller@new_request');
        Route::any('/notification_setting', 'Maincontroller@notification_setting');
    });
});


Auth::routes();
Route::group(['middleware' => ['auth:web', 'autoCheckPermission'], 'prefix' => 'admin'], function () {
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
    Route::resource('client', 'ClientController');
    Route::resource('bloodtype', 'BloodTypeController');
    Route::resource('governorate', 'GovernorateController');
    Route::resource('city', 'CityController');
    Route::resource('post', 'PostController');
    Route::resource('category', 'CategoryController');
    Route::resource('donation', 'DonationRequestController');
    Route::resource('notification', 'NotificationController');
    Route::resource('setting', 'SettingController');
    Route::resource('contact', 'ContactController');

    Route::resource('admin', 'AdminController');
    Route::resource('role', 'Role\RoleController');
    Route::resource('permission', 'Role\PermissionController');


    Route::get('/search', 'PostController@index');

});
