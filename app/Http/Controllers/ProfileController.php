<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','test1','test2','test3','newAppointmentPage']]);
//        $this->middleware('auth');
    }
    public function index()
    {
        return view('profile');
    }

//Temp
    public function newAppointmentPage()
    {
        return view('new-appointment');
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

}
