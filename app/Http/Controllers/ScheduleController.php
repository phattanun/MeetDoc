<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DateDim;
use App\Schedule;
use App\WeeklySchedule;
use App\DailySchedule;

class ScheduleController extends Controller
{

    private static function printTable($array, $schedule_type = "other") {
        $dayDict = [
            'Sunday' => 'วันอาทิตย์',
            'Monday' => 'วันจันทร์',
            'Tuesday' => 'วันอังคาร',
            'Wednesday' => 'วันพุธ',
            'Thursday' => 'วันพฤหัสบดี',
            'Friday' => 'วันศุกร์',
            'Saturday' => 'วันเสาร์',
        ];
        $timeDict = [ 'M' => 'เช้า', 'A' => 'บ่าย' ];

        $re = '';
        if(sizeof($array) == 0)
            return $re;
        $i = 1;
        foreach ($array as $instance) {
            $re .= "<tr>";
            foreach($instance as $key => $value) {
                switch($key) {
                    case 'doctor_id':
                        $value = $i;
                        break;
                    case 'day':
                        $value = $dayDict[$value];
                        break;
                    case 'time':
                        $value = $timeDict[$value];
                        break;
                    case 'date':
                        $value = date('d-m-Y', strtotime($value));
                }
                if($key == 'type' || ($schedule_type == 'sub' && $key == 'dept_id'))
                    continue;
                $re .= "<td>".$value."</td>";
            }
            $i++;
            $re .= '<td><a href="javascript:;" class="btn red"> ลบ <i class="fa fa-trash"></i></a></td></tr>';
        }
        $re .= "</table><br>";
        return $re;
    }

    private static function printWeeklyTable($array) {
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

    private static function printCalendarTable($array) {
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

    private static function sortArrayByDayTimeAttr($array) {
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

    public static function getWeeklySchedule($doctor_id) {
        try {
            $weekly_schedule = WeeklySchedule::where('doctor_id', $doctor_id)->get()->toArray();
            $weekly_schedule = self::sortArrayByDayTimeAttr($weekly_schedule);
        }
        catch (\Exception $e) {
            // echo "<h2>Error: ".$e->getMessage()."</h2>";
            return '';
        }
        return self::printTable($weekly_schedule);
    }

    public static function addWeeklySchedule(Request $request) {
        // echo "<h2>Request Updating Normal-Schedule</h2>";
        // var_dump($request->all());
        try {
            $record = WeeklySchedule::where('doctor_id', $request->doctor_id)->where('day', $request->day)->where('time', $request->time)->first();
            if($record != null) {
                // echo "<h2>Update Normal-Schedule</h2>";
                WeeklySchedule::where('doctor_id', $request->doctor_id)->where('day', $request->day)->where('time', $request->time)->update(['dept_id' => $request->dept_id]);
            }
            else {
                // echo "<h2>Add New Normal-Schedule</h2>";
                $new_ws = new WeeklySchedule;
                $new_ws->doctor_id = $request->doctor_id;
                $new_ws->day = $request->day;
                $new_ws->time = $request->time;
                $new_ws->dept_id = $request->dept_id;
                $new_ws->save();
            }
        }
        catch (\Exception $e) {
            // echo "<h2>Error: ".$e->getMessage()."</h2>";
            return $e->getMessage();
        }
        // $this->getWeeklySchedule();
        return true;
    }

    public static function deleteWeeklySchedule(Request $request) {
        echo "<h2>Request Deleting Normal-Schedule</h2>";
        var_dump($request->all());
        try {
            $status = WeeklySchedule::where('doctor_id', $request->doctor_id)->where('day', $request->day)->where('time', $request->time)->delete();
            if($status)
                echo "<h2>Delete Normal-Schedule</h2>";
            else echo "<h2>Nothing to Delete</h2>";
        }
        catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
        $this->getWeeklySchedule();
    }



    // ############################
    //        Daily Schedule
    // ############################

    private static function sortArrayByDateTimeAttr($array) {
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

    public static function getDailySchedule($doctor_id, $type) {
        try {
            $schedule_daily = DailySchedule::where(['doctor_id' => $doctor_id, 'type' => $type])->get()->toArray();
            $schedule_daily = self::sortArrayByDateTimeAttr($schedule_daily);
            return self::printTable($schedule_daily, $type);
        }
        catch (\Exception $e) {
            // echo "<h2>Error: ".$e->getMessage()."</h2>";
            return '';
        }
    }

    public static function addDailySchedule(Request $request) {
        // echo "<h2>Request Updating Special-Schedule</h2>";
        // var_dump($request->all());
        try {
            if($request->type == "add" && $request->dept_id == "")
                throw new \Exception("No Attend Department", 1);

            $record = DailySchedule::where('doctor_id', $request->doctor_id)->where('date', $request->date)->where('time', $request->time)->first();
            if($record != null) {
                // echo "<h2>Update Special-Schedule</h2>";
                DailySchedule::where('doctor_id', $request->doctor_id)->where('date', $request->date)->where('time', $request->time)->update(['type' => $request->type, 'dept_id' => $request->dept_id]);
            }
            else {
                // echo "<h2>Add New Special-Schedule</h2>";
                $new_ds = new DailySchedule;
                $new_ds->doctor_id = $request->doctor_id;
                $new_ds->date = $request->date;
                $new_ds->time = $request->time;
                $new_ds->type = $request->type;
                $new_ds->dept_id = $request->dept_id;
                $new_ds->save();
            }
        }
        catch (\Exception $e) {
            // echo "<h2>Error: ".$e->getMessage()."</h2>";
            return false;
        }
        // $this->getDailySchedule();
        return true;
    }

    public static function deleteDailySchedule(Request $request) {
        echo "<h2>Request Deleting Special-Schedule</h2>";
        var_dump($request->all());
        try {
            $status = DailySchedule::where('doctor_id', $request->doctor_id)->where('date', $request->date)->where('time', $request->time)->delete();
            if($status)
                echo "<h2>Delete Special-Schedule</h2>";
            else
                throw new \Exception("Nothing to Delete", 1);
        }
        catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
        $this->getDailySchedule();
    }


    // ############################
    //        Query Function
    // ############################

    public static function getSchedule(Request $request) {
        var_dump($request->all());

        $normalTime = WeeklySchedule::where('doctor_id', $request->doctor_id)->get()->toArray();
        $addTime = DailySchedule::where('doctor_id', $request->doctor_id)->where('type', 'add')->get()->toArray();
        $subTime = DailySchedule::where('doctor_id', $request->doctor_id)->where('type', 'sub')->get()->toArray();

        // $addTime = $this->sortArrayByDateTimeAttr($addTime);
        // $subTime = $this->sortArrayByDateTimeAttr($subTime);

        $this->printWeeklyTable($normalTime);
        echo "<h2>Daily Schedule (Add)</h2>";
        $this->printTable($addTime);
        echo "<h2>Weekly Schedule (Subtract)</h2>";
        $this->printTable($subTime);

        $schedule = Schedule::where('doctor_id', $request->doctor_id)->where('date','>=',$request->from)->where('date','<=',$request->to)->get()->toArray();
        $schedule = $this->sortArrayByDateTimeAttr($schedule);
        $this->printCalendarTable($schedule);
    }
}