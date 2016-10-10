<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class AccountController extends Controller
{
    public function login(Request $request){
        var_dump($request->all());
        echo "remember = ".(isset($request->remember) ? "true" : "false")."<br>";
        if(Auth::viaRemember() || Auth::attempt(array('ssn' => $request->ssn, 'password' => $request->password), isset($request->remember)))
            echo 'SUCCESS!';
        else echo 'FAIL!';
    }

    public function loginStatus() {
        if(Auth::check()) {
            echo '<h3>Already Login</h3>';
            var_dump(Auth::user()->toArray());
        }
        else echo '<h3>Not Login Yet</h3>';
    }

    public function logout(){
        if(Auth::check()) {
            Auth::logout();
            echo "<h3>Logout</h3>";
        }
        else echo "<h3>Already Logout</h3>";
        // return redirect('/login');
    }

    private function generateRandomString($length = 64) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function generatePasswordLink($ssn,$name,$surname,$password,$email,$time) {
        return hash('ripemd256', 'IhaVeA'.$name.'.IhAveA'.$surname.'.UGH,'.$ssn.'iDonTHAaveA'.$password.'.ihAvEAN'.$email.'UGh,FoRgEtPasSWOrDbeforeThIs'.$time);
    }

    public function register(Request $request) {
        date_default_timezone_set('Asia/Bangkok');
        $now = date('Y-m-d H:i:s');
        try {
            $new_user = new User;
            $new_user->ssn = $request->ssn;
            $new_user->name = $request->name;
            $new_user->surname = $request->surname;
            $new_user->gender = $request->gender;
            $new_user->birthday = $request->birthday;
            $new_user->email = $request->email;
            $new_user->address = $request->address;
            $new_user->phone_no = $request->phone_no;
            $new_user->password = $this->generateRandomString(64);
            $new_user->last_active = $now;
            $new_user->save();
        }
        catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
            return ["message" => "Duplicate SSN"];
        }
        // $this->getUserList();
        $re = [
            "message" => "success",
            "link" => "./resetPassword?id=".$new_user->id."&cfp=".$this->generatePasswordLink($request->ssn, $request->name, $request->surname, $new_user->password, $request->email, $now)
        ];
        echo "<a href='".$re['link']."'>Reset Password Link</a>";
        var_dump($re);
    }

    public function forgetPassword(Request $request) {
        date_default_timezone_set('Asia/Bangkok');
        $now = date('Y-m-d H:i:s');
        try {
            $user = User::where('ssn', $request->ssn)->first();
            if(sizeof($user) == 0)
                throw new \Exception("SSN not found", 1);
            $user->last_active = $now;
            $user->save();
        }
        catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
            return ["message" => $e->getMessage()];
        }

        $re = [
            "message" => "success",
            "link" => "./resetPassword?id=".$user->id."&cfp=".$this->generatePasswordLink($user->ssn, $user->name, $user->surname, $user->password, $user->email, $now)
        ];
        echo "<a href='".$re['link']."'>Reset Password Link</a>";
        var_dump($re);
    }

    public function resetPassword(Request $request) {
        date_default_timezone_set('Asia/Bangkok');
        $now = new \DateTime('NOW');
        try {
            $user = User::findOrFail($request->id);
            if($request->cfp == $this->generatePasswordLink($user->ssn, $user->name, $user->surname, $user->password, $user->email, $user->last_active)) {
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
            echo "<h2>Error: ".$e->getMessage()."</h2>";
            return ["message" => $e->getMessage()];
        }
        return ["message" => "success"];
    }

    private function printTable($array) {
        if(sizeof($array) == 0) {
            echo "<h3>Empty Table</h3>";
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

    public function getUserList() {
        $users = User::all();
        $this->printTable($users->toArray());
        // return $users;
    }

    public function getProfile(Request $request) {
        try {
            $profile = User::findOrFail($request->id);
            var_dump($profile['attributes']);
        }
        catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
        // return $profile['attributes'];
    }

    public function edit(Request $request) {
        try {
            // Debug
            echo "Editing request.";
            var_dump($request->all());

            $user = User::findOrFail($request->ssn);
            $edited = array_filter($request->all());
            $editable_field = ['name', 'surname', 'gender', 'email', 'address', 'phone_no', 'password'];
            $filtered = array_intersect_key($edited, array_flip($editable_field));

            // Debug
            echo "Editing...";
            var_dump($filtered);

            foreach ($filtered as $key => $value)
                $user[$key] = $value;
            $user->save();

            // Debug
            echo "Edited Profile.";
            var_dump($user['attributes']);
        }
        catch (\Exception $e) {
            echo "<h2>Error: ".$e->getMessage()."</h2>";
        }
    }

}
