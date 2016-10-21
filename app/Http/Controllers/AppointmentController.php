<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\App;

class AppointmentController extends Controller
{
    private static function printTable($array) {
        if(sizeof($array) == 0) {
            echo "<h4>Empty Table</h4>";
            return;
        }
        echo "<table border='1'>";
        echo "<tr>";
        foreach ($array[0] as $key => $value)
            echo "<th>".$key."</th>";
        echo "</tr>";
        foreach ($array as $instance) {
            echo "<tr>";
            foreach($instance as $key => $value)
                echo "<td>".$value."</td>";
            echo "</tr>";
        }
        echo "</table><br>";
    }


    public static function recentAppointmentTable($array) {
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
        for ($i=0; $i < 9; $i++)
            array_push($search, "?".$i);
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
            $re .= strtr($template,array_combine($search,$replace));
        }
        return $re;
    }

    public static function getRecentAppointments($filter=null) {
        date_default_timezone_set('Asia/Bangkok');
        $now = date('Y-m-d');
        $apps = DB::table('appointment')
                    ->join('user','user.id','=','appointment.patient_id')
                    ->join('dept','dept.id','=','appointment.dept_id')
                    ->select('appointment.date', 'appointment.time', 'dept.name as dept_name', 'user.name', 'user.surname', 'user.gender', 'user.birthday', 'appointment.symptom');
        if(isset($filter))
            $apps = $apps->where($filter);
        $apps = $apps->where('date','>=',$now)->orderBy('date','ASC')->get();
        return self::recentAppointmentTable($apps);
    }

    public static function getAppointmentList() {
        $apps = Appointment::all()->toArray();
        self::printTable($apps);
    }


    public static function create(Request $request)
    {
//        var_dump($request->all());
        try {
            $validate = Appointment::where('patient_id', $request->patient_id)
                                    ->where('date', $request->date)
                                    ->where('time', $request->time)
                                    ->get()->toArray();
            if(sizeof($validate) > 0)
                return 'duplicate';

            $ap = new Appointment();
            $ap->date = $request->date;
            $ap->time = $request->time;
            $ap->symptom = $request->symptom;
            $ap->queue_status = 'uncheckedin';
            $ap->checkin_time = null;
            $ap->type = (strtotime($request->date) == strtotime('today') ? 'W' :'R'); // R refers to reserve and W refers to walk-in.
            $ap->patient_id = $request->patient_id;
            $ap->doctor_id = $request->doctor_id;
            $ap->save();

        } catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
        return 'success';
//        self::getAppointmentList();
    }

    private static function generateCancelLink($doctor_id, $patient_id, $time) {
        return hash('ripemd256', "CanCel".$doctor_id.$time.$patient_id."aPProVed");
    }

    public static function cancel(Request $request) {
        date_default_timezone_set('Asia/Bangkok');
        $now = date('Y-m-d H:i:s');
        try {
            $ap = Appointment::findOrFail($request->id);
            $ap->cancel_time = $now;
            $ap->save();
            echo "Approve Link: <a href='./cancelApprove?aid=".$ap->id."&apv=".self::generateCancelLink($ap->doctor_id, $ap->patient_id, $now)."'>here</a>";
        }
        catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
        self::getAppointmentList();
    }

    public static function cancelApprove(Request $request) {
        date_default_timezone_set('Asia/Bangkok');
        $now = new \DateTime('NOW');
        var_dump($request->all());
        try {
            $ap = Appointment::findOrFail($request->aid);
            if($request->apv == self::generateCancelLink($ap->doctor_id, $ap->patient_id, $ap->cancel_time)) {
                $cancel_time = new \DateTime($ap->cancel_time);
                if(($now->getTimeStamp() - $cancel_time->getTimeStamp())/3600 < 24)
                    $ap->delete();
                else throw new \Exception("Too late for cancelling", 1);
                echo "<h2>Canceling Approved</h2>";
            }
        }
        catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
        self::getAppointmentList();
    }

    public static function edit(Request $request) {
        try {
            // Debug
            echo "Editing request.";
            var_dump($request->all());

            $ap = Appointment::findOrFail($request->id);
            $edited = array_filter($request->all());
            $editable_field = ['name', 'surname', 'gender', 'email', 'address', 'phone_no', 'password'];
            $filtered = array_intersect_key($edited, array_flip($editable_field));

            // Debug
            echo "Editing...";
            var_dump($filtered);

            foreach ($filtered as $key => $value)
                $ap[$key] = $value;
            $ap->save();

            // Debug
            echo "Edited Profile.";
            var_dump($ap['attributes']);
        }
        catch (\Exception $e) {
            echo "<h2>Error</h2>";
        }
    }

    public static function search(Request $request) {
        $tmp = [];
        $tmp['total_count'] = 3;
        $tmp['incomplete_result'] = true;
        $tmp['items'] = [];
        $tmp['items'][0] = [
            'avatar_url' => 'www.ssfsdm',
            'name' => 'Hello444',
            'surname' => 'World',
            'department' => 'eye',
            'time' => 'morning',
            "created_at"=> "2014-09-18T16:12:01Z",
            "private"=> false,
            "id"=> 4444,
            "html_url"=> "",
        ];
        $tmp['items'][1] = [
            'avatar_url' => 'www.ssfsdm',
            'name' => 'Hello216546',
            'surname' => 'World',
            'department' => 'eye',
            'time' => 'morning',
            "created_at"=> "2014-09-18T16:12:01Z",
            "private"=> false,
            "id"=> 24195339,
            "html_url"=> "",
        ];

        return $tmp;
    }
}
