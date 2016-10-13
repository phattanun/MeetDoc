<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DateDim;
use App\Schedule;
use App\ScheduleWeekly;
use App\ScheduleDaily;

class ScheduleController extends Controller
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

    private function printWeeklyTable($array) {
        $dow = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $time = ['Morning', 'Afternoon'];
        function charToTime($c, $time) {
            return $c == 'M' ? $time[0] : $time[1];
        }
        foreach ($array as $record) {
            $table[$record['day']][charToTime($record['time'], $time)] = $record['dept_id'];
        }
        echo "<table border='1' style='text-align:center'><tr><th>Weekly</th>";
        foreach ($dow as $day)
            echo "<th>".$day."</th>";
        echo "</tr>";
        foreach ($time as $t) {
            echo "<tr><th>".$t."</th>";
            foreach ($dow as $day) {
                echo "<td>".(isset($table[$day][$t]) ? $table[$day][$t] : "")."</td>";
            }
            echo "</tr>";
        }
        echo "</table><br>";
    }

    private function printCalendarTable($array) {
        $dow = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $time = ['Morning', 'Afternoon'];
        $date = new \DateTime("@".strtotime($array[0]['date']));
        $date->modify('last Sunday');
        $table[$date->format('Y-m-d')]['day'] = $date->format('j');
        $table[$date->format('Y-m-d')]['month'] = $date->format('M');
        $table[$date->format('Y-m-d')]['dow'] = $date->format('l');
        $table[$date->format('Y-m-d')]['free'] = True;
        foreach ($array as $record) {
            while($date->getTimeStamp() != strtotime($record['date'])) {
                $date->modify("+1 day");
                $table[$date->format('Y-m-d')]['day'] = $date->format('j');
                $table[$date->format('Y-m-d')]['month'] = $date->format('M');
                $table[$date->format('Y-m-d')]['dow'] = $date->format('l');
                $table[$date->format('Y-m-d')]['free'] = True;
            }
            $table[$date->format('Y-m-d')]['free'] = False;
            $table[$date->format('Y-m-d')][charToTime($record['time'],$time)] = $record['dept_id'];
        }
        while($date->format('l') != "Saturday") {
            $date->modify("+1 day");
            $table[$date->format('Y-m-d')]['day'] = $date->format('j');
            $table[$date->format('Y-m-d')]['month'] = $date->format('M');
            $table[$date->format('Y-m-d')]['dow'] = $date->format('l');
            $table[$date->format('Y-m-d')]['free'] = True;
        }

        echo "<table border='1' style='text-align:center'><tr><th colspan='22'>Calendar</th></tr>";

        echo "<tr><td></td>";
        foreach ($dow as $day)
            echo "<th colspan='3'>".$day."</th>";
        echo "</tr>";

        echo "<tr><th>Month</th>";
        foreach ($dow as $day)
            echo "<th>Day</th><th>เช้า</th><th>บ่าย</th>";
        echo "</tr>";

        foreach ($table as $record) {
            if($record['dow'] == "Sunday")
                echo "<tr><th>".$record['month']."</th>";
            echo "<th colspan='1' style='font-size:1px'>".$record['day']."</th>";
            if($record['free'])
                echo "<td colspan='2' width='80px'>-</td>";
            else {
                foreach ($time as $t)
                    if(isset($record[$t]))
                        echo "<td width='40px'>".$record[$t]."</td>";
                    else
                        echo "<td width='40px'>-</td>";
            }
            if($record['dow'] == "Saturday")
                echo "</tr>";
        }
        echo "</table><br>";
    }

    // ############################
    //       Weekly Schedule
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

    public function getScheduleWeekly() {
        $schedule_weekly = ScheduleWeekly::all()->toArray();
        try {
            $schedule_weekly = $this->sortArrayByDayTimeAttr($schedule_weekly);
            $this->printTable($schedule_weekly);
        }
        catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
        // return $schedule_weekly;
    }

    public function addScheduleWeekly(Request $request) {
        echo "<h2>Request Updating Normal-Schedule</h2>";
        var_dump($request->all());
        try {
            $record = ScheduleWeekly::where('doctor_ssn', $request->doctor_ssn)->where('day', $request->day)->where('time', $request->time)->first();
            if($record != null) {
                echo "<h2>Update Normal-Schedule</h2>";
                ScheduleWeekly::where('doctor_ssn', $request->doctor_ssn)->where('day', $request->day)->where('time', $request->time)->update(['dept_id' => $request->dept_id]);
            }
            else {
                echo "<h2>Add New Normal-Schedule</h2>";
                $new_nwt = new ScheduleWeekly;
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
        $this->getScheduleWeekly();
    }

    public function deleteScheduleWeekly(Request $request) {
        echo "<h2>Request Deleting Normal-Schedule</h2>";
        var_dump($request->all());
        try {
            $status = ScheduleWeekly::where('doctor_ssn', $request->doctor_ssn)->where('day', $request->day)->where('time', $request->time)->delete();
            if($status)
                echo "<h2>Delete Normal-Schedule</h2>";
            else echo "<h2>Nothing to Delete</h2>";
        }
        catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
        $this->getScheduleWeekly();
    }



    // ############################
    //        Daily Schedule
    // ############################

    private function sortArrayByDateTimeAttr($array) {
        $compare = function($a, $b) {
            $day_a = strtotime($a['date']);
            $day_b = strtotime($b['date']);
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

    public function getScheduleDaily() {
        $schedule_daily = ScheduleDaily::all()->toArray();
        try {
            $schedule_daily = $this->sortArrayByDateTimeAttr($schedule_daily);
            $this->printTable($schedule_daily);
        }
        catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
        // return $schedule_daily;
    }

    public function addScheduleDaily(Request $request) {
        echo "<h2>Request Updating Special-Schedule</h2>";
        var_dump($request->all());
        try {
            if($request->type == "add" && $request->dept_id == "")
                throw new \Exception("No Attend Department", 1);

            $record = ScheduleDaily::where('doctor_ssn', $request->doctor_ssn)->where('date', $request->date)->where('time', $request->time)->first();
            if($record != null) {
                echo "<h2>Update Special-Schedule</h2>";
                ScheduleDaily::where('doctor_ssn', $request->doctor_ssn)->where('date', $request->date)->where('time', $request->time)->update(['type' => $request->type, 'dept_id' => $request->dept_id]);
            }
            else {
                echo "<h2>Add New Special-Schedule</h2>";
                $new_swt = new ScheduleDaily;
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
        $this->getScheduleDaily();
    }

    public function deleteScheduleDaily(Request $request) {
        echo "<h2>Request Deleting Special-Schedule</h2>";
        var_dump($request->all());
        try {
            $status = ScheduleDaily::where('doctor_ssn', $request->doctor_ssn)->where('date', $request->date)->where('time', $request->time)->delete();
            if($status)
                echo "<h2>Delete Special-Schedule</h2>";
            else
                throw new \Exception("Nothing to Delete", 1);
        }
        catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
        $this->getScheduleDaily();
    }


    // ############################
    //        Query Function
    // ############################

    public function getSchedule(Request $request) {
        var_dump($request->all());

        $normalTime = ScheduleWeekly::where('doctor_ssn', $request->doctor_ssn)->get()->toArray();
        $addTime = ScheduleDaily::where('doctor_ssn', $request->doctor_ssn)->where('type', 'add')->get()->toArray();
        $subTime = ScheduleDaily::where('doctor_ssn', $request->doctor_ssn)->where('type', 'sub')->get()->toArray();

        // $addTime = $this->sortArrayByDateTimeAttr($addTime);
        // $subTime = $this->sortArrayByDateTimeAttr($subTime);

        $this->printWeeklyTable($normalTime);
        echo "<h2>Daily Schedule (Add)</h2>";
        $this->printTable($addTime);
        echo "<h2>Weekly Schedule (Subtract)</h2>";
        $this->printTable($subTime);

        $schedule = Schedule::where('doctor_ssn', $request->doctor_ssn)->where('date','>=',$request->from)->where('date','<=',$request->to)->get()->toArray();
        $schedule = $this->sortArrayByDateTimeAttr($schedule);
        $this->printCalendarTable($schedule);
    }
}
