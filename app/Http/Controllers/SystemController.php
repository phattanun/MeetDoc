<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class SystemController extends Controller
{
    public static function addStaff(Request $request) {
        try {
            $user = User::findOrFail($request->id);
            $user->staff = true;
            $user->save();
        }
        catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public static function removeStaff(Request $request) {
        try {
            $user = User::findOrFail($request->id);
            $user->staff = false;
            $user->save();
        }
        catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public static function changePermission(Request $request) {
        try {
            $user = User::findOrFail($request->id);
            $user[$request->type] = $request->permission;
            $user->save();
        }
        catch (\Exception $e) {
            return false;
        }
        return true;
    }
}
