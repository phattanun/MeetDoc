<?php

namespace App\Http\Controllers;

use App\Allergic;
use App\Appointment;
use App\Medicine;
use App\Prescription;
use Illuminate\Http\Request;

use App\Http\Requests;
use Mockery\CountValidator\Exception;

class MedicineController extends Controller
{
    public function create_medicine(Request $request)
    {
        $input = $request->all();
        $input['type'] = implode(",",$input['type']);
        try {
            $medicine = new Medicine();
            $medicine->medicine_name = $input['medicine_name'];
            $medicine->business_name = $input['business_name'];
            $medicine->type = $input['type'];
            $medicine->description = $input['description'];
            $medicine->instruction = $input['instruction'];
            $medicine->manufacturer = $input['manufacturer'];
            $medicine->save();
        } catch (Exception $e) {
            echo '<H2>Error</H2>>';
        }

    }

    public function edit_medicine(Request $request)
    {
        $request = $request->all();
        $medicine = Medicine::findOrFail($request['medicine_id']);
        $request['type'] = implode(",",$request['type']);
//        var_dump($request);
        try {
            foreach ($request as $key => $value) {
                if ($key != '_token') {
                    $medicine[$key] = $value;
                }
            }
            $medicine->save();
        } catch (Exception $e) {
            echo '<H2>Error</H2>';
        }
        return redirect('drug/manage');
    }

    public function delete_medicine(Request $request)
    {
        if(Allergic::where("medicine_id",$request->medicine_id)->exists()||Prescription::where("medicine_id",$request->medicine_id)->exists()){
            return "constraint";
        }
        $medicine = Medicine::findOrFail($request->medicine_id);
        $medicine->delete();
        return "success";
    }

    public static function get_medicine_list()
    {
        $all_medicine = Medicine::all();
        return $all_medicine;
    }

    public static function search_medicine_bank(Request $request)
    {
        $keyword = $request->keyword;
        $medicine_list = self::search_medicine($request->keyword);
        return compact('keyword','medicine_list');
    }

    public static function search_medicine($keyword = null)
    {
        if ($keyword != "") {
        $medicine_list = Medicine::select('medicine_id', 'medicine_name', 'business_name')
            ->where('medicine_name', 'like', '%'.($keyword).'%')
            ->orWhere('business_name', 'like', '%'.($keyword).'%')
            ->get();
            foreach ($medicine_list as $medicine)
            {
                $medicine['id'] = $medicine['medicine_id'];
                $medicine['fullname'] = $medicine['business_name'] . " (" . $medicine['medicine_name'].")";
            }
        }
        else {
            $medicine_list = [];
        }
        return $medicine_list;
    }

    public function get_medicine_detail(Request $request)
    {
        $medicine = Medicine::findOrFail($request->medicine_id);
        return $medicine;
    }


}
