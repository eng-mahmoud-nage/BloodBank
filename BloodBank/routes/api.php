<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api', 'prefix' => 'v1'], function (){

    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
    Route::post('/reset-password', 'AuthController@reset_password');
    Route::post('/new-password', 'AuthController@new_password');

    Route::get('/cities', 'MainController@cities');
    Route::get('/governorates', 'MainController@governorates');

    Route::get('/blood-types', 'MainController@blood_types');

    Route::get('/setting', 'MainController@setting');
    Route::post('/contacts', 'MainController@contacts');

    Route::get('/categories', 'PostController@categories');
    Route::get('/posts', 'PostController@posts');
    Route::get('/post', 'PostController@post');

    Route::group(['middleware' => 'auth:api'], function (){
        Route::any('/profile', 'AuthController@profile');
        Route::post('/change-password', 'AuthController@changePassword');
        Route::post('/toggle', 'PostController@favoriteToggle');
        Route::get('/favorites', 'PostController@favorites');
        Route::post('/donation-request', 'DonationController@new_request');
        Route::post('/set_token', 'DonationController@set_token');
        Route::get('/notify', 'NotificationController@notification');
        Route::get('/notification-list', 'NotificationController@notifications');
        Route::get('/unread-notification', 'NotificationController@unread_notification');
        Route::post('/set-read', 'NotificationController@set_read');
        Route::get('/donation', 'DonationController@donation');
        Route::get('/donations', 'DonationController@donations');

        Route::post('/change-password', 'AuthController@change_password');

    });

});
