<?php

Route::get('/', 'PagesController@index');

//Merged
Route::get ('/login', 'PagesController@viewLogin');
Route::post('/login', 'PagesController@login');
Route::get('/logout', 'AccountController@logout');
Route::post('/password/forget', 'PagesController@forgetPassword'); // Forget Password in Login Page
Route::get('/password/change', 'PagesController@changePassword'); // Change password in Profile Page
Route::post('/password/reset', 'PagesController@resetPassword'); // Reset password from link
Route::get('/profile', 'PagesController@viewProfile');
Route::post('/profile', 'PagesController@editProfile');
Route::get('/doctor/schedule', 'PagesController@viewSchedule');
Route::post('/doctor/weekly', 'PagesController@addWeeklySchedule');
Route::post('/doctor/daily', 'PagesController@addDailySchedule');

//Pharmacist
Route::get('/drug/manage', 'PagesController@drugPage');


//everyone
Route::get('/password/reset', 'ProfileController@passwordResetPage');
Route::get('/password/forget', 'ProfileController@passwordForgetPage');
Route::get('/register/confirmation', 'ProfileController@confirmRegisterPage');
Route::get('/register', 'ProfileController@registerPage');
// Route::get('/profile', 'ProfileController@index');
//Route::post('/profile', 'ProfileController@testprofile');

//Patient
Route::get('/appointment/new', 'ProfileController@newAppointmentPage');
Route::get('/appointment/history', 'ProfileController@appointmentHistoryPage');
Route::get('/appointment/future', 'ProfileController@appointmentFuturePage');

//Admin
Route::get('/account/manage', 'ProfileController@accountPage');
Route::get('/officer/manage', 'ProfileController@officerPage');
Route::get('/disease/manage', 'ProfileController@diseasePage');
Route::get('/account/manage/{id}', 'ProfileController@editAccountPage');


//Krit
// Route::get('/doctor/schedule', 'ProfileController@test1');
Route::get('/patient/come', 'ProfileController@test2');
Route::get('/doctor/appointment', 'ProfileController@test3');
Route::get('/queue', 'ProfileController@test4');

//Auth
// Route::auth();
Route::get('/home', 'ProfileController@index');
Route::get('/login/officer', 'Auth\AuthController@officerLoginPage');

Route::post('/register', 'PagesController@register');

// Backend
Route::get('/backend', function() {
    return View::make('backend');
});

// Account
// Route::post('/backend/Account/login', 'AccountController@login');
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


// Weekly Schedule
Route::get('/backend/Schedule/getScheduleWeekly', 'ScheduleController@getScheduleWeekly');
Route::post('/backend/Schedule/addScheduleWeekly', 'ScheduleController@addScheduleWeekly');
Route::post('/backend/Schedule/deleteScheduleWeekly', 'ScheduleController@deleteScheduleWeekly');

// Daily Schedule
Route::get('/backend/Schedule/getScheduleDaily', 'ScheduleController@getScheduleDaily');
Route::post('/backend/Schedule/addScheduleDaily', 'ScheduleController@addScheduleDaily');
Route::post('/backend/Schedule/deleteScheduleDaily', 'ScheduleController@deleteScheduleDaily');

Route::post('/backend/Schedule/getSchedule', 'ScheduleController@getSchedule');

// Medicine
Route::post('/backend/Medicine/create', 'MedicineController@create_medicine');
Route::post('/backend/Medicine/delete', 'MedicineController@delete_medicine');
Route::post('/backend/Medicine/detail', 'MedicineController@get_medicine_detail');
Route::post('/backend/Medicine/update', 'MedicineController@edit_medicine');
Route::get('/backend/Medicine/getMedicineList', 'MedicineController@get_medicine_list');

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
