<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\User;
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
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    private static function tableToSearch($table, $key)
    {
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

    public function apiGetStaff(Request $request)
    {
        $res = AccountController::getUserList(['id', 'name', 'surname', 'ssn', 'image'], ['name'=>$request->q, 'surname'=>$request->q, 'ssn'=>$request->q]);
        $res = self::tableToSearch($res, 'id');
        return $res;
    }

    public function apiGetDisease(Request $request)
    {
        $res = DiseaseController::search_disease_list($request->q);
        $res = self::tableToSearch($res, 'id');
        return $res;
    }

    public function apiGetMedicine(Request $request)
    {
        $res = MedicineController::search_medicine($request->q);
        $res = self::tableToSearch($res, 'id');
        return $res;
    }

    public function apiGetAppointment(Request $request)
    {
        $res = AppointmentController::search($request->q);
        $res = self::tableToSearch($res, 'id');
//        dd($res);
        return $res;
    }

    public function viewOfficerNewAppointmentPage(Request $request)
    {
        $_permission = Auth::user();
        if(!($_permission['staff']&&($_permission['p_officer']||$_permission['p_doctor'])))
            return self::index();
        $patient_id = $request->patient_id;
        $patient = User::where('id', $patient_id)->first();
        $name = $patient['name'];
        $surname = $patient['surname'];
        return view('appointment-instead-new',compact(['patient_id','name','surname']))->with('departments', DepartmentController::getAllDepartment());
    }
    public function tempAccount()
    {
        return view('account-temp');
    }

    public function viewOfficerAppointmentSearchDoctorPage()
    {
        $_permission = Auth::user();
        if(!($_permission['staff']&&$_permission['p_officer']))
            return self::index();
        return view('appointment-instead-searchDoctor')->with('appList', AppointmentController::getFutureAppointments(Auth::user()['id']));
    }

    public function apiGetDoctor(Request $request)
    {
        $res = AccountController::getDoctorList(['id', 'name', 'surname', 'ssn', 'image'], ['name'=>$request->q, 'surname'=>$request->q, 'ssn'=>$request->q]);
        $res = self::tableToSearch($res, 'id');
        return $res;
    }

    public function viewOfficerAppointmentSearchUserPage()
    {
        $_permission = Auth::user();
        if(!($_permission['staff']&&$_permission['p_officer']))
            return self::index();
        return view('appointment-instead-searchuser')->with('appList', AppointmentController::getFutureAppointments(Auth::user()['id']));
    }

    public function viewOfficerFutureAppointmentPage($id)
    {
        $_permission = Auth::user();
        if(!($_permission['staff']&&$_permission['p_officer']))
            return self::index();
        $patient = User::findOrfail($id);
        return view('appointment-instead-future')->with(['appList'=>AppointmentController::getFutureAppointments($id),'patient'=>$patient]);
    }

    public function viewOfficerEditAppointmentPage(Request $request)
    {
        $_permission = Auth::user();
        if(!($_permission['staff']&&$_permission['p_officer']))
            return self::index();
        $app = AppointmentController::getBriefAppointmentDetail($request->id);
        $doctors = AccountController::getDoctorByDepartment2($app->dept_id);

        $patient = User::findOrfail($app->patient_id);
        return view('appointment-instead-edit')->with(['app'=>$app,'departments'=>DepartmentController::getAllDepartment(),'doctors'=>$doctors,'patient'=>$patient]);
    }


    public function index()
    {
        $user = Auth::user();
        if (Session::get('_role') == 'Patient'){
            return self::appointmentFuturePage();
        }
        elseif (Session::get('_role') == 'Staff'){
            if($user->p_doctor)
                return self::viewRecentAppointment();
            if($user->p_nurse)
                return self::viewQueue();
            if($user->p_pharm)
                return self::viewQueue();
            if($user->p_officer)
                return self::patientCome();
            if($user->p_admin)
                return self::viewOfficerManage();
        }
        else {
            return self::viewProfile();
        }
    }

    public function viewLogin()
    {
        if (Auth::check()) return redirect('/');
        else return view('auth/login');
    }

    public function login(Request $request)
    {
        if (AccountController::login($request))
            return redirect('/');
        else $request->flashExcept('password'); // Auto-fill Inputs when Failed.
        return redirect('/login')->withErrors(['']);
    }

    public function forgetPassword(Request $request)
    {
        $res = AccountController::forgetPassword($request);
        if ($res['status']) {
            // TODO: send email/sms
            MessageController::sendForget($res);
        } else {
            // Fake Forget Password
            return view('auth/confirm')->with(['title' => 'ขอเปลี่ยนรหัสผ่านสำเร็จ', 'action' => 'ทำการเปลี่ยนรหัสผ่าน']);
        };
        return view('auth/confirm')->with(['title' => 'ขอเปลี่ยนรหัสผ่านสำเร็จ', 'action' => 'ทำการเปลี่ยนรหัสผ่าน', 'link' => $res['link']]);
    }

    public function changePassword(Request $request)
    {
        $request->id = Auth::user()->ssn;
        $res = AccountController::forgetPassword($request);
        if ($res['status']) {
            // TODO: send email/sms
            MessageController::sendForget($res);
        } else {
            // Fake Forget Password
            return view('auth/confirm')->with(['title' => 'ขอเปลี่ยนรหัสผ่านสำเร็จ', 'action' => 'ทำการเปลี่ยนรหัสผ่าน']);
        };
        return view('auth/confirm')->with(['title' => 'ขอเปลี่ยนรหัสผ่านสำเร็จ', 'action' => 'ทำการเปลี่ยนรหัสผ่าน', 'link' => $res['link']]);
    }
    public function resetPassword(Request $request)
    {
        $res = AccountController::resetPassword($request);
        if ($res['status'])
            return view('auth/confirm')->with(['title' => 'เปลี่ยนรหัสผ่านสำเร็จ']);
        return view('auth/failed')->with(['title' => 'เปลี่ยนรหัสผ่านไม่สำเร็จ', 'message' => 'ลิงก์ไม่ถูกต้องหรือหมดอายุ', 'action' => 'กรุณาติดต่อเจ้าหน้าที่หรือใช้ระบบลืมรหัสผ่าน']);
    }
    public function register(Request $request)
    {
        $res = AccountController::register($request);
        if ($res['status']) {
            MessageController::sendRegister($res);
            return view('auth/confirm')->with(['title' => 'ขอลงทะเบียนสำเร็จ', 'action' => 'ยืนยันการลงทะเบียน', 'link' => $res['link']]);
        } else $request->flashExcept('id');
        return view('auth/register')->with('msg', 'หมายเลขบัตรประจำตัวประชาชนซ้ำ');
    }
    public function viewProfile()
    {
        $user = Auth::user();
        $allergic_medicine = DiagnosisController::get_allergic_medicine($user);
        $medicine_list = MedicineController::get_medicine_list();
        return view('profile')->with([
            'hid' => $user->id,
            'ssn' => $user->ssn,
            'name' => $user->name,
            'surname' => $user->surname,
            'image' => $user->image,
            'gender' => $user->gender,
            'birthday' => $user->birthday,
            'address' => $user->address,
            'email' => $user->email,
            'phone_no' => $user->phone_no,
            'allergic_medicine' => $allergic_medicine,
            'medicine_list' => $medicine_list
        ]);
    }
    public function editProfile(Request $request)
    {
        $request->id = Auth::User()->id;
        $res = AccountController::createEditProfileLink($request);
        if ($res['status']) {
            MessageController::sendEditProfile($res);
            return view('auth/confirm')->with(['title' => 'ขอแก้ไขข้อมูลส่วนตัวสำเร็จ', 'action' => 'ยืนยันการแก้ไขข้อมูลส่วนตัว', 'link' => $res['link']]);
        }
        return view('auth/failed')->with(['title' => 'ขอแก้ไขข้อมูลส่วนตัวไม่สำเร็จ', 'action' => 'กรุณาติดต่อเจ้าหน้าที่หรือเข้าสู่ระบบใหม่']);
    }
    public function officerEditProfile(Request $request)
    {
        $res = AccountController::createEditProfileLink($request);
        if ($res['status']) {
            MessageController::sendEditProfile($res);
            return view('auth/confirm')->with(['title' => 'ขอแก้ไขข้อมูลส่วนตัวสำเร็จ', 'action' => 'ยืนยันการแก้ไขข้อมูลส่วนตัว', 'link' => $res['link']]);
        }
        return view('auth/failed')->with(['title' => 'ขอแก้ไขข้อมูลส่วนตัวไม่สำเร็จ', 'action' => 'กรุณาติดต่อเจ้าหน้าที่หรือเข้าสู่ระบบใหม่']);
    }
    public function editProfilePic(Request $request)
    {
        AccountController::editProfilePic($request);
        return redirect('/profile');
    }
    public function officerEditProfilePic(Request $request)
    {
        AccountController::editProfilePic($request);
        return redirect('/account/manage/'.$request->id);
    }

    public function viewSchedule()
    {
        $_permission = Auth::user();
        if(!($_permission['staff']&&$_permission['p_doctor']))
            return self::index();
        $doctor_id = Auth::User()->id;
        $weekly = ScheduleController::getWeeklySchedule($doctor_id);
        $dailyAdd = ScheduleController::getDailySchedule($doctor_id, 'add');
        $dailySub = ScheduleController::getDailySchedule($doctor_id, 'sub');
        return view('doctorSchedule')->with(['weekly_schedule' => $weekly, 'daily_add_schedule' => $dailyAdd, 'daily_sub_schedule' => $dailySub]);
    }

    public function insteadViewSchedule($id)
    {
        $_permission = Auth::user();
        if(!($_permission['staff']&&$_permission['p_officer']))
            return self::index();
        $doctor_id = $id;
        $doctor = User::findOrFail($id);
        $doctor_fullname = $doctor->name." ".$doctor->surname;
        $weekly = ScheduleController::getWeeklySchedule($doctor_id);
        $dailyAdd = ScheduleController::getDailySchedule($doctor_id, 'add');
        $dailySub = ScheduleController::getDailySchedule($doctor_id, 'sub');
        return view('doctorSchedule')->with(['weekly_schedule' => $weekly, 'daily_add_schedule' => $dailyAdd, 'daily_sub_schedule' => $dailySub, 'id' => $doctor_id, 'fullname' => $doctor_fullname]);
    }

    public function addWeeklySchedule(Request $request)
    {
        if(!isset($request->doctor_id))
            $request->doctor_id = Auth::User()->id;
        $res = ScheduleController::addWeeklySchedule($request);
        return Redirect::back();
    }

    public function addDailySchedule(Request $request)
    {
        $request->date = date('Y-m-d', strtotime($request->date));
        if(!isset($request->doctor_id))
            $request->doctor_id = Auth::User()->id;
        $res = ScheduleController::addDailySchedule($request);
        return Redirect::back();
    }

    public function viewRecentAppointment()
    {
        $_permission = Auth::user();
        if(!($_permission['staff']&&$_permission['p_doctor']))
            return self::index();
        $res = AppointmentController::getRecentAppointments(['doctor_id' => Auth::user()->id]);
        return view('doctorNearAppointment')->with('recent_appointment', $res);
    }

    public function viewOfficerManage()
    {
        $user = Auth::user();
        if(!($user['staff']&&$user['p_admin']))
            return self::index();
        $res = AccountController::getUserList(['id', 'ssn', 'name', 'surname', 'dept_id', 'p_admin', 'p_doctor', 'p_nurse', 'p_pharm', 'p_officer'], ['staff' => true]);
        $res = AccountController::officerManageTable($res);
        return view('officer')->with('users_list', $res);
    }

    public function getStaffList()
    {
        $res = AccountController::getUserList(['id', 'ssn', 'name', 'surname', 'dept_id', 'p_admin', 'p_doctor', 'p_nurse', 'p_pharm', 'p_officer'], ['staff' => true]);
        $res = AccountController::officerManageTable($res);
        return $res;
    }

    public function addStaff(Request $request)
    {
        $res = SystemController::addStaff($request);
        return $res;
    }

    public function removeStaff(Request $request)
    {
        $res = SystemController::removeStaff($request);
        return $res;
    }

    public function changePermission(Request $request)
    {
        $res = SystemController::changePermission($request);
        return $res;
    }

    public function approveEditProfile(Request $request)
    {
        $res = AccountController::edit($request);
        if ($res['status']) {
            return view('auth/confirm')->with(['title' => 'แก้ไขข้อมูลส่วนตัวสำเร็จ']);
        } else {
            return view('auth/failed')->with(['title' => 'แก้ไขข้อมูลส่วนตัวไม่สำเร็จ', 'message' => 'ลิงก์ไม่ถูกต้องหรือหมดอายุ', 'action' => 'กรุณาติดต่อเจ้าหน้าที่หรือทำการแก้ไขข้อมูลส่วนตัวใหม่']);
        };
    }

    //Appointment
    public function newAppointmentPage()
    {
        return view('appointment-new')->with('departments', DepartmentController::getAllDepartment());
    }

    public function createAppointmentInsteadPage(Request $request)
    {
        $user = Auth::user();
        return AppointmentController::create($request);
    }

    public function createAppointmentPage(Request $request)
    {
        $user = Auth::user();
        $request->patient_id = $user['id'];
        return AppointmentController::create($request);
    }

    public function editAppointmentPage(Request $request)
    {
        $user = Auth::user();
        $request->patient_id = $user['id'];
        return AppointmentController::createEditAppointmentLink($request);
    }

    public function editAppointmentOfficer(Request $request, $id)
    {
        $_permission = Auth::user();
        if(!($_permission['staff']&&$_permission['p_officer']))
            return self::index();
        $request->patient_id = $id;
        return AppointmentController::createEditAppointmentLink($request);
    }

    public function appointmentHistoryPage()
    {
        return view('appointment-history')->with('appList', AppointmentController::getPastAppointments(Auth::user()['id']));
    }

    public function appointmentFuturePage()
    {
        return view('appointment-future')->with('appList', AppointmentController::getFutureAppointments(Auth::user()['id']));
    }

    public function appointmentEditPage(Request $request)
    {
        $app = AppointmentController::getBriefAppointmentDetail($request->id);
        $doctors = AccountController::getDoctorByDepartment2($app->dept_id);
        return view('appointment-edit')->with(['app' => $app, 'departments' => DepartmentController::getAllDepartment(), 'doctors' => $doctors]);
    }

    public function approveCreateAppointment(Request $request) {
        $res = AppointmentController::confirmCreateAppointment($request);
        if ($res['status']) {
            return view('auth/confirm')->with(['title' => 'ยืนยันการนัดหมายสำเร็จ']);
        } else {
            return view('auth/failed')->with(['title' => 'ยืนยันการนัดหมายไม่สำเร็จ', 'message' => 'ลิงก์ไม่ถูกต้องหรือหมดอายุ', 'action' => 'กรุณาติดต่อเจ้าหน้าที่หรือทำการนัดหมายใหม่']);
        };
    }

    public function approveCancelAppointment(Request $request) {
        $res = AppointmentController::confirmCancelAppointment($request);
        if ($res['status']) {
            return view('auth/confirm')->with(['title' => 'ยกเลิกการนัดหมายสำเร็จ']);
        } else {
            return view('auth/failed')->with(['title' => 'ยกเลิกการนัดหมายไม่สำเร็จ', 'message' => 'ลิงก์ไม่ถูกต้องหรือหมดอายุ', 'action' => 'กรุณาติดต่อเจ้าหน้าที่หรือทำการยกเลิกนัดหมายใหม่']);
        };
    }

    public function approveEditAppointment(Request $request) {
        $res = AppointmentController::confirmEditAppointment($request);
        if ($res['status']) {
            return view('auth/confirm')->with(['title' => 'แก้ไขการนัดหมายสำเร็จ']);
        } else {
            return view('auth/failed')->with(['title' => 'แก้ไขการนัดหมายไม่สำเร็จ', 'message' => 'ลิงก์ไม่ถูกต้องหรือหมดอายุ', 'action' => 'กรุณาติดต่อเจ้าหน้าที่หรือทำการแก้ไขนัดหมายใหม่']);
        };
    }

    // Department
    public function departmentPage()
    {
        $_permission = Auth::user();
        if(!($_permission['staff']&&$_permission['p_admin']))
            return self::index();
        return view('department')->with(['departmentList' => DepartmentController::get_list()]);
    }

    // Account
    public function accountPage()
    {
        $_permission = Auth::user();
        if(!($_permission['staff']&&$_permission['p_admin']))
            return self::index();
        return view('account')->with(['accountList' => AccountController::get_list()]);
    }
    // Pharmacist
    public function drugPage(Request $request)
    {
        $_permission = Auth::user();
        if(!($_permission['staff']&&$_permission['p_pharm']))
            return self::index();
        return view('drug')->with(['drugList' => MedicineController::get_medicine_list()]);
    }

    // Staff
    public function patientCome()
    {
        $_permission = Auth::user();
        if(!($_permission['staff']&&$_permission['p_officer']))
            return self::index();
        return view('patientCome');
    }

    //everyone
    public function viewQueue()
    {
        $_permission = Auth::user();
        if(!($_permission['staff']&&($_permission['p_nurse']||$_permission['p_pharm']||$_permission['p_doctor'])))
            return self::index();
        return view('queue')->with(['queue_list' => DiagnosisController::get_queue()]);
    }

    //Admin
    public function diseasePage(Request $request)
    {
        $_permission = Auth::user();
        if(!($_permission['staff']&&$_permission['p_admin']))
            return self::index();
        return view('disease')->with(['diseaseList' => DiseaseController::get_disease_list()]);
    }
    public function editAccountPage($id)
    {
        $_permission = Auth::user();
        if(!($_permission['staff']&&$_permission['p_admin']))
            return self::index();
        $user = User::findOrFail($id);
        $allergic_medicine = DiagnosisController::get_allergic_medicine($user);
        $medicine_list = MedicineController::get_medicine_list();
        return view('profile-edit')->with([
            'hid' => $user->id,
            'ssn' => $user->ssn,
            'name' => $user->name,
            'surname' => $user->surname,
            'image' => $user->image,
            'gender' => $user->gender,
            'birthday' => $user->birthday,
            'address' => $user->address,
            'email' => $user->email,
            'phone_no' => $user->phone_no,
            'allergic_medicine' => $allergic_medicine,
            'medicine_list' => $medicine_list
        ]);
    }
}
