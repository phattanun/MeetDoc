<?php

namespace App\Http\Controllers;

use App\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Mockery\CountValidator\Exception;

class AppointmentController extends Controller
{
    public function create_reserve_appointment(Request $request)
    {

        try {
            $appointment = new Appointment();
            $appointment->date = $request->date;
            $appointment->time = $request->time;
            $appointment->symptom = $request->symptom;
            $appointment->queue_status = 'uncheckedin';
            $appointment->checkin_time = null;
            $appointment->type = 'R'; // R refers to reserve and W refers to walk-in.
            $appointment->patient_ssn = $request->patient_ssn;

            // How can I identify the doctor_ssn if patient select clinic instead of doctor.

            $appointment->save();
        } catch (Exception $e) {
            echo "<h2>Error</h2>";
        }

    }

    public function create_walkin_appointment(Request $request)
    {

    }

    public function edit_appointment(Request $request)
    {

        try {
            $appointment = Appointment::findOrFail($request->id);
            $editable = ['date', 'time', 'symptom', 'queue_status', 'checkin_time', 'doctor_ssn', 'type'];
            $edited = array_filter($request->all());
            $filtered = array_intersect_key($edited, array_flip($editable));

            foreach ($filtered as $key => $value)
                $appointment[$key] = $value;

            $appointment->save();
        }
    }
}
