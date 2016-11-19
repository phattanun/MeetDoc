<?php

namespace App\Http\Controllers;

use App\Allergic;
use App\Appointment;
use App\Department;
use App\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\User;

class AccountController extends Controller
{
    private static function base62_encode ($data) {
        $outstring = '';
        $len = strlen($data);
        for ($i = 0; $i < $len; $i += 8) {
            $chunk = substr($data, $i, 8);
            $outlen = ceil((strlen($chunk) * 8) / 6);
            $x = bin2hex($chunk);
            $number = ltrim($x, '0');
            if ($number === '') $number = '0';
            $w = gmp_strval(gmp_init($number, 16), 62);
            $pad = str_pad($w, $outlen, '0', STR_PAD_LEFT);
            $outstring .= $pad;
        }
        return $outstring;
    }

    private static function base62_decode ($data) {
        $outstring = '';
        $len = strlen($data);
        for ($i = 0; $i < $len; $i += 11) {
            $chunk = substr($data, $i, 11);
            $outlen = floor((strlen($chunk) * 6) / 8);
            $number = ltrim($chunk, '0');
            if ($number === '') $number = '0';
            $y = gmp_strval(gmp_init($number, 62), 16);
            $pad = str_pad($y, $outlen * 2, '0', STR_PAD_LEFT);
            $outstring .= pack('H*', $pad);
        }
        return $outstring;
    }

    public static function login(Request $request){
        if(Auth::viaRemember() || Auth::attempt(array('ssn' => $request->id, 'password' => $request->password), isset($request->remember))) {
            Session::set('_role', (Auth::user()->staff ? 'Staff' : 'Patient'));
            return true;
        }
        return false;
    }

    public static function loginStatus() {
        if(Auth::check()) {
            echo '<h3>Already Login</h3>';
            var_dump(Auth::user()->toArray());
        }
        else echo '<h3>Not Login Yet</h3>';
    }

    public static function swapRole() {
        $user = Auth::user();
        if(!is_null($user)) {
            switch (Session::get('_role')) {
                case 'Patient':
                    if($user->staff)
                        Session::set('_role', 'Staff');
                    break;

                default:
                    Session::set('_role', 'Patient');
                    break;
            }
        }
        return redirect('');
    }

    public static function logout(){
        if(Auth::check()) {
            Session::flush();
            Auth::logout();
        }
        return redirect('/login');
    }

    private static function generateRandomString($length = 64) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private static function generatePasswordLink($ssn,$name,$surname,$password,$email,$time) {
        return hash('ripemd256', 'IhaVeA'.$name.'.IhAveA'.$surname.'.UGH,'.$ssn.'iDonTHAaveA'.$password.'.ihAvEAN'.$email.'UGh,FoRgEtPasSWOrDbeforeThIs'.$time);
    }

    public static function register(Request $request) {
        date_default_timezone_set('Asia/Bangkok');
        $now = date('Y-m-d H:i:s');
        try {
            $new_user = new User;
            $new_user->ssn = $request->id;
            $new_user->name = $request->name;
            $new_user->surname = $request->surname;
            $new_user->gender = $request->gender;
            $new_user->birthday = join('-', array_reverse(explode('/',$request->birthday)));
            $new_user->email = $request->email;
            $new_user->address = $request->address;
            $new_user->phone_no = $request->phone;
            $new_user->password = self::generateRandomString(64);
            $new_user->last_active = $now;
            $new_user->save();
        }
        catch (\Exception $e) {
            return ["status" => false, "msg" => $e->getMessage() ];
        }

        $re = [
            "status" => true,
            "name" => $request->name,
            "surname" => $request->surname,
            "email" => $request->email,
            "phone_number" => $request->phone_no,
            "link" => "./password/reset?id=".$new_user->id."&cfp=".self::generatePasswordLink($new_user->ssn, $request->name, $request->surname, $new_user->password, $request->email, $now)
        ];
        // echo "<a href='".$re['link']."'>Reset Password Link</a>";
        // var_dump($re);ybnlp-
        return $re;
    }

    public static function forgetPassword(Request $request) {
        date_default_timezone_set('Asia/Bangkok');
        $now = date('Y-m-d H:i:s');
        try {
            $user = User::where('ssn', $request->id)->first();
            if(sizeof($user) == 0)
                throw new \Exception("SSN not found", 1);
            $user->last_active = $now;
            $user->save();
        }
        catch (\Exception $e) {
            // echo "<h2>Error: ".$e->getMessage()."</h2>";
            return ["status" => false, "msg" => $e->getMessage()];
        }

        $res = [
            "status" => true,
            "name" => $user->name,
            "surname" => $user->surname,
            "email" => $user->email,
            "phone_number" => $user->phone_no,
            "link" => "./password/reset?id=".$user->id."&cfp=".self::generatePasswordLink($user->ssn, $user->name, $user->surname, $user->password, $user->email, $now)
        ];
        return $res;
    }

