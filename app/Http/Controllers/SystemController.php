<?php

namespace App\Http\Controllers;

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
            return false;
        }
        return true;
    }

    public static function removeStaff(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);
            $user->staff = false;
            $user->save();
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public static function changePermission(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);
            $user[$request->type] = $request->permission;
            $user->save();
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public function add_disease(Request $request)
    {
        try {
            $disease = new Disease();
            $disease->name = $request->disease_name;
            $disease->icd10 = $request->disease_icd10;
            $disease->snomed = $request->disease_snomed;
            $disease->save();
        } catch (Exception $e) {
            echo '<H2>Error</H2>';
        }
    }

    public function edit_disease(Request $request)
    {
        $disease = Disease::findOrFail($request->disease_id);
        try {
            $disease->name = $request->disease_name;
            $disease->icd10 = $request->disease_icd10;
            $disease->snomed = $request->disease_snomed;
            $disease->save();
        } catch (Exception $e) {
            echo '<H2>Error</H2>';
        }
    }

    public function delete_disease(Request $request)
    {
        $disease = Disease::findOrFail($request->disease_id);
        $disease->delete();
    }

    public static function disease_list()
    {
        $disease_list = Disease::all();
        dd($disease_list->toArray());
    }
}
