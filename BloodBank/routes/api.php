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
    Route::post('/reset-password', 'AuthController@resetPassword');

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
        Route::post('/favorites', 'PostController@favorites');
    });

});
