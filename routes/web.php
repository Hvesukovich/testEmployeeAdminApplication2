<?php


//Route::get('/', function () {
//    return view('welcome');
//});



Route::get('/', 'AdminsController@login')->middleware('login');
Route::get('/login', 'AdminsController@login');
Route::get('/users', 'UsersController@users')->middleware('login');
Route::get('/user-details/{id}', 'UsersController@userDetails')->middleware('login');


