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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//API Admins
Route::post('login-verification', 'AdminsController@loginVerification');

//API Users
Route::post('get-all-users', 'UsersController@getAllUsers');
Route::post('delete-user/{id}', 'UsersController@delUser');
Route::post('save-user', 'UsersController@saveUser');