    public static function resetPassword(Request $request) {
        date_default_timezone_set('Asia/Bangkok');
        $now = new \DateTime('NOW');
        try {
            $user = User::findOrFail($request->id);
            if($request->cfp == self::generatePasswordLink($user->ssn, $user->name, $user->surname, $user->password, $user->email, $user->last_active)) {
                $forget_time = new \DateTime($user->last_active);
                if(($now->getTimeStamp() - $forget_time->getTimeStamp())/3600 < 24) {
                    $user->password = bcrypt($request->password);
                    $user->save();
                }
                else throw new \Exception("Too late for resetting password", 1);
            }
            else throw new \Exception("Wrong reset password key", 1);
        }
        catch (\Exception $e) {
            // echo "<h2>Error: ".$e->getMessage()."</h2>";
            return ["status" => false, "msg" => $e->getMessage()];
        }
        return ["status" => true];
    }

    public static function officerManageTable($array) {
        $re = "";
        $search = array();
        $alldept = Department::all();
        for ($i=0; $i < 10; $i++)
            array_push($search, "?".$i);
        foreach ($array as $record) {
            $replace = array();
            foreach ($record as $key => $value) {
                switch($key) {
                    case 'p_admin':
                    case 'p_doctor':
                    case 'p_nurse':
                    case 'p_pharm':
                    case 'p_officer':
                        $value = ($value ? 'checked' : '');
                        break;
                }
                array_push($replace, $value);
            }
            $tempDept = "<option value='0'>ไม่มีแผนก</option>";
            for($i = 0; $i<sizeof($alldept); $i++){
                if($record['dept_id']==$alldept[$i]['id'])
                    $tempDept .= '<option selected value='.$alldept[$i]['id'].'>'.$alldept[$i]['name'].'</option>';
                else
                    $tempDept .= '<option value='.$alldept[$i]['id'].'>'.$alldept[$i]['name'].'</option>';
            }
            $template = '<tr>
            <td> ?0 </td>
            <td> ?1 </td>
            <td> ?2 </td>
            <td> ?3 </td>
            <td> <select class="form-control select2-dept" id="?0"  data-live-search="true">'
                .$tempDept.
                '</select>
                </td>
            <td><input type="checkbox" id="?0" isa="p_doctor" class="make-switch" data-on-text="มี" data-off-text="ไม่มี" data-on-color="success" data-size="mini" ?6></td>
            <td><input type="checkbox" id="?0" isa="p_nurse" class="make-switch" data-on-text="มี" data-off-text="ไม่มี" data-on-color="success" data-size="mini" ?7></td>
            <td><input type="checkbox" id="?0" isa="p_pharm" class="make-switch" data-on-text="มี" data-off-text="ไม่มี" data-on-color="success" data-size="mini" ?8></td>
            <td><input type="checkbox" id="?0" isa="p_officer" class="make-switch" data-on-text="มี" data-off-text="ไม่มี" data-on-color="success" data-size="mini" ?9></td>
            <td><input type="checkbox" id="?0" isa="p_admin" class="make-switch" data-on-text="มี" data-off-text="ไม่มี" data-on-color="success" data-size="mini" ?5></td>
            <td><button type="button" id="?0" class="btn red delete-staff-btn">ลบ</button></td>
        </tr>';
            $re .= strtr($template,array_combine($search,$replace));
        }
        return $re;
    }

    public static function getUserList($select = null, $filter = null) {
        $users = isset($select) ? User::select($select) : User::select();
        if(isset($filter))
            foreach ($filter as $key => $value) {
                $users = $users->orWhere($key , 'like', '%'.$value.'%');
            }
//            $users = $users->orWhere($filter);
        $users = $users->get()->toArray();
        return $users;
    }

    public static function getProfile(Request $request) {
        try {
            $profile = User::findOrFail($request->id);
            $profile['allergic_medicine'] = $profile->allergic_medicine()->get();
            foreach($profile['allergic_medicine'] as $tmp){
                $tmp['fullname'] = $tmp['business_name'] . " (" . $tmp['medicine_name'] . ")";
            }
            return $profile;
        }
        catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
        // return $profile['attributes'];
    }

    private static function generateEditProfileHash($ssn, $name, $surname, $gender, $birthday, $email, $address, $phone_no, $time) {
        return hash('ripemd256', "UsER".$ssn."WaNttoeDITprOfilEIn".$name.$surname.$gender.$birthday.$email.$address.$phone_no."aT".$time."NaJA");
    }

