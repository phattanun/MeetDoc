<?php

namespace App\Console;

use App\Appointment;
use App\DailySchedule;
use App\Department;
use App\Http\Controllers\MessageController;
use App\User;
use Faker\Provider\DateTime;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
         Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->call(function() {

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
                "11" => "พฤษจิกายน",
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

        })->daily();
    }
}
