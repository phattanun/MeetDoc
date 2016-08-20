<?php

Route::get('/', function () {
    return view('masterpage');
});

//Profile
Route::get('/profile', 'ProfileController@index');
