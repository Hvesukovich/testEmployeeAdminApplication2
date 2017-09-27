<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'AdminsController@login');
