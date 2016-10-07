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
        return view('disease');
    }
    public function drugPage()
    {
        return view('drug');
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
    public function test2()
    {
        return view('patientCome');
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
