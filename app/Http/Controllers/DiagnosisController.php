<?php

namespace App\Http\Controllers;

use App\Allergic;
use App\Appointment;
use App\Department;
use App\Drug;
use App\GivenMedicine;
use App\Medicine;
use App\Prescription;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Mockery\CountValidator\Exception;

class DiagnosisController extends Controller
{
    public function add_diagnosis_disease_drug(Request $request)
    {
        $appointment = Appointment::findOrFail($request->appointment_id);
        $disease_list = $request->disease_list;
        $medicine_list = $request->medicine_list;

        $appointment_disease_list = [];
        foreach ($disease_list as $disease) {
            $disease_id = Disease::where('name', $disease)->first()['id'];
            array_push($appointment_disease_list, ['appointment_id' => $appointment['id'], 'disease_id' => $disease_id]);
        }
        DB::table('appointment_disease')->insert($appointment_disease_list);

        $prescription_list = [];
        foreach ($medicine_list as $medicine) {
            array_push($prescription_list, ['appointment_id' => $appointment['id'], 'medicine_id' => $medicine['id'], 'amount' => $medicine['amount'], 'unit'=>$medicine['unit'],'note'=>$medicine['note']]);
        }
        DB::table('prescription')->insert($prescription_list);

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

        $appointment->description = $request->diagnosis_description;
        $appointment->save();

    }

    public function diagnosis_record_and_receive_medicine(Request $request)
    {
        $appointment_list = Appointment::where('patient_id', $request->patient_id)->whereNotNull('checkin_time')->get();

        $diagnosis_info = [];

        foreach ($appointment_list as $appointment) {
            $prescription = Prescription::where('appointment_id', $appointment['id'])->get();
            $given_medicine = GivenMedicine::where('appointment_id', $appointment['id'])->get();
            $appointment['prescription'] = json_decode($prescription, true);
            $appointment['given_medicine'] = json_decode($given_medicine, true);
            array_push($diagnosis_info, json_decode($appointment, true));
        }

        return json_encode($diagnosis_info);
    }

    public function add_given_medicine(Request $request)
    {
        try {
            $given_medicine = new GivenMedicine();
            $given_medicine->appointment_id = $request->appointment_id;
            $given_medicine->medicine_id = $request->medicine_id;
            $given_medicine->amount = $request->amount;
            $given_medicine->unit = $request->unit;
            $given_medicine->note = $request->note;
            $given_medicine->save();
        } catch (Exception $e) {
            echo '<H2>Error</H2>';
        }
    }

    public function edit_given_medicine(Request $request)
    {
        DB::table('given_medicine')->where('appointment_id', $request->appointment_id)->where('medicine_id', $request->medicine_id)
            ->update(['amount' => $request->amount, 'unit' => $request->unit, 'note' => $request->note]);
    }

    public function delete_given_medicine(Request $request)
    {
        GivenMedicine::where('appointment_id', $request->appointment_id)->where('medicine_id', $request->medicine_id)->delete();
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

    public static function get_queue()
    {
        $start_time_morning = (new \DateTime())->setTime(9, 0);
        $end_time_morning = (new \DateTime())->setTime(11, 30);
        $start_time_afternoon = (new \DateTime())->setTime(13, 0);
        $end_time_afternoon = (new \DateTime())->setTime(15, 30);
        $now = new \DateTime('NOW');

        $time = 'A';
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
            $array_app = json_decode($app, true);
            $patient_info = User::where('id', $app['patient_id'])->first();
            $birthday = date_create_from_format('d/m/Y', $patient_info['birthday']);
            $age = $now->diff($birthday);
            $patient_info['age'] = $age->y;
            $array_app['patient_info'] = json_decode($patient_info, true);
            $dept_id = User::where('id', $app['doctor_id'])->first()['dept_id'];
            $array_app['department'] = Department::find($dept_id)['name'];
            if ($app['queue_status'] == 'waiting_staff')
                array_push($appointment['waiting_staff'], $array_app);
            else if ($app['queue_status'] == 'waiting_doctor')
                array_push($appointment['waiting_doctor'], $array_app);
            else if ($app['queue_status'] == 'waiting_pharmacist')
                array_push($appointment['waiting_pharmacist'], $array_app);
        }
        return $appointment;
//        dd($appointment);
    }

    public function get_patient_profile(Request $request)
    {
        $user = User::where('id', $request->patient_id)->select('id', 'ssn', 'name', 'surname', 'birthday', 'phone_no')->first();
        $allergic_medicine = Allergic::where('patient_id', $request->patient_id)->get();

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
        $allergic = Allergic::where('patient_id', $request->patient_id)->where('medicine_id', $request->medicine_id);
        if ($allergic->exists())
            $allergic->delete();
    }
}