    public static function createEditProfileLink(Request $request) {
        date_default_timezone_set('Asia/Bangkok');
        $now = date('Y-m-d H:i:s');

        if(isset($request->id)) {
            $user = User::findOrfail($request->id);
        }
        else $user = Auth::user();

        $edited = array_filter($request->all());
        $edited['birthday'] =  join('-',array_reverse(explode("/",$edited['birthday'])));
        $editable_field = ['ssn','name', 'surname', 'gender', 'birthday', 'email', 'address', 'phone_no'];
        $filtered = array_intersect_key($edited, array_flip($editable_field));
        $filtered['_now'] = $now;

        $encoded = base64_encode(json_encode($filtered));
        $date = explode(' ', $now)[0];
        $time = explode(' ', $now)[1];
        $hour = explode(':', $time)[0];
        $min = explode(':', $time)[1];
        $day = explode('-', $date)[2];
        $im = explode('-', $date)[1];
        $year = explode('-', $date)[0];

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

        $res = [
            "status" => true,
            "name" => $user->name,
            "surname" => $user->surname,
            "time" => $hour.".".$min." น. วันที่ ".$day." ".$month[$im]." ค.ศ.".$year,
            "email" => $request->email,
            "phone_number" => $request->phone_no,
            "link" => "./account/approve/edit?id=".$user->id."&cep=".self::generateEditProfileHash($user->ssn, $user->name, $user->surname, $user->gender, $user->birthday, $user->email, $user->address, $user->phone_no, $now)."&edt=".$encoded
        ];
        return $res;
    }

    public static function edit(Request $request) {
        date_default_timezone_set('Asia/Bangkok');
        $now = new \DateTime('NOW');
        try {
            $user = User::findOrFail($request->id);
            $data = json_decode(base64_decode($request->edt));

            if(!is_null($data) && isset($data->_now) && $request->cep == self::generateEditProfileHash($user->ssn, $user->name, $user->surname, $user->gender, $user->birthday, $user->email, $user->address, $user->phone_no, $data->_now)) {
                $edit_time = new \DateTime($data->_now);
                if(($now->getTimeStamp() - $edit_time->getTimeStamp())/3600 < 24) {
                    $edited = array_filter((array)$data);
                    $editable_field = ['ssn','name', 'surname', 'gender', 'birthday', 'email', 'address', 'phone_no'];
                    $filtered = array_intersect_key($edited, array_flip($editable_field));

                    foreach ($filtered as $key => $value)
                        $user[$key] = $value;
                    $user->save();
                }
                else throw new \Exception("Too late", 1);
            }
            else throw new \Exception("Wrong key", 1);
        }
        catch (\Exception $e) {
            return ["status" => false, "msg" => $e->getMessage()];
        }
        return ["status" => true];
    }
    public static function editProfilePic(Request $request) {
        $user = User::findOrFail($request->id);
        try {
            $imageData ="";
            if($request->hasFile('image')) {
                $imageData = 'data:'.$request->file('image')->getClientMimeType().';base64,'.base64_encode(file_get_contents($request->image));
            }
            $user['image']= $imageData;
            $user->save();
            return $imageData;
        }
        catch (\Exception $e) {
            return false;
        }
    }

    // Bank's, please ask before editing the lines below
    public static function getDoctorByDepartment(Request $request) {
        return User::select(['id','name','surname'])->where(['dept_id'=>$request->dept_id,'staff'=>1, 'p_doctor'=>1])->get();
    }
    public static function getDoctorByDepartment2($id) {
        return User::select(['id','name','surname'])->where(['dept_id'=>$id,'staff'=>1, 'p_doctor'=>1])->get();
    }

    public static function getAllUser()
    {
        return User::all();
    }

    public function delete(Request $request)
    {
        if(Appointment::where("doctor_id",$request->id)->exists()){
            return "constraint";
        }
        $account = User::findOrFail($request->id);
        $account->delete();
        return "success";
    }

    public function get_detail(Request $request)
    {
        $account = User::findOrFail($request->id);
        $allergy = DiagnosisController::get_allergic_medicine($account);
        $account->medicine = $allergy;
        return $account;
    }

    public function search(Request $request)
    {
        $keyword= $request->keyword;
        if ($keyword != ""){
            $account_list = User::where('id', 'like', '%'.($keyword).'%')
            ->orWhere('ssn', 'like', '%'.($keyword).'%')
            ->orWhere('name', 'like', '%'.($keyword).'%')
            ->orWhere('surname', 'like', '%'.($keyword).'%')
                ->get();
        }
        else {
            $account_list = [];
        }
        return compact('keyword','account_list');
    }

    public static function get_list()
    {
        $account_list = User::all();
        return $account_list;
    }
}
