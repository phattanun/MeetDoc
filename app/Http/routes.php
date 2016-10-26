<?php


Route::get ('/login', 'PagesController@viewLogin');
Route::post('/login', 'PagesController@login');
Route::get('/logout', 'AccountController@logout');

Route::post('/register', 'PagesController@register');
Route::post('/password/forget', 'PagesController@forgetPassword'); // Forget Password in Login Page
Route::post('/password/reset', 'PagesController@resetPassword'); // Reset password from link

// Backend
Route::get('/backend', function() { return View::make('backend'); });

// รอย้าย Controller
Route::get('/register', 'ProfileController@registerPage');
Route::get('/register/confirmation', 'ProfileController@confirmRegisterPage');
Route::get('/password/reset', 'ProfileController@passwordResetPage');
Route::get('/password/forget', 'ProfileController@passwordForgetPage');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'PagesController@index');

    // SearchAPI
    Route::get('/officer/manage/list', 'PagesController@apiGetStaff');

    //Merged
    Route::get('/swapRole', 'AccountController@swapRole');
    Route::get('/password/change', 'PagesController@changePassword'); // Change password in Profile Page
    Route::get('/profile', 'PagesController@viewProfile');
    Route::post('/profile', 'PagesController@editProfile');
    Route::get('/doctor/schedule', 'PagesController@viewSchedule');
    Route::post('/doctor/weekly', 'PagesController@addWeeklySchedule');
    Route::post('/doctor/daily', 'PagesController@addDailySchedule');
    Route::get('/officer/manage', 'PagesController@viewOfficerManage');
    Route::post('/officer/getStaffList', 'PagesController@getStaffList');
    Route::post('/officer/manage/addStaff', 'PagesController@addStaff');
    Route::post('/officer/manage/removeStaff', 'PagesController@removeStaff');
    Route::post('/officer/manage/changePermission', 'PagesController@changePermission');
    Route::post('/officer/manage/changeDepartment', 'SystemController@changeDepartment');
    Route::get('/doctor/appointment', 'PagesController@viewRecentAppointment');

    // Appointment
    Route::get('/appointment/new', 'PagesController@newAppointmentPage');
    Route::post('/appointment/new', 'PagesController@createAppointmentPage');
    Route::get('/appointment/history', 'PagesController@appointmentHistoryPage');
    Route::get('/appointment/future', 'PagesController@appointmentFuturePage');
    Route::post('/schedule/search', 'ScheduleController@searchSchedule');
    Route::post('/appointment/cancel', 'AppointmentController@cancel');
    Route::post('/appointment/detail', 'AppointmentController@getAppointmentDetail');

    // Admin
    Route::post('/department/doctor/get', 'AccountController@getDoctorByDepartment');

    //Staff
    Route::get('/patient/come', 'PagesController@patientCome');

    //Pharmacist
    Route::get('/drug/manage', 'PagesController@drugPage');


    // Medicine
    Route::post('medicine/create', 'MedicineController@create_medicine');
    Route::post('medicine/delete', 'MedicineController@delete_medicine');
    Route::post('medicine/detail', 'MedicineController@get_medicine_detail');
    Route::post('medicine/edit', 'MedicineController@edit_medicine');
    Route::post('medicine/search', 'MedicineController@search_medicine');
    Route::get('medicine/getMedicineList', 'MedicineController@get_medicine_list');

    // Disease
    Route::post('/disease/create', 'DiseaseController@add_disease');
    Route::post('/disease/edit', 'DiseaseController@edit_disease');
    Route::post('/disease/delete', 'DiseaseController@delete_disease');
    Route::post('/disease/detail', 'DiseaseController@get_disease_detail');
    Route::post('/disease/search', 'DiseaseController@search_disease');
    Route::get('/disease/getDiseaseList', 'DiseaseController@get_disease_list');

    //everyone
    // Route::get('/profile', 'ProfileController@index');
    //Route::post('/profile', 'ProfileController@testprofile');
    Route::get('/queue', 'PagesController@viewQueue');


    //Admin
    Route::get('/account/manage', 'ProfileController@accountPage');
    // Route::get('/officer/manage', 'ProfileController@officerPage');
    Route::get('/disease/manage', 'PagesController@diseasePage');
    Route::get('/disease/temp', 'ProfileController@diseasePage');
    Route::get('/account/manage/{id}', 'ProfileController@editAccountPage');


    //Krit
    // Route::get('/doctor/appointment', 'ProfileController@test3');

    //Auth
    // Route::auth();
    Route::get('/home', 'ProfileController@index');
    Route::get('/login/officer', 'Auth\AuthController@officerLoginPage');

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
    Route::get('/backend/Appointment/search', 'AppointmentController@search');


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

    // Diagnosis
    Route::post('/backend/Diagnosis/checkin', 'DiagnosisController@patient_checkin_by_staff');
    Route::post('/backend/Diagnosis/add_physical_record', 'DiagnosisController@add_physical_record');
    Route::post('/backend/Diagnosis/get_patient_profile', 'DiagnosisController@get_patient_profile');
    Route::get('/backend/Diagnosis/queue', 'DiagnosisController@get_queue');
    Route::post('/backend/Diagnosis/appointment_list', 'DiagnosisController@get_appointment_list');
    Route::post('/backend/Diagnosis/add_allergic_medicine', 'DiagnosisController@add_allergic_medicine');
    Route::post('/backend/Diagnosis/delete_allergic_medicine', 'DiagnosisController@delete_allergic_medicine');
    Route::post('/backend/Diagnosis/view_diagnosis_record', 'DiagnosisController@diagnosis_record_and_receive_medicine');
    Route::post('/backend/Diagnosis/give_medicine', 'DiagnosisController@give_medicine');

    // System
    Route::post('/backend/Disease/add_disease', 'SystemController@add_disease');
    Route::post('/backend/Disease/edit_disease', 'SystemController@edit_disease');
    Route::post('/backend/Disease/delete_disease', 'SystemController@delete_disease');
    Route::get('/backend/Disease/disease_list', 'SystemController@disease_list');

    Route::get('/sendemailnaja', 'MessageController@testEmail');

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

});
