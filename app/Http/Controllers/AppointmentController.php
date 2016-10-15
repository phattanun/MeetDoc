<?php

namespace App\Http\Controllers;

use App\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;

class AppointmentController extends Controller
{
    private function printTable($array) {
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

    public function getAppointmentList() {
        $apps = Appointment::all()->toArray();
        $this->printTable($apps);
    }


    public function create(Request $request)
    {
        var_dump($request->all());
        try {
            $validate = Appointment::where('patient_ssn', $request->patient_ssn)
                                    ->where('date', $request->date)
                                    ->where('time', $request->time)
                                    ->get()->toArray();
            if(sizeof($validate) > 0)
                throw new \Exception("Duplicate Appointment", 1);

            $ap = new Appointment();
            $ap->date = $request->date;
            $ap->time = $request->time;
            $ap->symptom = $request->symptom;
            $ap->queue_status = 'uncheckedin';
            $ap->checkin_time = null;
            $ap->type = (strtotime($request->date) == strtotime('today') ? 'W' :'R'); // R refers to reserve and W refers to walk-in.
            $ap->patient_ssn = $request->patient_ssn;
            $ap->doctor_ssn = $request->doctor_ssn;
            $ap->save();

        } catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
        $this->getAppointmentList();
    }

    private function generateCancelLink($doctor_id, $patient_id, $time) {
        return hash('ripemd256', "CanCel".$doctor_id.$time.$patient_id."aPProVed");
    }

    public function cancel(Request $request) {
        date_default_timezone_set('Asia/Bangkok');
        $now = date('Y-m-d H:i:s');
        try {
            $ap = Appointment::findOrFail($request->id);
            $ap->cancel_time = $now;
            $ap->save();
            echo "Approve Link: <a href='./cancelApprove?aid=".$ap->id."&apv=".$this->generateCancelLink($ap->doctor_ssn, $ap->patient_ssn, $now)."'>here</a>";
        }
        catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
        $this->getAppointmentList();
    }

    public function cancelApprove(Request $request) {
        date_default_timezone_set('Asia/Bangkok');
        $now = new \DateTime('NOW');
        var_dump($request->all());
        try {
            $ap = Appointment::findOrFail($request->aid);
            if($request->apv == $this->generateCancelLink($ap->doctor_ssn, $ap->patient_ssn, $ap->cancel_time)) {
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
        $this->getAppointmentList();
    }

    public function edit(Request $request) {
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
            'appointment_id' => '555',
            'name' => 'Hello',
            'surname' => 'World',
            'department' => 'eye',
            'time' => 'morning'
        ];
        $tmp['items'][1] = [
            'avatar_url' => 'www.ssfsdm',
            'appointment_id' => '555',
            'name' => 'Hello',
            'surname' => 'World',
            'department' => 'eye',
            'time' => 'morning'
        ];
        $tmp['items'][2] = [
            'avatar_url' => 'www.ssfsdm',
            'appointment_id' => '555',
            'name' => 'Hello',
            'surname' => 'World',
            'department' => 'eye',
            'time' => 'morning'
        ];

        return $tmp;
    }
}
