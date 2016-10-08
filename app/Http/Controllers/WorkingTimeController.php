<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DateDim;
use App\NormalWorkingTime;
use App\SpecialWorkingTime;

class WorkingTimeController extends Controller
{

    // ############################
    //     Normal Working Time
    // ############################

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
        try {
            $normal_working_time = $this->sortArrayByDayTimeAttr($normal_working_time);
            $this->tempPrintTable($normal_working_time);
        }
        catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
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
            echo "<h2>Error: ".$e->getMessage()."</h2>";
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
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
        $this->getNormalWorkingTime();
    }



    // ############################
    //     Special Working Time
    // ############################

    private function sortArrayByDateTimeAttr($array) {
        $compare = function($a, $b) {
            $day_a = date('w', strtotime($a['date']));
            $day_b = date('w', strtotime($b['date']));
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

    public function getSpecialWorkingTime() {
        $special_working_time = SpecialWorkingTime::all()->toArray();
        try {
            $special_working_time = $this->sortArrayByDateTimeAttr($special_working_time);
            $this->tempPrintTable($special_working_time);
        }
        catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
        // return $special_working_time;
    }

    public function addSpecialWorkingTime(Request $request) {
        echo "<h2>Request Updating Special-WorkingTime</h2>";
        var_dump($request->all());
        try {
            if($request->type == "add" && $request->dept_id == "")
                throw new \Exception("No Attend Department", 1);

            $record = SpecialWorkingTime::where('doctor_ssn', $request->doctor_ssn)->where('date', $request->date)->where('time', $request->time)->first();
            if($record != null) {
                echo "<h2>Update Special-WorkingTime</h2>";
                SpecialWorkingTime::where('doctor_ssn', $request->doctor_ssn)->where('date', $request->date)->where('time', $request->time)->update(['type' => $request->type, 'dept_id' => $request->dept_id]);
            }
            else {
                echo "<h2>Add New Special-WorkingTime</h2>";
                $new_swt = new SpecialWorkingTime;
                $new_swt->doctor_ssn = $request->doctor_ssn;
                $new_swt->date = $request->date;
                $new_swt->time = $request->time;
                $new_swt->type = $request->type;
                $new_swt->dept_id = $request->dept_id;
                $new_swt->save();
            }
        }
        catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
        $this->getSpecialWorkingTime();
    }

    public function deleteSpecialWorkingTime(Request $request) {
        echo "<h2>Request Deleting Special-WorkingTime</h2>";
        var_dump($request->all());
        try {
            $status = SpecialWorkingTime::where('doctor_ssn', $request->doctor_ssn)->where('date', $request->date)->where('time', $request->time)->delete();
            if($status)
                echo "<h2>Delete Special-WorkingTime</h2>";
            else
                throw new \Exception("Nothing to Delete", 1);
        }
        catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
        $this->getSpecialWorkingTime();
    }


    // ############################
    //        Query Function
    // ############################

    public function getWorkingTime(Request $request) {
        $normalTime = NormalWorkingTime::where('doctor_ssn', $request->doctor_ssn)->get()->toArray();
        $addTime = SpecialWorkingTime::where('doctor_ssn', $request->doctor_ssn)->where('type', 'add')->get()->toArray();
        $subTime = SpecialWorkingTime::where('doctor_ssn', $request->doctor_ssn)->where('type', 'sub')->get()->toArray();

        $normalTime = $this->sortArrayByDayTimeAttr($normalTime);
        $addTime = $this->sortArrayByDateTimeAttr($addTime);
        $subTime = $this->sortArrayByDateTimeAttr($subTime);

        $this->tempPrintTable($normalTime);
        $this->tempPrintTable($addTime);
        $this->tempPrintTable($subTime);
    }
}
