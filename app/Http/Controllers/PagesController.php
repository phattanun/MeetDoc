<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\WorkingTimeController;

class PagesController extends Controller
{
    public function index() {
        if(Auth::check()) return view('masterpage');
        else return view('auth/login');
    }

    public function viewLogin() {
        if(Auth::check()) return redirect('/');
        else return view('auth/login');
    }

    public function login(Request $request) {
        if(AccountController::login($request))
            return redirect('/');
        else $request->flashExcept('password'); // Auto-fill Inputs when Failed.
        return redirect('/login')->withErrors(['']);
    }

    public function forgetPassword(Request $request) {
        $res = AccountController::forgetPassword($request);
        if($res['status']) {
            // TODO: send email/sms
        }
        else $request->flash();
        // return view('auth/passwords/forget')->with('success', $res['status']);
        return view('auth/confirm')->with(['title' => 'ขอเปลี่ยนรหัสผ่านสำเร็จ', 'action' => 'ทำการเปลี่ยนรหัสผ่าน', 'link' => $res['link']]);
    }

    public function changePassword(Request $request) {
        $request->id = Auth::user()->ssn;
        $res = AccountController::forgetPassword($request);
        if($res['status']) {
            // TODO: send email/sms
        }
        return view('auth/confirm')->with(['title' => 'ขอเปลี่ยนรหัสผ่านสำเร็จ', 'action' => 'ทำการเปลี่ยนรหัสผ่าน', 'link' => $res['link']]);
    }

    public function resetPassword(Request $request) {
        $res = AccountController::resetPassword($request);
        return view('auth/confirm')->with(['title' => 'เปลี่ยนรหัสผ่านสำเร็จ']);
    }

    public function register(Request $request) {
        $res = AccountController::register($request);
        if($res['status'])
            return view('auth/confirm')->with(['title' => 'ขอลงทะเบียนสำเร็จ', 'action' => 'ยืนยันการลงทะเบียน', 'link' => $res['link']]);
        else $request->flashExcept('id');
        return view('auth/register')->with('msg','รหัสบัตรประจำตัวประชาชนซ้ำ');
    }

    public function viewProfile() {
        $user = Auth::user();
        return view('profile')->with([
            'hid' => $user->id,
            'ssn' => $user->ssn,
            'name' => $user->name,
            'surname' => $user->surname,
            'gender' => $user->gender,
            'birthday' => $user->birthday,
            'address' => $user->address,
            'email' => $user->email,
            'phone_no' => $user->phone_no,
            'drugAllergy' => [],
        ]);
    }

    public function editProfile(Request $request) {
        $request->id = Auth::User()->id;
        $user = AccountController::edit($request);
        Auth::setUser($user);
        return $this->viewProfile();
    }

    public function viewSchedule() {
        $doctor_id = Auth::User()->id;
        $weekly = ScheduleController::getWeeklySchedule($doctor_id);
        $dailyAdd = ScheduleController::getDailySchedule($doctor_id, 'add');
        $dailySub = ScheduleController::getDailySchedule($doctor_id, 'sub');
        // var_dump($dailyAdd);
        // var_dump($dailySub);
        return view('doctorSchedule')->with(['weekly_schedule' => $weekly, 'daily_add_schedule' => $dailyAdd, 'daily_sub_schedule' => $dailySub]);
    }

    public function addWeeklySchedule(Request $request) {
        $request->doctor_id = Auth::User()->id;
        $res = ScheduleController::addWeeklySchedule($request);
        return redirect('/doctor/schedule');
    }

    public function addDailySchedule(Request $request) {
        $request->date = date('Y-m-d', strtotime($request->date));
        $request->doctor_id = Auth::User()->id;
        $res = ScheduleController::addDailySchedule($request);
        return redirect('/doctor/schedule');
    }

    public function deleteWeeklySchedule(Request $request) {

    }

    public function viewOfficerManage() {
        $res = AccountController::getUserList();
        return view('officer')->with('users_list', $res);
    }

    //Patient
    public function newAppointmentPage()
    {
        return view('appointment-new');
    }
    public function appointmentHistoryPage()
    {
        return view('appointment-history');
    }
    public function appointmentFuturePage()
    {
        return view('appointment-future');
    }

    // Pharmacist
    public function drugPage(Request $request) {
        return view('drug')->with(['drugList'=> MedicineController::get_medicine_list()]);
    }

    // Staff

    public function patientCome (){
        return view('patientCome');
    }

    //Admin
    public function diseasePage(Request $request) {
        return view('disease')->with(['diseaseList'=> MedicineController::get_medicine_list()]);
    }
}
