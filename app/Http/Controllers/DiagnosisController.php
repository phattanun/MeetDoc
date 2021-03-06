<?php

namespace App\Http\Controllers;

use App\Allergic;
use App\Appointment;
use App\Department;
use App\Drug;
use App\GivenMedicine;
use App\Medicine;
use App\Prescription;
use App\Disease;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Mockery\CountValidator\Exception;

class DiagnosisController extends Controller
{
    public function add_diagnosis_record(Request $request)
    {
        $appointment = Appointment::findOrFail($request->appointment_id);
        $disease_list = $request->disease_select2;
        $medicine_list = $request->medicine;

        $appointment_disease_list = [];
        if(!is_null($disease_list)) {
            foreach ($disease_list as $disease) {
                array_push($appointment_disease_list, ['appointment_id' => $appointment['id'], 'disease_id' => $disease]);
            }
            DB::table('appointment_disease')->insert($appointment_disease_list);
        }

        $prescription_list = [];

        if(!is_null($medicine_list)) {
            foreach ($medicine_list as $medicine) {
                array_push($prescription_list, ['appointment_id' => $appointment['id'], 'medicine_id' => $medicine['id'], 'amount' => $medicine['amount'], 'unit' => $medicine['unit']]);
            }
            DB::table('prescription')->insert($prescription_list);
        }

        $appointment->diagnosis = $request->diagnosis_detail;
        $appointment->queue_status = 'waiting_pharmacist';
        $appointment->save();

    }

    public function diagnosis_record_and_receive_medicine(Request $request)
    {
        $appointment_list = Appointment::where('patient_id', $request->patient_id)->whereNotNull('checkin_time')->where('queue_status', 'complete')->orderBy('date', 'desc')->get();

        $diagnosis_info = [];
        $diagnosis_info['record'] = [];
        $diagnosis_info['queue'] = [];

        foreach ($appointment_list as $appointment) {

            $prescription = $appointment->prescription()->withPivot('amount', 'unit', 'note')->get();
            $appointment['prescription'] = json_decode($prescription, true);
            $appointment['disease'] = $appointment->disease()->get();
            foreach($appointment['disease'] as $disease){
                $disease['fullname'] = $disease['name']." (".$disease['icd10'].", ".$disease['snomed'].", ".$disease['drg'].")";
            }
            $appointment['doctor'] = $appointment->doctor()->first();
            $appointment['department'] = Department::where('id', $appointment['dept_id'])->first()['name'];

            $diagnosis_info['record'][$appointment['id']] = json_decode($appointment, true);
            array_push($diagnosis_info['queue'], $appointment['id']);
        }

//        dd($diagnosis_info);
        return $diagnosis_info;
    }

    public function give_medicine(Request $request)
    {
        $appointment = Appointment::where('id', $request->appointment_id)->first();
        $appointment->queue_status = 'complete';
        $appointment->save();
    }

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

//    public function add_diagnosis_record(Request $request)
//    {
//        //appointment_id  disease_select2  diagnosis_detail medicine[][id]  medicine[][amount]  medicine[][unit]
//        return $request->medicine;
//    }

