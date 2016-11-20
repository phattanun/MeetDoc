<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Disease;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Mockery\CountValidator\Exception;

class SystemController extends Controller
{
    public static function addStaff(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);
            $user->staff = true;
            $user->save();
        } catch (\Exception $e) {
            return "fail";
        }
        return "success";
    }

    public static function removeStaff(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);
            $user->staff = false;
            $user->save();
        } catch (\Exception $e) {
            return "fail";
        }
        return "success";
    }

    public static function changePermission(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);
            $user[$request->type] = ($request->permission=="true") ? 1:0;
            $user->save();
        } catch (\Exception $e) {
            return "fail";
        }
        return "success";
    }

    public static function changeDepartment(Request $request)
    {
        try {
            if(Appointment::where("doctor_id",$request->id)->exists()){
                return "constraint";
            }
            $user = User::findOrFail($request->id);
            $user['dept_id'] = $request->dept_id;
            $user->save();
        } catch (\Exception $e) {
            return "fail";
        }
        return "success";
    }
}
