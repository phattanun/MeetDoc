<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth', ['except' => ['index','test1','test2','test3','test4','newAppointmentPage','appointmentHistoryPage', 'appointmentFuturePage']]);

//        $this->middleware('auth');
    }
    public function index()
    {
        return view('profile');
    }
    public function testprofile()
    {
        return $_POST['drugAllergy'][0];
    }

//Temp
    public function accountPagePage()
    {
        return view('account');
    }
    public function officerPage()
    {
        return view('officer');
    }
    public function diseasePage()
    {
        return view('disease-temp');
    }
    public function drugPage()
    {
        return view('drug');
    }
    public function accountPage()
    {
        return view('account');
    }
    public function editAccountPage()
    {
        return view('profile-edit');
    }
    public function passwordResetPage()
    {
        return view('auth.passwords.reset');
    }
    public function confirmRegisterPage()
    {
        return view('auth.confirmregister');
    }
    public function registerPage()
    {
        return view('auth.register');
    }
    public function passwordForgetPage()
    {
        return view('auth.passwords.forget');
    }
    public function newAppointmentPage()
    {
        return view('appointment-new');
    }
    public function appointmentHistoryPage()
    {
        return view('appointment-history');
    }
    public function appointmentFuturePage()
    {
        return view('appointment-future');
    }
    public function test1()
    {
        return view('doctorSchedule');
    }
    public function test3()
    {
        return view('doctorNearAppointment');
    }
    public function test4()
    {
        return view('queue');
    }

}
