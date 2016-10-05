<?php

Route::get('/', function () {
    return view('masterpage');
});

//Profile
Route::get('/profile', 'ProfileController@index');

//Doctor
Route::get('/doctor/schedule', 'ProfileController@test1');
Route::get('/patient/come', 'ProfileController@test2');

//Auth
Route::auth();
Route::get('/login/officer', 'Auth\AuthController@officerLoginPage');

Route::get('/home', 'ProfileController@index');
