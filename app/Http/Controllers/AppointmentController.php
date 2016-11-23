<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\AppointmentDisease;
use App\Department;
use App\DailySchedule;
use App\Prescription;
use App\Schedule;
use App\User;
use App\Invalid_Appointment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    private static function printTable($array)
    {
        if (sizeof($array) == 0) {
            echo "<h4>Empty Table</h4>";
            return;
        }
        echo "<table border='1'>";
        echo "<tr>";
        foreach ($array[0] as $key => $value)
            echo "<th>" . $key . "</th>";
        echo "</tr>";
        foreach ($array as $instance) {
            echo "<tr>";
            foreach ($instance as $key => $value)
                echo "<td>" . $value . "</td>";
            echo "</tr>";
        }
        echo "</table><br>";
    }


    public static function recentAppointmentTable($array)
    {
        $template = '<tr class="odd gradeX">
            <td> ?0 </td>
            <td> ?1 </td>
            <td> ?2 </td>
            <td> ?3 </td>
            <td> ?4 </td>
            <td><i class="fa fa-?5" aria-hidden="true"></i> ?6 </td>
            <td> ?7 </td>
            <td> ?8 </td>
        </tr>';

        $re = "";
        $search = array();
        for ($i = 0; $i < 9; $i++)
            array_push($search, "?" . $i);
        foreach ($array as $record) {
            $replace = array();
            foreach ($record as $key => $value) {
                switch ($key) {
                    case 'time':
                        $value = ($value == 'M') ? 'เช้า (9.00 - 11.30 น.)' : 'บ่าย (13.00 - 15.30 น.)';
                        break;
                    case 'gender':
                        array_push($replace, ($value == 'm') ? 'male' : 'female');
                        $value = ($value == 'm') ? 'ชาย' : 'หญิง';
                        break;
                    case 'birthday':
                        $value = (new \DateTime('NOW'))->diff(new \DateTime($value))->format('%Y');
                        break;
                }
                array_push($replace, $value);
            }
            $re .= strtr($template, array_combine($search, $replace));
        }
        return $re;
    }

    public static function getRecentAppointments($filter = null)
    {
        date_default_timezone_set('Asia/Bangkok');
        $now = date('Y-m-d');
        $time = date('Hi');
        $apps = DB::table('appointment')
            ->join('user', 'user.id', '=', 'appointment.patient_id')
            ->join('dept', 'dept.id', '=', 'appointment.dept_id')
            ->select('appointment.date', 'appointment.time', 'dept.name as dept_name', 'user.name', 'user.surname', 'user.gender', 'user.birthday', 'appointment.symptom');
        if (isset($filter))
            $apps = $apps->where($filter);
        if ($time <= '1130') {
            $apps = DB::table('appointment')
                ->join('user', 'user.id', '=', 'appointment.patient_id')
                ->join('dept', 'dept.id', '=', 'appointment.dept_id')
                ->select('appointment.date', 'appointment.time', 'dept.name as dept_name', 'user.name', 'user.surname', 'user.gender', 'user.birthday', 'appointment.symptom')
                ->where('date', '>=', $now)
                ->where('approve','1')
                ->where('queue_status', '<>', 'waiting_pharmacist')
                ->where('queue_status', '<>', 'complete')
                ->orderBy('date', 'ASC');
            if (isset($filter))
                $apps = $apps->where($filter);
            $apps = $apps->get();
        }
        else if ($time > '1530') {
            $apps = DB::table('appointment')
                ->join('user', 'user.id', '=', 'appointment.patient_id')
                ->join('dept', 'dept.id', '=', 'appointment.dept_id')
                ->select('appointment.date', 'appointment.time', 'dept.name as dept_name', 'user.name', 'user.surname', 'user.gender', 'user.birthday', 'appointment.symptom')
                ->where('date', '>', $now)
                ->where('approve','1')
                ->orderBy('date', 'ASC')
                ->get();
            if (isset($filter))
                $apps = $apps->where($filter);
            $apps = $apps->get();
        }
        else {
            $apps1 = DB::table('appointment')
                ->join('user', 'user.id', '=', 'appointment.patient_id')
                ->join('dept', 'dept.id', '=', 'appointment.dept_id')
                ->select('appointment.date', 'appointment.time', 'dept.name as dept_name', 'user.name', 'user.surname', 'user.gender', 'user.birthday', 'appointment.symptom')
                ->where('date', '>', $now)
                ->where('approve', '1')
                ->orderBy('date', 'ASC')
                ->get();
            if (isset($filter))
                $apps1 = $apps1->where($filter);
            $apps1 = $apps1->get();
            $apps2 = DB::table('appointment')
                ->join('user', 'user.id', '=', 'appointment.patient_id')
                ->join('dept', 'dept.id', '=', 'appointment.dept_id')
                ->select('appointment.date', 'appointment.time', 'dept.name as dept_name', 'user.name', 'user.surname', 'user.gender', 'user.birthday', 'appointment.symptom')
                ->where('date', $now)
                ->where('approve', '1')
                ->where('time', 'A')
                ->where('queue_status', '<>', 'waiting_pharmacist')
                ->where('queue_status', '<>', 'complete')
                ->orderBy('date', 'ASC')
                ->get();
            if (isset($filter))
                $apps2 = $apps2->where($filter);
            $apps2 = $apps2->get();
            $apps = array_merge($apps1,$apps2);
        }
        return self::recentAppointmentTable($apps);
    }

    public static function getFutureAppointments($patient_id)
    {
        date_default_timezone_set('Asia/Bangkok');
        $today = date('Y-m-d');
        $time = date('Hi');
        $apps = [];
        if($time <= '1130') {
            $apps = DB::table('appointment')
                ->join('user', 'user.id', '=', 'appointment.doctor_id')
                ->join('dept', 'dept.id', '=', 'appointment.dept_id')
                ->select('appointment.id as app_id', 'appointment.patient_id', 'appointment.date', 'appointment.time', 'dept.name as dept_name', 'user.name', 'user.surname', 'appointment.symptom')
                ->where('appointment.approve', 1)
                ->where('appointment.patient_id', $patient_id)
                ->where('appointment.queue_status', "uncheckedin")
                ->where('date', $today)
                ->orderBy('date', 'ASC')
                ->get();
        }
        elseif('1130' < $time && $time <= '1530') {
            $apps = DB::table('appointment')
                ->join('user', 'user.id', '=', 'appointment.doctor_id')
                ->join('dept', 'dept.id', '=', 'appointment.dept_id')
                ->select('appointment.id as app_id', 'appointment.patient_id', 'appointment.date', 'appointment.time', 'dept.name as dept_name', 'user.name', 'user.surname', 'appointment.symptom')
                ->where('appointment.approve', 1)
                ->where('appointment.patient_id', $patient_id)
                ->where('appointment.queue_status', "uncheckedin")
                ->where('date', $today)
                ->where('time', 'A')
                ->orderBy('date', 'ASC')
                ->get();
        }
        $tomorrow = DB::table('appointment')
            ->join('user', 'user.id', '=', 'appointment.doctor_id')
            ->join('dept', 'dept.id', '=', 'appointment.dept_id')
            ->select('appointment.id as app_id', 'appointment.patient_id', 'appointment.date', 'appointment.time', 'dept.name as dept_name', 'user.name', 'user.surname', 'appointment.symptom')
            ->where('appointment.approve', 1)
            ->where('appointment.patient_id', $patient_id)
            ->where('date', '>' ,$today)
            ->orderBy('date', 'ASC')
            ->get();
        return array_merge($apps,$tomorrow);
    }

    public static function getPastAppointments($patient_id)
    {
        date_default_timezone_set('Asia/Bangkok');
        $today = date('Y-m-d');
        $now = date('Y-m-d');
        $time = date('Hi');
        $apps = [];
        if('0900' <= $time && $time <= '1130') {
            $apps = DB::table('appointment')
                ->join('user', 'user.id', '=', 'appointment.doctor_id')
                ->join('dept', 'dept.id', '=', 'appointment.dept_id')
                ->select('appointment.id as app_id', 'appointment.patient_id', 'appointment.date', 'appointment.time', 'dept.name as dept_name', 'user.name', 'user.surname', 'appointment.symptom')
                ->where('appointment.approve', 1)
                ->where('appointment.patient_id', $patient_id)
                ->where('appointment.queue_status', '!=' ,"uncheckedin")
                ->where('date', $today)
                ->where('time', 'M')
                ->orderBy('time', 'ASC')
                ->get();
        }
        elseif('1130' < $time && $time < '1300') {
            $apps = DB::table('appointment')
                ->join('user', 'user.id', '=', 'appointment.doctor_id')
                ->join('dept', 'dept.id', '=', 'appointment.dept_id')
                ->select('appointment.id as app_id', 'appointment.patient_id', 'appointment.date', 'appointment.time', 'dept.name as dept_name', 'user.name', 'user.surname', 'appointment.symptom')
                ->where('appointment.approve', 1)
                ->where('appointment.patient_id', $patient_id)
                ->where('date', $today)
                ->where('time', 'M')
                ->orderBy('time', 'ASC')
                ->get();
        }
        elseif('1300' <= $time && $time <= '1530') {
            $apps = DB::table('appointment')
                ->join('user', 'user.id', '=', 'appointment.doctor_id')
                ->join('dept', 'dept.id', '=', 'appointment.dept_id')
                ->select('appointment.id as app_id', 'appointment.patient_id', 'appointment.date', 'appointment.time', 'dept.name as dept_name', 'user.name', 'user.surname', 'appointment.symptom')
                ->where('appointment.approve', 1)
                ->where('appointment.patient_id', $patient_id)
                ->where(function ($query) {
                    $query->where('appointment.time','M')
                        ->orWhere(function ($query) {
                            $query->where('appointment.time','A')
                                ->where('appointment.queue_status', '!=' ,"uncheckedin");
                        });
                })
                ->where('date', $today)
                ->orderBy('time', 'ASC')
                ->get();
        }
        elseif($time > '1530') {
            $apps = DB::table('appointment')
                ->join('user', 'user.id', '=', 'appointment.doctor_id')
                ->join('dept', 'dept.id', '=', 'appointment.dept_id')
                ->select('appointment.id as app_id', 'appointment.patient_id', 'appointment.date', 'appointment.time', 'dept.name as dept_name', 'user.name', 'user.surname', 'appointment.symptom')
                ->where('appointment.approve', 1)
                ->where('appointment.patient_id', $patient_id)
                ->where('date', $today)
                ->orderBy('time', 'ASC')
                ->get();
        }
        $yesterday = DB::table('appointment')
            ->join('user', 'user.id', '=', 'appointment.doctor_id')
            ->join('dept', 'dept.id', '=', 'appointment.dept_id')
            ->select('appointment.id as app_id', 'appointment.patient_id', 'appointment.date', 'appointment.time', 'dept.name as dept_name', 'user.name', 'user.surname', 'appointment.symptom')
            ->where('appointment.approve', 1)
            ->where('appointment.patient_id', $patient_id)
            ->where('date', '<' ,$today)
            ->orderBy('date', 'DESC')
            ->orderBy('time', 'ASC')
            ->get();
        return array_merge($apps,$yesterday);
    }

    public static function getAppointmentDetail(Request $request)
    {
        $user_id = Auth::user()['id'];
        $apps = DB::table('appointment')
            ->join('user', 'user.id', '=', 'appointment.doctor_id')
            ->join('dept', 'dept.id', '=', 'appointment.dept_id')
            ->select('appointment.id as app_id', 'appointment.patient_id', 'appointment.date', 'appointment.time', 'dept.name as dept_name', 'user.name', 'user.surname', 'appointment.symptom', 'weight', 'height', 'systolic', 'diastolic', 'temperature', 'heart_rate', 'diagnosis')->where('appointment.id', $request->id)->orderBy('date', 'ASC')->get();
        $prescription = Prescription::where('appointment_id', $request->id)->with("medicine")->get();
        $disease = AppointmentDisease::where('appointment_id', $request->id)->with('disease')->get();
        if ($apps[0]->patient_id == $user_id)
            return compact('apps', 'disease', 'prescription');
        else
            return "fail";
    }

    public static function getBriefAppointmentDetail($id)
    {
        $user = Auth::user();
        $user_id = $user['id'];
        $apps = DB::table('appointment')
            ->join('user', 'user.id', '=', 'appointment.doctor_id')
            ->join('dept', 'dept.id', '=', 'appointment.dept_id')
            ->select('appointment.id as app_id', 'appointment.patient_id', 'appointment.date', 'appointment.symptom', 'appointment.time', 'dept.name as dept_name', 'dept.id as dept_id', 'user.id as doctor_id', 'user.name', 'user.surname')->where('appointment.id', $id)->orderBy('date', 'ASC')->get();
        if ($apps[0]->patient_id == $user_id || $user['p_officer'])
            return $apps[0];
        else
            return "fail";
    }

    public static function getAppointmentList()
    {
        $apps = Appointment::all()->toArray();
        self::printTable($apps);
    }

    private static function generateApproveCreateLink($date, $time, $symptom, $created_at, $approve) {
        return hash('ripemd256', 'APpROveAppoINTmeNt'.$date.'WhEn'.$time.'why'.$symptom.'CrEATeAT'.$created_at.'AppWITHnot'.$approve.'isCoNFiRmed');
    }

    public static function create(Request $request)
    {
        date_default_timezone_set('Asia/Bangkok');
        $now = date('Y-m-d H:i:s');
        try {
            $validate = Appointment::where('patient_id', $request->patient_id)
                ->where('date', $request->date)
                ->where('time', $request->time)
                ->get()->toArray();
            if (sizeof($validate) > 0)
                return 'duplicate';

            $ap = new Appointment();
            $ap->date = $request->date;
            $ap->time = $request->time;
            $ap->symptom = $request->symptom;
            $ap->queue_status = 'uncheckedin';
            $ap->checkin_time = null;
            $ap->type = (strtotime($request->date) == strtotime('today') ? 'W' : 'R'); // R refers to reserve and W refers to walk-in.
            $ap->patient_id = $request->patient_id;
            $ap->doctor_id = $request->doctor_id;
            $ap->dept_id = $request->dept_id;
            $ap->created_at = $now;
            $ap->save();

        } catch (\Exception $e) {
            echo "<h2>Error: " . $e->getMessage() . "</h2>";
        }
        $patient = User::findOrFail($ap->patient_id);
        $doctor = User::findOrFail($ap->doctor_id);
        $day = explode('-', $ap->date)[2];
        $im = explode('-', $ap->date)[1];
        $year = explode('-', $ap->date)[0];
        $month = [
            "1" => "มกราคม",
            "2" => "กุมภาพันธ์",
            "3" => "มีนาคม",
            "4" => "เมษายน",
            "5" => "พฤษภาคม",
            "6" => "มิถุนายน",
            "7" => "กรกฎาคม",
            "8" => "สิงหาคม",
            "9" => "กันยายน",
            "10" => "ตุลาคม",
            "11" => "พฤศจิกายน",
            "12" => "ธันวาคม",
        ];
        $dept = Department::findOrFail($ap->dept_id)->name;
        MessageController::sendCreateAppoinment([
                "app_id" => $ap->id,
                "p_name" => $patient->name,
                "p_surname" => $patient->surname,
                "d_name" => $doctor->name,
                "d_surname" => $doctor->surname,
                "symptom" => $ap->symptom,
                "dept" => $dept,
                "date" => "วันที่ ".$day." ".$month[$im]." ค.ศ.".$year,
                "time" => "ช่วงเวลา".($ap->time == 'M' ? "เช้า (9.00 - 11.30)" : "บ่าย (13.00 - 15.30)"),
                "email" => $patient->email,
                "phone_number" => $patient->phone_no,
                "link" => "./appointment/approve/create?id=".$ap->id."&cca=".self::generateApproveCreateLink($ap->date, $ap->time, $ap->symptom, $ap->created_at,0)
        ]);
        return 'success';
    }

    public static function confirmCreateAppointment(Request $request) {
        date_default_timezone_set('Asia/Bangkok');
        $now = new \DateTime('NOW');
        try {
            $ap = Appointment::findOrFail($request->id);
            if($request->cca == self::generateApproveCreateLink($ap->date, $ap->time, $ap->symptom, $ap->created_at, $ap->approve)) {
                $confirm_time = new \DateTime($ap->created_at);
                if(($now->getTimeStamp() - $confirm_time->getTimeStamp())/3600 < 24) {
                    $ap->approve = true;
                    $ap->save();
                }
                else throw new \Exception("Too late", 1);
            }
            else throw new \Exception("Wrong key", 1);
        }
        catch (\Exception $e) {
            // echo "<h2>Error: ".$e->getMessage()."</h2>";
            return ["status" => false, "msg" => $e->getMessage()];
        }
        return ["status" => true];
    }

    private static function generateEditAppointmentHash($patient_id, $app_id, $time) {
        return hash('ripemd256', "UsER".$patient_id."WaNttoeDITappoiNtMeNTIn".$app_id."At".$time."ANajA");
    }

    public static function createEditAppointmentLink(Request $request) {
        date_default_timezone_set('Asia/Bangkok');
        $now = date('Y-m-d H:i:s');

        $ap = Appointment::findOrfail($request->old_app_id);
        $patient = User::findOrfail($ap->patient_id);
        $doctor = User::findOrfail($request->doctor_id);

        $edited = array_filter($request->all());
        $edited['patient_id'] =  $patient->id;
        $editable_field = ['date','time', 'symptom', 'doctor_id', 'patient_id', 'dept_id'];
        $filtered = array_intersect_key($edited, array_flip($editable_field));
        $filtered['_id'] = $ap->id;
        $filtered['_now'] = $now;

        $validate = Appointment::where('patient_id', $patient->id)->where('id', '!=', $ap->id)
            ->where('date', $request->date)
            ->where('time', $request->time)
            ->get()->toArray();
        if (sizeof($validate) > 0)
            return "duplicate";

        $encoded = base64_encode(json_encode($filtered));

        $day = explode('-', $request->date)[2];
        $im = explode('-', $request->date)[1];
        $year = explode('-', $request->date)[0];
        $month = [
            "1" => "มกราคม",
            "2" => "กุมภาพันธ์",
            "3" => "มีนาคม",
            "4" => "เมษายน",
            "5" => "พฤษภาคม",
            "6" => "มิถุนายน",
            "7" => "กรกฎาคม",
            "8" => "สิงหาคม",
            "9" => "กันยายน",
            "10" => "ตุลาคม",
            "11" => "พฤศจิกายน",
            "12" => "ธันวาคม",
        ];
        $dept = Department::findOrFail($request->dept_id)->name;
        $res = [
            "status" => true,

            "app_id" => $ap->id,
            "p_name" => $patient->name,
            "p_surname" => $patient->surname,
            "d_name" => $doctor->name,
            "d_surname" => $doctor->surname,
            "symptom" => $request->symptom,
            "dept" => $dept,
            "date" => "วันที่ ".$day." เดือน".$month[$im]." ค.ศ.".$year,
            "time" => "ช่วงเวลา".($request->time == 'M' ? "เช้า (9.00 - 11.30)" : "บ่าย (13.00 - 15.30)"),
            "email" => $patient->email,
            "phone_number" => $patient->phone_no,
            "link" => "./appointment/approve/edit?id=".$ap->id."&cep=".self::generateEditAppointmentHash($patient->id, $ap->id, $now)."&edt=".$encoded
        ];
        MessageController::sendEditAppointment($res);
        return "success";
    }

    public static function confirmEditAppointment(Request $request)
    {
        date_default_timezone_set('Asia/Bangkok');
        $now = new \DateTime('NOW');
        try {
            $ap = Appointment::findOrFail($request->id);
            $patient = User::findOrfail($ap->patient_id);
            $data = json_decode(base64_decode($request->edt));


            if(!is_null($data) && isset($data->_id) && isset($data->_now) && $data->_id == $request->id && $data->patient_id == $patient->id && $request->cep == self::generateEditAppointmentHash($patient->id, $ap->id, $data->_now)) {
                $edit_time = new \DateTime($data->_now);
                if(($now->getTimeStamp() - $edit_time->getTimeStamp())/3600 < 24) {
                    $ap->date = $data->date;
                    $ap->time = $data->time;
                    $ap->symptom = $data->symptom;
                    $ap->queue_status = 'uncheckedin';
                    $ap->checkin_time = null;
                    $ap->type = (strtotime($data->date) == strtotime('today') ? 'W' : 'R'); // R refers to reserve and W refers to walk-in.
                    $ap->patient_id = $data->patient_id;
                    $ap->doctor_id = $data->doctor_id;
                    $ap->dept_id = $data->dept_id;
                    $ap->save();
                }
                else throw new \Exception("Too late", 1);
            }
            else throw new \Exception("Wrong key", 1);
        }
        catch (\Exception $e) {
            return ["status" => false, "msg" => $e->getMessage()];
        }
        return ["status" => true];
    }

    private static function generateCancelLink($doctor_id, $patient_id, $time)
    {
        return hash('ripemd256', "CanCel" . $doctor_id . $time . $patient_id . "aPProVed");
    }

    public static function cancel(Request $request)
    {
        date_default_timezone_set('Asia/Bangkok');
        $now = date('Y-m-d H:i:s');
        try {
            $ap = Appointment::findOrFail($request->id);
            $ap->cancel_time = $now;
            $ap->save();

        } catch (\Exception $e) {
            return 'fail';
        }
        $patient = User::findOrFail($ap->patient_id);
        $doctor = User::findOrFail($ap->doctor_id);
        $day = explode('-', $ap->date)[2];
        $im = explode('-', $ap->date)[1];
        $year = explode('-', $ap->date)[0];
        $month = [
            "1" => "มกราคม",
            "2" => "กุมภาพันธ์",
            "3" => "มีนาคม",
            "4" => "เมษายน",
            "5" => "พฤษภาคม",
            "6" => "มิถุนายน",
            "7" => "กรกฎาคม",
            "8" => "สิงหาคม",
            "9" => "กันยายน",
            "10" => "ตุลาคม",
            "11" => "พฤศจิกายน",
            "12" => "ธันวาคม",
        ];
        $dept = Department::findOrFail($ap->dept_id)->name;
        MessageController::sendCancelAppoinment([
                "app_id" => $ap->id,
                "p_name" => $patient->name,
                "p_surname" => $patient->surname,
                "d_name" => $doctor->name,
                "d_surname" => $doctor->surname,
                "symptom" => $ap->symptom,
                "dept" => $dept,
                "date" => "วันที่ ".$day." เดือน".$month[$im]." ค.ศ.".$year,
                "time" => "ช่วงเวลา".($ap->time == 'M' ? "เช้า (9.00 - 11.30)" : "บ่าย (13.00 - 15.30)"),
                "email" => $patient->email,
                "phone_number" => $patient->phone_no,
                "link" => "./appointment/approve/cancel?id=".$ap->id."&cac=".self::generateCancelLink($ap->doctor_id, $ap->patient_id, $now)
        ]);
        return 'success';
    }

    public static function confirmCancelAppointment(Request $request)
    {
        date_default_timezone_set('Asia/Bangkok');
        $now = new \DateTime('NOW');
        try {
            $ap = Appointment::findOrFail($request->id);
            if ($request->cac == self::generateCancelLink($ap->doctor_id, $ap->patient_id, $ap->cancel_time)) {
                $cancel_time = new \DateTime($ap->cancel_time);
                if (($now->getTimeStamp() - $cancel_time->getTimeStamp()) / 3600 < 24) {
                    $ap->delete();
                }
                else throw new \Exception("Too late", 1);
            }
            else throw new \Exception("Wrong key", 1);
        } catch (\Exception $e) {
            return ["status" => false, "msg" => $e->getMessage()];
        }
        return ["status" => true];
    }

    public static function search($keyword = null)
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

        if ($keyword != '') {
            $appointment_list = Appointment::where('id', 'like', ($keyword) . '%')->where('date', date("Y-m-d"))->where('queue_status','uncheckedin')->where('time', $time)->where('approve',1)->get();
            foreach ($appointment_list as $appointment) {
                $patient = $appointment->patient()->first();
                $appointment['image'] = $patient['image'];
                $appointment['name'] = $patient['name'];
                $appointment['surname'] = $patient['surname'];
                $appointment['fullname'] = $patient['name'] . " " . $patient['surname'];
                $appointment['department'] = Department::where('id', $appointment['dept_id'])->first()['name'];
            }
        } else {
            $appointment_list = [];
        }

        return $appointment_list;

    }

    public static function shiftDateAppointment()
    {
        $invalid_appointments = Invalid_Appointment::where('approve',0)->get();

        foreach($invalid_appointments as $invalid_appointment) {
            Appointment::where('id',$invalid_appointment->id)->delete();
        }

        $invalid_appointments = Invalid_Appointment::get();

        foreach($invalid_appointments as $invalid_appointment)
        {
            $new_date = self::availableDate($invalid_appointment);
            $shift_appointment = Appointment::findOrfail($invalid_appointment->id);
            if(count($new_date) > 0) {
                $shift_appointment['type'] = 'R';
                $shift_appointment['date'] = $new_date[0]['date'];
                $shift_appointment['time'] = $new_date[0]['time'];
                $shift_appointment->save();

                $patient = User::findOrfail($shift_appointment->patient_id);
                $doctor = User::findOrfail($shift_appointment->doctor_id);
                $dept = Department::findOrfail($shift_appointment->dept_id)->name;
                $day = explode('-', $shift_appointment->date)[2];
                $im = explode('-', $shift_appointment->date)[1];
                $year = explode('-', $shift_appointment->date)[0];
                $month = [
                    "1" => "มกราคม",
                    "2" => "กุมภาพันธ์",
                    "3" => "มีนาคม",
                    "4" => "เมษายน",
                    "5" => "พฤษภาคม",
                    "6" => "มิถุนายน",
                    "7" => "กรกฎาคม",
                    "8" => "สิงหาคม",
                    "9" => "กันยายน",
                    "10" => "ตุลาคม",
                    "11" => "พฤศจิกายน",
                    "12" => "ธันวาคม",
                ];

                MessageController::sendShiftAppointment([
                    "app_id" => $shift_appointment->id,
                    "p_name" => $patient->name,
                    "p_surname" => $patient->surname,
                    "d_name" => $doctor->name,
                    "d_surname" => $doctor->surname,
                    "symptom" => $shift_appointment->symptom,
                    "dept" => $dept,
                    "date" => "วันที่ ".$day." เดือน".$month[$im]." ค.ศ.".$year,
                    "time" => "ช่วงเวลา".($shift_appointment->time == 'M' ? "เช้า (9.00 - 11.30)" : "บ่าย (13.00 - 15.30)"),
                    "email" => $patient->email,
                    "phone_number" => $patient->phone_no,
                    "link" => "./appointment/future"
                ]);
            }
            else $shift_appointment->delete();
        }
    }

    public static function availableDate($old_ap)
    {
        $busy_dates = Appointment::where('date', '>=', $old_ap->date)->where('patient_id', $old_ap->patient_id)->get();
        $busy_times = [];
        foreach($busy_dates as $busy_date) {
            array_push($busy_times, [$busy_date['date'], $busy_date['time']]);
        }

        // echo "Busy Times<br>";
        // var_dump($busy_times);

        if($old_ap->time == 'M')
            $available_times = Schedule::where('date', '>=', $old_ap->date)->where('doctor_id', $old_ap->doctor_id);
        else if($old_ap->time == 'A')
            $available_times = Schedule::where('date', '>', $old_ap->date)->where('doctor_id', $old_ap->doctor_id);

        foreach($busy_times as $busy_time) {
            $available_times = $available_times->where(function ($query)  use ($busy_time) {
                $query->where('date', '<>', $busy_time[0])->orWhere('time', '<>', $busy_time[1]);
            });
        }

        $available_times = $available_times->orderBy('date', 'asc')->get()->toArray();
        // echo "Availiable Times<br>";
        // var_dump($available_times);
        return $available_times;
    }

    public function manualNotify(){
        // Delete daily schedule in the past.
        $today = date("Y-m-d");
        $tomorrow = date("Y-m-d", time()+86400);
        DailySchedule::where('date', '<', $today)->delete();

        $notify_appointments = Appointment::where('date', $tomorrow)->get();

        $month = [
            "1" => "มกราคม",
            "2" => "กุมภาพันธ์",
            "3" => "มีนาคม",
            "4" => "เมษายน",
            "5" => "พฤษภาคม",
            "6" => "มิถุนายน",
            "7" => "กรกฎาคม",
            "8" => "สิงหาคม",
            "9" => "กันยายน",
            "10" => "ตุลาคม",
            "11" => "พฤศจิกายน",
            "12" => "ธันวาคม",
        ];

        $tomorrow_datetime = \DateTime::createFromFormat('Y-m-d', $tomorrow);
        $day = $tomorrow_datetime->format("j");
        $im = (int)$tomorrow_datetime->format("n");
        $year = $tomorrow_datetime->format("Y");

        foreach ($notify_appointments as $notify_appointment)
        {
            $patient = User::where('id', $notify_appointment['patient_id'])->first();
            $doctor = User::where('id', $notify_appointment['doctor_id'])->first();
            $dept = Department::where('id', $notify_appointment['dept_id'])->first()['name'];


            MessageController::sendNotificationAppointment([
                "app_id" => $notify_appointment->id,
                "p_name" => $patient->name,
                "p_surname" => $patient->surname,
                "d_name" => $doctor->name,
                "d_surname" => $doctor->surname,
                "symptom" => $notify_appointment->symptom,
                "dept" => $dept,
                "date" => "วันที่ ".$day." ".$month[$im]." ค.ศ.".$year,
                "time" => "ช่วงเวลา".($notify_appointment->time == 'M' ? "เช้า (9.00 - 11.30)" : "บ่าย (13.00 - 15.30)"),
                "email" => $patient->email,
                "phone_number" => $patient->phone_no,
                "link" => "./"
            ]);
        }
    }
}
