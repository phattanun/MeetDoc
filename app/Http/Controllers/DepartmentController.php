<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\User;
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
        if(Department::where('name',$request->name)->exists()){
            return 'duplicate';
        }
        try {
            $department = new Department();
            $department->name = $request->name;
            $department->save();
            return 'success';
        } catch (Exception $e) {
            return 'fail';
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
        if(User::where("dept_id",$request->id)->exists()||Appointment::where("dept_id",$request->id)->exists()){
            return "constraint";
        }
        $department = Department::findOrFail($request->id);
        $department->delete();
        return "success";
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
