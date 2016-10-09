<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;

class DiagnosisController extends Controller
{
    public function add_diagnosis_description(Request $request)
    {
        $appointment = Appointment::findOrFail($request->appointment_id);
        $appointment->description = $request->diagnosis_description;
        $appointment->save();
    }

    public function add_physical_record(Request $request)
    {
        $appointment = Appointment::findOrFail($request->appointment_id);
        $appointment->weight = $request->weight;
        $appointment->height = $request->height;
        $appointment->systolic = $request->systolic;
        $appointment->diastolic = $request->diastolic;
        $appointment->temperature = $request->temperature;
        $appointment->heart_rate = $request->heart_rate;
        $appointment->save();
    }

}
