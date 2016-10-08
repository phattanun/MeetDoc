<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Mockery\CountValidator\Exception;

class AppointmentController extends Controller
{
    public function create_appointment(Request $request) {

        try{
            $appointment = new Appointment();
            $appointment->date = $request->date;
            $appointment->time = $request->time;
            $appointment->symptom = $request->symptom;
            $appointment->patient_ssn = $request->patient_ssn;
            // How can I identify the doctor_ssn if patient select clinic instead of doctor.
            $appointment->save();
        }
        catch (Exception $e){
            echo "<h2>Error</h2>";
        }

    }

    public function edit_appointment(Request $request) {

        try{
            $appointment = Appointment::findOrFail($request->id);
            $editable_key = ['date','time','']
        }
    }
}
