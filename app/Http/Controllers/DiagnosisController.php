<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Disease;
use App\Drug;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Mockery\CountValidator\Exception;

class DiagnosisController extends Controller
{
//    public function add_diagnosis_disease_drug(Request $request)
//    {
//        $appointment = Appointment::findOrFail($request->appointment_id);
//        $disease_list = $request->disease_list;
//
//        $disease_id_list = [];
//        foreach ($disease_list as $disease)
//        {
//            $disease_id = Disease::where('name', $disease)->first()['id'];
//            array_push($disease_id_list, $disease_id);
//        }
//        $appointment->disease()->attach($disease_id_list);
//
//        $drug_name_list = $request->drug_name_list;
//        $drug_amount_list = $request->drug_amount_list;
//        $drug_unit_list = $request->drug_unit_list;
//        $drug_note_list = $request->drug_note_list;
//
//        for ($i = 0; $i < count($drug_name_list); $i++)
//        {
//            $drug_id = Drug::where('name',$drug_name_list[$i])->first();
//            $appointment->drug()->attach($drug_id, ['amount'=>$drug_amount_list[$id], 'unit'=>$drug_unit_list[$id], 'note'=>$drug_note_list[$id]]);
//        }
//
//        $appointment->description = $request->diagnosis_description;
//        $appointment->save();
//
//    }

    public function add_physical_record(Request $request)
    {
        $appointment = Appointment::findOrFail($request->appointment_id);
        $appointment->weight = $request->weight;
        $appointment->height = $request->height;
        $appointment->systolic = $request->systolic;
        $appointment->diastolic = $request->diastolic;
        $appointment->temperature = $request->temperature;
        $appointment->heart_rate = $request->heart_rate;
        $appointment->queue_status = '';
        $appointment->save();
    }

    public function patient_checkin_by_staff(Request $request)
    {
        $appointment = Appointment::findOrFail($request->appointment_id);
        $start_time_morning = (new \DateTime())->setTime(9, 0);
        $end_time_morning = (new \DateTime())->setTime(11, 30);
        $start_time_afternoon = (new \DateTime())->setTime(13, 0);
        $end_time_afternoon = (new \DateTime())->setTime(15, 30);
        $now = new \DateTime('NOW');
        $intime = true;

        if ($appointment['time'] == 'M' && ($now < $start_time_morning || $now > $end_time_morning))
            $intime = false;
        if ($appointment['time'] == 'A' && ($now < $start_time_afternoon || $now > $end_time_afternoon))
            $intime = false;

        if ($intime) {
            try {
                $appointment->checkin_time = Carbon::now();
                $appointment->queue_status = 'checkedin';
                $appointment->save();
            } catch (Exception $e) {
                echo '<H2>Error</H2>';
            }
        }
    }

}
