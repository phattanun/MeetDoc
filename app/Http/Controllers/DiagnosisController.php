<?php

namespace App\Http\Controllers;

use App\Allergic;
use App\Appointment;
use App\Disease;
use App\Drug;
use App\User;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Mockery\CountValidator\Exception;
use App\Http\Controllers\AccountController;

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

        try {
            $appointment->weight = $request->weight;
            $appointment->height = $request->height;
            $appointment->systolic = $request->systolic;
            $appointment->diastolic = $request->diastolic;
            $appointment->temperature = $request->temperature;
            $appointment->heart_rate = $request->heart_rate;
            $appointment->queue_status = 'waiting_doctor';
            $appointment->save();
        } catch (Exception $e) {
            echo '<H2>Error</H2>';
        }
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
        if (!is_null($appointment['checkin_time']))
            $intime = false;

        if ($intime) {
            try {
                $appointment->checkin_time = Carbon::now();
                $appointment->queue_status = 'waiting_staff';
                $appointment->save();
            } catch (Exception $e) {
                echo '<H2>Error</H2>';
            }
        }
    }

    public function get_queue()
    {
        $start_time_morning = (new \DateTime())->setTime(9, 0);
        $end_time_morning = (new \DateTime())->setTime(11, 30);
        $start_time_afternoon = (new \DateTime())->setTime(13, 0);
        $end_time_afternoon = (new \DateTime())->setTime(15, 30);
        $now = new \DateTime('NOW');

        $time = '';
        if ($start_time_morning <= $now && $now <= $end_time_morning)
            $time = 'M';
        else if ($start_time_afternoon <= $now && $now <= $end_time_afternoon)
            $time = 'A';

        $appointment_list = Appointment::where('date', $now->format('Y-m-d'))->where('time', $time)
            ->whereNotNull('checkin_time')->orderBy('checkin_time', 'asc')->get();

        $appointment['waiting_staff'] = [];
        $appointment['waiting_doctor'] = [];
        $appointment['waiting_pharmacist'] = [];

        foreach ($appointment_list as $app) {
            $array_app = json_decode($app);
            if ($app['queue_status'] == 'waiting_staff')
                array_push($appointment['waiting_staff'], $array_app);
            else if ($app['queue_status'] == 'waiting_doctor')
                array_push($appointment['waiting_doctor'], $array_app);
            else if ($app['queue_status'] == 'waiting_pharmacist')
                array_push($appointment['waiting_pharmacist'], $array_app);
        }
        dd($appointment);
    }

    public function get_patient_profile(Request $request)
    {
        $user = User::where('id', $request->patient_id)->select('id', 'ssn', 'name', 'surname', 'birthday', 'phone_no')->first();
        $allergic_medicine = Allerrgic::where('user_id', $request->patient_id)->get();

        $user_profile['info'] = $user->toArray();
        $user_profile['allergic_medicine'] = $allergic_medicine->toArray();
        dd($user_profile);
    }

    public function get_appointment_list(Request $request)
    {
        $now = new \DateTime('NOW');
        $appointment_list = Appointment::where('patient_id', $request->patient_id)->where('date', '<', $now->format('Y-m-d'))
            ->whereNotNull('checkin_time')->get();
        dd($appointment_list->toArray());
    }

    public function add_allergic_medicine(Request $request)
    {
//        dd($request);
        try {
            $allergic = new Allergic();
            $allergic->patient_id = $request->patient_id;
            $allergic->medicine_id = $request->medicine_id;
            $allergic->save();
        } catch (Exception $e) {
            echo '<H2>Error</H2>';
        }
    }

    public function delete_allergic_medicine(Request $request)
    {

    }
}
