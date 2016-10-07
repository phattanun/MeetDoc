<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\NormalWorkingTime;

class WorkingTimeController extends Controller
{
    private function sortArrayByDayTimeAttr($array) {
        $compare = function($a, $b) {
            $day_a = date('w', strtotime($a['day']));
            $day_b = date('w', strtotime($b['day']));
            $time_a = $a['time'];
            $time_b = $b['time'];
            if($day_a == $day_b) {
                return ord($time_b) - ord($time_a);
            }
            return $day_a - $day_b;
        };
        usort($array, $compare);
        return $array;
    }

    private function tempPrintTable($array) {
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
    public function getNormalWorkingTime() {
        $normal_working_time = NormalWorkingTime::all()->toArray();
        $normal_working_time = $this->sortArrayByDayTimeAttr($normal_working_time);
        $this->tempPrintTable($normal_working_time);
        // return $normal_working_time;
    }

    public function addNormalWorkingTime(Request $request) {
        echo "<h2>Request Updating Normal-WorkingTime</h2>";
        var_dump($request->all());
        try {
            $record = NormalWorkingTime::where('doctor_ssn', $request->doctor_ssn)->where('day', $request->day)->where('time', $request->time)->first();
            if($record != null) {
                echo "<h2>Update Normal-WorkingTime</h2>";
                NormalWorkingTime::where('doctor_ssn', $request->doctor_ssn)->where('day', $request->day)->where('time', $request->time)->update(['dept_id' => $request->dept_id]);
            }
            else {
                echo "<h2>Add New Normal-WorkingTime</h2>";
                $new_nwt = new NormalWorkingTime;
                $new_nwt->doctor_ssn = $request->doctor_ssn;
                $new_nwt->day = $request->day;
                $new_nwt->time = $request->time;
                $new_nwt->dept_id = $request->dept_id;
                $new_nwt->save();
            }
        }
        catch (\Exception $e) {
            echo "<h2>Error</h2>";
        }
        $this->getNormalWorkingTime();
    }

    public function deleteNormalWorkingTime(Request $request) {
        echo "<h2>Request Deleting Normal-WorkingTime</h2>";
        var_dump($request->all());
        try {
            $status = NormalWorkingTime::where('doctor_ssn', $request->doctor_ssn)->where('day', $request->day)->where('time', $request->time)->delete();
            if($status)
                echo "<h2>Delete Normal-WorkingTime</h2>";
            else echo "<h2>Nothing to Delete</h2>";
        }
        catch (\Exception $e) {
            echo "<h2>Error</h2>";
        }
        $this->getNormalWorkingTime();
    }
}
