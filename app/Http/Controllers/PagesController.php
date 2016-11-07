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
use App\Http\Controllers\ScheduleController;

class PagesController extends Controller
{
    private static function tableToSearch($table,$key) {
        $res['total_count'] = sizeof($table);
        $res['incomplete_result'] = true;
        $res['items'] = [];

        foreach ($table as $record) {
            $record["html_url"] = "";
            $record["key"] = $record[$key];
            array_push($res['items'], $record);
        }
        return $res;
    }

    public function apiGetStaff() {
        $res = AccountController::getUserList(['id', 'name', 'surname', 'ssn']);
        $res = self::tableToSearch($res,'id');
        return $res;
    }

    public function index() {
        return view('masterpage');
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
        $allergic_medicine = DiagnosisController::get_allergic_medicine($user);
        $medicine_list = MedicineController::get_medicine_list();
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
            'allergic_medicine' => $allergic_medicine,
            'medicine_list'=> $medicine_list
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

    public function viewRecentAppointment() {
        $res = AppointmentController::getRecentAppointments(['doctor_id' => Auth::user()->id]);
        return view('doctorNearAppointment')->with('recent_appointment', $res);
    }

    public function viewOfficerManage() {
        $res = AccountController::getUserList(['id','ssn','name','surname','dept_id','p_patient','p_doctor','p_nurse','p_pharm','p_officer'], ['staff' => true]);
        $res = AccountController::officerManageTable($res);
        return view('officer')->with('users_list', $res);
    }
    public function getStaffList() {
        $res = AccountController::getUserList(['id','ssn','name','surname','dept_id','p_patient','p_doctor','p_nurse','p_pharm','p_officer'], ['staff' => true]);
        $res = AccountController::officerManageTable($res);
        return $res;
    }
    public function addStaff(Request $request) {
        $res = SystemController::addStaff($request);
        return $res;
    }
    public function removeStaff(Request $request) {
        $res = SystemController::removeStaff($request);
        return $res;
    }
    public function changePermission(Request $request) {
        $res = SystemController::changePermission($request);
        return $res;
    }

    //Appointment
    public function newAppointmentPage()
    {
        return view('appointment-new')->with('departments', DepartmentController::getAllDepartment());
    }
    public function createAppointmentPage(Request $request)
    {
        $user = Auth::user();
        $request->patient_id = $user['id'];
        return AppointmentController::create($request);
    }
    public function appointmentHistoryPage()
    {
        return view('appointment-history')->with('appList',AppointmentController::getPastAppointments(Auth::user()['id']));
    }
    public function appointmentFuturePage()
    {
        return view('appointment-future')->with('appList',AppointmentController::getFutureAppointments(Auth::user()['id']));
    }
    public function appointmentEditPage(Request $request)
    {
        $app=AppointmentController::getBriefAppointmentDetail($request->id);
        $doctors = AccountController::getDoctorByDepartment2($app->dept_id);
        return view('appointment-edit')->with(['app'=>$app,'departments'=>DepartmentController::getAllDepartment(),'doctors'=>$doctors]);
    }

    // Pharmacist
    public function drugPage(Request $request) {
        return view('drug')->with(['drugList'=> MedicineController::get_medicine_list()]);
    }

    // Staff
    public function patientCome (){
        return view('patientCome');
    }

    //everyone
    public function viewQueue()
    {
        return view('queue')->with(['queue_list' => DiagnosisController::get_queue()]);
    }

    //Admin
    public function diseasePage(Request $request) {
        return view('disease')->with(['diseaseList'=> DiseaseController::get_disease_list()]);
    }
}