    public function patient_checkin_by_staff(Request $request)
    {
        $appointment = Appointment::findOrFail($request->appointment_id);
        $start_time_morning = (new \DateTime())->setTime(\Config::get('app.open_hour_morning'), \Config::get('app.open_minute_morning'));
        $end_time_morning = (new \DateTime())->setTime(\Config::get('app.close_hour_morning'), \Config::get('app.close_minute_morning'));
        $start_time_afternoon = (new \DateTime())->setTime(\Config::get('app.open_hour_afternoon'), \Config::get('app.open_minute_afternoon'));
        $end_time_afternoon = (new \DateTime())->setTime(\Config::get('app.close_hour_afternoon'), \Config::get('app.close_minute_afternoon'));
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

    public static function get_queue()
    {
        $start_time_morning = (new \DateTime())->setTime(\Config::get('app.open_hour_morning'), \Config::get('app.open_minute_morning'));
        $end_time_morning = (new \DateTime())->setTime(\Config::get('app.close_hour_morning'), \Config::get('app.close_minute_morning'));
        $start_time_afternoon = (new \DateTime())->setTime(\Config::get('app.open_hour_afternoon'), \Config::get('app.open_minute_afternoon'));
        $end_time_afternoon = (new \DateTime())->setTime(\Config::get('app.close_hour_afternoon'), \Config::get('app.close_minute_afternoon'));
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

        $appointment['staff_queue'] = [];
        $appointment['doctor_queue'] = [];
        $appointment['pharmacist_queue'] = [];

        foreach ($appointment_list as $app) {
            $array_app = json_decode($app, true);
            $patient_info = $app->patient()->first();
            $birthday = date_create_from_format('Y-m-d', $patient_info['birthday']);
            $age = $now->diff($birthday);
            $patient_info['age'] = $age->y;
            $array_app['patient_info'] = json_decode($patient_info, true);
            $array_app['department'] = Department::find($app['dept_id'])['name'];
            if ($app['queue_status'] == 'waiting_staff') {
                //array_push($appointment['waiting_staff'], $array_app);
                $appointment['waiting_staff'][$array_app['id']] = $array_app;
                array_push($appointment['staff_queue'], $array_app['id']);
            }
            else if ($app['queue_status'] == 'waiting_doctor') {
                //array_push($appointment['waiting_doctor'], $array_app);
                if ($app['doctor_id'] == Auth::user()->id) {
                    $appointment['waiting_doctor'][$array_app['id']] = $array_app;
                    array_push($appointment['doctor_queue'], $array_app['id']);
                }
            }
            else if ($app['queue_status'] == 'waiting_pharmacist') {
                //array_push($appointment['waiting_pharmacist'], $array_app);
                $array_app['medicine'] = $app->prescription()->get();
                $array_app['disease'] = $app->disease()->get();
                foreach($array_app['disease'] as $disease){
                    $disease['fullname'] = $disease['name']." (".$disease['icd10'].", ".$disease['snomed'].", ".$disease['drg'].")";
                }
                $appointment['waiting_pharmacist'][$array_app['id']] = $array_app;
                array_push($appointment['pharmacist_queue'], $array_app['id']);

            }
        }
//        dd($appointment);
        return $appointment;
    }

    public function get_patient_profile(Request $request)
    {
        $user = User::where('id', $request->patient_id)->select('id', 'ssn', 'name', 'surname', 'birthday', 'phone_no')->first();
        $allergic_medicine = $user->allergic_medicine()->get();

        $user_profile['info'] = $user->toArray();
        $user_profile['allergic_medicine'] = $allergic_medicine->toArray();

//        dd($user_profile);
        return $user_profile;
    }

    public function get_appointment_list(Request $request)
    {
        $now = new \DateTime('NOW');
        $appointment_list = Appointment::where('patient_id', $request->patient_id)->where('date', '<', $now->format('Y-m-d'))
            ->whereNotNull('checkin_time')->get();

//        dd($appointment_list);
        return $appointment_list;
    }

    public static function get_allergic_medicine($user)
    {
        $allergic_medicine_list = $user->allergic_medicine()->get();
        $allergic_medicine_name_list = [];
        foreach ($allergic_medicine_list as $allergic_medicine) {
            array_push($allergic_medicine_name_list, $allergic_medicine['medicine_name']);
        }
        return $allergic_medicine_name_list;
    }

    public static function edit_allergic_medicine(Request $request)
    {
        $allergic_medicine = [];
        if(Allergic::where('patient_id', $request->id)->exists()){
            try {
                Allergic::where('patient_id', $request->id)->delete();
            } catch (\Exception $e) {
                return "fail";
            }
        }
        if (!is_null($request->drugAllergy)) {
            foreach ($request->drugAllergy as $drug) {
                array_push($allergic_medicine, ['patient_id' => $request->id, 'medicine_id' => $drug]);
            }
            try {
                DB::table('allergic')->insert($allergic_medicine);
            } catch (\Exception $e) {
                return "fail";
            }
        }
        return "success";
    }

}
