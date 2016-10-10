<?php

Route::get('/', function () {
    return view('masterpage');
});
//everyone
Route::get('/password/reset', 'ProfileController@passwordResetPage');
Route::get('/password/forget', 'ProfileController@passwordForgetPage');
Route::get('/register/confirmation', 'ProfileController@confirmRegisterPage');
Route::get('/register', 'ProfileController@registerPage');

//Patient
Route::get('/profile', 'ProfileController@index');
Route::get('/appointment/new', 'ProfileController@newAppointmentPage');
Route::get('/appointment/history', 'ProfileController@appointmentHistoryPage');
Route::get('/appointment/future', 'ProfileController@appointmentFuturePage');

//Admin
Route::get('/account/manage', 'ProfileController@accountPage');
Route::get('/officer/manage', 'ProfileController@officerPage');
Route::get('/disease/manage', 'ProfileController@diseasePage');
Route::get('/account/manage/{id}', 'ProfileController@editAccountPage');

//Pharmacist
Route::get('/drug/manage', 'ProfileController@drugPage');

//Krit
Route::get('/doctor/schedule', 'ProfileController@test1');
Route::get('/patient/come', 'ProfileController@test2');
Route::get('/doctor/appointment', 'ProfileController@test3');
Route::get('/queue', 'ProfileController@test4');

//Auth
// Route::auth();
Route::get('/home', 'ProfileController@index');
Route::get('/login', function() { return View::make('auth/login'); });
Route::post('/login', 'AccountController@login');
Route::get('/login/officer', 'Auth\AuthController@officerLoginPage');

Route::post('/register', 'PagesController@register');

// Backend
Route::get('/backend', function() {
    return View::make('backend');
});

// Account
Route::post('/backend/Account/login', 'AccountController@login');
Route::get('/backend/Account/loginStatus', 'AccountController@loginStatus');
Route::get('/backend/Account/getUserList', 'AccountController@getUserList');
Route::post('/backend/Account/register', 'AccountController@register');
Route::post('/backend/Account/getProfile', 'AccountController@getProfile');
Route::post('/backend/Account/edit', 'AccountController@edit');
Route::post('/backend/Account/forgetPassword', 'AccountController@forgetPassword');
Route::post('/backend/Account/resetPassword', 'AccountController@resetPassword');
Route::get('/backend/Account/logout', 'AccountController@logout');

// Appointment
Route::get('/backend/Appointment/getAppointmentList', 'AppointmentController@getAppointmentList');
Route::post('/backend/Appointment/create', 'AppointmentController@create');
Route::post('/backend/Appointment/cancel', 'AppointmentController@cancel');
Route::get('/backend/Appointment/cancelApprove', 'AppointmentController@cancelApprove');


// Normal WorkingTime
Route::get('/backend/WorkingTime/getNormalWorkingTime', 'WorkingTimeController@getNormalWorkingTime');
Route::post('/backend/WorkingTime/addNormalWorkingTime', 'WorkingTimeController@addNormalWorkingTime');
Route::post('/backend/WorkingTime/deleteNormalWorkingTime', 'WorkingTimeController@deleteNormalWorkingTime');

// Special WorkingTime
Route::get('/backend/WorkingTime/getSpecialWorkingTime', 'WorkingTimeController@getSpecialWorkingTime');
Route::post('/backend/WorkingTime/addSpecialWorkingTime', 'WorkingTimeController@addSpecialWorkingTime');
Route::post('/backend/WorkingTime/deleteSpecialWorkingTime', 'WorkingTimeController@deleteSpecialWorkingTime');

Route::post('/backend/WorkingTime/getWorkingTime', 'WorkingTimeController@getWorkingTime');


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
