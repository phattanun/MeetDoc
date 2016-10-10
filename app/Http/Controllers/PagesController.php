<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\AccountController;

use App\Http\Requests;

class PagesController extends Controller
{
    public function register(Request $request) {
        $con = new AccountController;
        $result = $con->register($request);
        if($result != "Success") {
            return view('auth/login')->with('error', $result);
        }
        return view('confirmRegister');
    }
}
