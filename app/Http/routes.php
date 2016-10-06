<?php

Route::get('/', function () {
    return view('masterpage');
});

//Patient
Route::get('/profile', 'ProfileController@index');
Route::get('/appointment/new', 'ProfileController@newAppointmentPage');
Route::get('/appointment/history', 'ProfileController@appointmentHistoryPage');

//Krit
Route::get('/doctor/schedule', 'ProfileController@test1');
Route::get('/patient/come', 'ProfileController@test2');
Route::get('/doctor/appointment', 'ProfileController@test3');

//Auth
Route::auth();
Route::get('/login/officer', 'Auth\AuthController@officerLoginPage');

Route::get('/home', 'ProfileController@index');
