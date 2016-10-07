<?php

Route::get('/', function () {
    return view('masterpage');
});

//Patient
Route::get('/profile', 'ProfileController@index');
Route::get('/appointment/new', 'ProfileController@newAppointmentPage');
Route::get('/appointment/history', 'ProfileController@appointmentHistoryPage');
Route::get('/appointment/future', 'ProfileController@appointmentFuturePage');

//Admin
Route::get('/account/manage', 'ProfileController@accountPage');
Route::get('/officer/manage', 'ProfileController@officerPage');
Route::get('/disease/manage', 'ProfileController@diseasePage');

//Pharmacist
Route::get('/drug/manage', 'ProfileController@drugPage');

//Krit
Route::get('/doctor/schedule', 'ProfileController@test1');
Route::get('/patient/come', 'ProfileController@test2');
Route::get('/doctor/appointment', 'ProfileController@test3');
Route::get('/queue', 'ProfileController@test4');

//Auth
Route::auth();
Route::get('/login/officer', 'Auth\AuthController@officerLoginPage');

Route::get('/home', 'ProfileController@index');


// Backend
Route::get('/backend', function() {
    return View::make('backend');
});
Route::get('/backend/Account/getUserList', 'AccountController@getUserList');
Route::post('/backend/Account/register', 'AccountController@register');
Route::post('/backend/Account/getProfile', 'AccountController@getProfile');
Route::post('/backend/Account/edit', 'AccountController@edit');

Route::post('/backend/Appointment/create', 'AppointmentController@create');

Route::get('/backend/WorkingTime/getNormalWorkingTime', 'WorkingTimeController@getNormalWorkingTime');
Route::post('/backend/WorkingTime/addNormalWorkingTime', 'WorkingTimeController@addNormalWorkingTime');
Route::post('/backend/WorkingTime/deleteNormalWorkingTime', 'WorkingTimeController@deleteNormalWorkingTime');


Route::post('/backend/{controller}/post',
    function($controller) {
        return View::make('backend', ['controller' => $controller, 'page' => 'post']);
    }
);
Route::get('/backend/{controller}/{page?}',
    function($controller, $page = null){
        return View::make('backend', ['controller' => $controller, 'page' => $page ]);
    }
);
