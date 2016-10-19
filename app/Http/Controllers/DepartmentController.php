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
}
