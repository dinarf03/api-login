<?php

use Illuminate\Http\Request;
Route::post('login', 'LoginController@login');
Route::post('register', 'LoginController@store');

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

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('login/check', "LoginController@LoginCheck");
    Route::post('logout', "LoginController@logout");
    
    Route::get('user', "LoginController@index");
    Route::get('user/{limit}/{offset}', "LoginController@getAll");
    Route::put('user/{id}', "LoginController@update");
    Route::delete('user/{id}', "LoginController@delete");
});
