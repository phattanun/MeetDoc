<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\User;

class AccountController extends Controller
{
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

    public function all() {
        $this->getUserList();
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
            echo "<h2>Register Error</h2>";
        }

        $this->getUserList();
    }

    public function getUserList() {
        echo "User List:<br>";
        $users = User::all();
        foreach ($users as $user) {
            echo $user."<br>";
        }
        return $users;
    }

    public function getProfile(Request $request) {
        try {
            $profile = User::findOrFail($request->ssn);
            var_dump($profile['attributes']);
        }
        catch (\Exception $e) {
            echo "<h2>Get Profile Error</h2>";
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
            echo "<h2>Edit Profile Error</h2>";
        }
    }

}
