<?php

Route::get('/', function () {
    return view('masterpage');
});

//Profile
Route::get('/profile', 'ProfileController@index');

//Auth
Route::auth();
Route::get('/login/officer', 'Auth\AuthController@officerLoginPage');

Route::get('/home', 'ProfileController@index');
