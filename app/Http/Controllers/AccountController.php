<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\User;

class AccountController extends Controller
{
    public static function login(Request $request){
        if(Auth::viaRemember() || Auth::attempt(array('ssn' => $request->id, 'password' => $request->password), isset($request->remember)))
            return true;
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

                case 'Staff':
                    if($user->p_patient)
                        Session::set('_role', 'Patient');
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
            $new_user->birthday = $request->birthday;
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
        // self::getUserList();
        $re = [
            "status" => true,
            "link" => "./password/reset?id=".$new_user->id."&cfp=".self::generatePasswordLink($request->ssn, $request->name, $request->surname, $new_user->password, $request->email, $now)
        ];
        // echo "<a href='".$re['link']."'>Reset Password Link</a>";
        // var_dump($re);
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

        $re = [
            "status" => true,
            "link" => "./password/reset?id=".$user->id."&cfp=".self::generatePasswordLink($user->ssn, $user->name, $user->surname, $user->password, $user->email, $now)
        ];
        // echo "<a href='".$re['link']."'>Reset Password Link</a>";
        // var_dump($re);
        return $re;
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

    private static function printTable($array) {
        $template = '<tr>
            <td> ?0 </td>
            <td> ?1 </td>
            <td> ?2 </td>
            <td> ?3 </td>
            <td> ?4 </td>
            <td> <select id="multiple" class="form-control select2" ></option>
                        <option selected>แผนกอายุรกรรม</option>
                        <option>ศัลยกรรม</option>
                        <option>สูติ</option>
                        <option>จักษุ</option>
                        <option>โรคผิวหนัง</option>
                        <option>อวัยวะปัสสาวะ</option>
                        <option>หัวใจ</option>
                        <option>หู คอ จมูก</option>
                        <option>รังสี</option>
                        <option>รักษาโรคในช่องปากและฟัน</option>
                    </select>
                </td>
            <td><input type="checkbox" class="make-switch" data-on-text="มี" data-off-text="ไม่มี" data-on-color="success" data-size="mini" ?5></td>
            <td><input type="checkbox" class="make-switch" data-on-text="มี" data-off-text="ไม่มี" data-on-color="success" data-size="mini" ?6></td>
            <td><input type="checkbox" class="make-switch" data-on-text="มี" data-off-text="ไม่มี" data-on-color="success" data-size="mini" ?7></td>
            <td><input type="checkbox" class="make-switch" data-on-text="มี" data-off-text="ไม่มี" data-on-color="success" data-size="mini" ?8></td>
            <td><input type="checkbox" class="make-switch" data-on-text="มี" data-off-text="ไม่มี" data-on-color="success" data-size="mini" ?9></td>
            <td><button id="cancel-app" type="button" class="btn red" data-toggle="modal" data-target="#removeModal">ลบ</button></td>
        </tr>';

        $re = "";
        $search = array();
        for ($i=0; $i < 10; $i++)
            array_push($search, "?".$i);
        foreach ($array as $record) {
            $replace = array();
            foreach ($record as $key => $value) {
                switch($key) {
                    case 'p_patient':
                    case 'p_doctor':
                    case 'p_nurse':
                    case 'p_pharm':
                    case 'p_officer':
                        $value = ($value ? 'checked' : '');
                        break;
                }
                array_push($replace, $value);
            }
            $re .= strtr($template,array_combine($search,$replace));
        }
        return $re;
    }

    public static function getUserList() {
        $users = User::select(['id','ssn','name','surname','dept_id','p_patient','p_doctor','p_nurse','p_pharm','p_officer'])->get()->toArray();
        return self::printTable($users);
    }

    public static function getProfile(Request $request) {
        try {
            $profile = User::findOrFail($request->id);
            var_dump($profile['attributes']);
        }
        catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
        // return $profile['attributes'];
    }

    public static function edit(Request $request) {
        try {
            // Debug
            // echo "Editing request.";
            // var_dump($request->all());

            $user = User::findOrFail($request->id);
            $edited = array_filter($request->all());
            $editable_field = ['name', 'surname', 'gender', 'birthday', 'email', 'address', 'phone_no'];
            $filtered = array_intersect_key($edited, array_flip($editable_field));

            // Debug
            // echo "Editing...";
            // var_dump($filtered);

            foreach ($filtered as $key => $value)
                $user[$key] = $value;
            $user->save();

            // Debug
            // echo "Edited Profile.";
            // var_dump($user['attributes']);
        }
        catch (\Exception $e) {
            // echo "<h2>Error: ".$e->getMessage()."</h2>";
            return false;
        }
        return $user;
    }

}
