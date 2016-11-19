<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\AppointmentDisease;
use App\Department;
use App\Disease;
use App\Prescription;
use App\User;
use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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
                        $value = ($value == 'M') ? 'เช้า' : 'บ่าย';
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
        $apps = DB::table('appointment')
            ->join('user', 'user.id', '=', 'appointment.patient_id')
            ->join('dept', 'dept.id', '=', 'appointment.dept_id')
            ->select('appointment.date', 'appointment.time', 'dept.name as dept_name', 'user.name', 'user.surname', 'user.gender', 'user.birthday', 'appointment.symptom');
        if (isset($filter))
            $apps = $apps->where($filter);
        $apps = $apps->where('date', '>=', $now)->orderBy('date', 'ASC')->get();
        return self::recentAppointmentTable($apps);
    }

    public static function getFutureAppointments($patient_id)
    {
        date_default_timezone_set('Asia/Bangkok');
        $now = date('Y-m-d');
        $apps = DB::table('appointment')
            ->join('user', 'user.id', '=', 'appointment.doctor_id')
            ->join('dept', 'dept.id', '=', 'appointment.dept_id')
            ->select('appointment.id as app_id', 'appointment.patient_id', 'appointment.date', 'appointment.time', 'dept.name as dept_name', 'user.name', 'user.surname', 'appointment.symptom')->where('date', '>=', $now)->where('appointment.patient_id', $patient_id)->where('appointment.queue_status', "uncheckedin")->orderBy('date', 'ASC')->get();
        return $apps;
    }

    public static function getPastAppointments($patient_id)
    {
        date_default_timezone_set('Asia/Bangkok');
        $now = date('Y-m-d');
        $apps = DB::table('appointment')
            ->join('user', 'user.id', '=', 'appointment.doctor_id')
            ->join('dept', 'dept.id', '=', 'appointment.dept_id')
            ->select('appointment.id as app_id', 'appointment.date', 'appointment.time', 'dept.name as dept_name', 'user.name', 'user.surname', 'appointment.symptom')->where('date', '<', $now)->where('appointment.patient_id', $patient_id)->orderBy('date', 'ASC')->get();
        return $apps;
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
            "11" => "พฤษจิกายน",
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
                "date" => "วันที่ ".$day." เดือน ".$month[$im]." ปีค.ศ. ".$year,
                "time" => "ช่วงเวลา ".($ap->time == 'M' ? "เช้า (9.00 - 11.30)" : "บ่าย (13.00 - 15.30)"),
                "email" => $patient->email,
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

    public static function edit(Request $request)
    {
        try {
            $validate = Appointment::where('patient_id', $request->patient_id)->where('id', '!=', $request->old_app_id)
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
            $ap->save();
            Appointment::find($request->old_app_id)->delete();
        } catch (\Exception $e) {
            echo "<h2>Error: " . $e->getMessage() . "</h2>";
        }
        return 'success';
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
            "11" => "พฤษจิกายน",
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
                "date" => "วันที่ ".$day." เดือน ".$month[$im]." ปีค.ศ. ".$year,
                "time" => "ช่วงเวลา ".($ap->time == 'M' ? "เช้า (9.00 - 11.30)" : "บ่าย (13.00 - 15.30)"),
                "email" => $patient->email,
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
        if ($keyword != '') {
            $appointment_list = Appointment::where('id', 'like', ($keyword) . '%')->where('queue_status','uncheckedin')->get();
            foreach ($appointment_list as $appointment) {
                $patient = $appointment->patient()->first();
                $appointment['name'] = $patient['name'];
                $appointment['surname'] = $patient['surname'];
                $appointment['department'] = Department::where('id', $appointment['dept_id'])->first()['name'];
            }
        } else {
            $appointment_list = [];
        }
        return $appointment_list;
    }
}
