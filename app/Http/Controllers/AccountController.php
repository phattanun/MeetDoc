<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller
{
    public function spam() {
        $this->printUserList();
    }

    public function register(Request $request) {
        echo "Adding New User..";
        var_dump($request->all());
        try {
            $new_user = new User;
            $new_user->ssn = $request->ssn;
            $new_user->name = $request->name;
            $new_user->surname = $request->surname;
            $new_user->gender = $request->gender;
            $new_user->email = $request->email;
            $new_user->address = $request->address;
            $new_user->phone_no = $request->phone_no;
            $new_user->password = $request->password;
            $new_user->save();
        }
        catch (\Exception $e) {
            echo "<h2>Register Error.</h2>";
        }

        $this->printUserList();
    }

    public function printUserList() {
        echo "User List:<br>";
        $users = User::all();
        foreach ($users as $user) {
            echo $user."<br>";
        }
    }

    public function login(Request $request){

        if(Auth::attempt(['ssn'=> $request->ssn, 'password' => $request->password])){
            return Auth::user();
        }
        else {
            return null;
        }
    }

    public function logout(){

        if(!is_null(Auth::user())){
            Auth::logout();
            Session::flush();
        }

        return redirect('/login');
    }
}
