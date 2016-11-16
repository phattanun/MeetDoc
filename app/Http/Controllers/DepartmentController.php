<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Http\Requests;
use Mockery\CountValidator\Exception;
class DepartmentController extends Controller
{

    public static function getAllDepartment()
    {
        return Department::all();
    }
    public function add(Request $request)
    {
        try {
            $department = new Department();
            $department->name = $request->name;
            $department->save();
        } catch (Exception $e) {
            echo '<H2>Error</H2>';
        }
    }

    public function edit(Request $request)
    {
        $department = Department::findOrFail($request->id);
        try {
            $department->name = $request->name;
            $department->save();
        } catch (Exception $e) {
            echo '<H2>Error</H2>';
        }
    }

    public function delete(Request $request)
    {
        $department = Department::findOrFail($request->id);
        $department->delete();
    }

    public function get_detail(Request $request)
    {
        $department = Department::findOrFail($request->id);
        return $department;
    }

    public function search(Request $request)
    {

        $keyword= $request->keyword;
        if ($keyword != ""){
            $department_list = Department::where('name', 'like', '%'.($keyword).'%')->get();
        }
        else {
            $department_list = [];
        }
        return compact('keyword','department_list');
    }

    public static function get_list()
    {
        $department_list = Department::all();
        return $department_list;
    }
}
