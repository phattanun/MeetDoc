<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Http\Requests;

class DepartmentController extends Controller
{

    public static function getAllDepartment()
    {
        return Department::all();
    }
    public function add(Request $request)
    {
        try {
            $disease = new Disease();
            $disease->name = $request->name;
            $disease->icd10 = $request->icd10;
            $disease->snomed = $request->snomed;
            $disease->drg = $request->drg;
            $disease->save();
        } catch (Exception $e) {
            echo '<H2>Error</H2>';
        }
    }

    public function edit(Request $request)
    {
        $disease = Disease::findOrFail($request->id);
        try {
            $disease->name = $request->name;
            $disease->icd10 = $request->icd10;
            $disease->snomed = $request->snomed;
            $disease->drg = $request->drg;
            $disease->save();
        } catch (Exception $e) {
            echo '<H2>Error</H2>';
        }
    }

    public function delete(Request $request)
    {
        $disease = Disease::findOrFail($request->id);
        $disease->delete();
    }

    public function get_detail(Request $request)
    {
        $disease = Disease::findOrFail($request->id);
        return $disease;
    }

    public function search(Request $request)
    {

        $keyword= $request->keyword;
        if ($keyword != ""){
            $disease_list = Disease::where('icd10', 'like', '%'.($keyword).'%')
                ->orWhere('snomed', 'like', '%'.($keyword).'%')->orWhere('drg', 'like', '%'.($keyword).'%')
                ->orWhere('name', 'like', '%'.($keyword).'%')->get();
        }
        else {
            $disease_list = [];
        }
        return compact('keyword','disease_list');
    }

    public static function get_list()
    {
        $department_list = Department::all();
        return $department_list;
    }
}
