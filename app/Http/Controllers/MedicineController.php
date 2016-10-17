<?php

namespace App\Http\Controllers;

use App\Medicine;
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
        $medicine = Medicine::find($request->medicine_id);
        $medicine->delete();
    }

    public static function get_medicine_list()
    {
        $all_medicine = Medicine::select('medicine_id', 'medicine_name', 'business_name')->get();
        return $all_medicine;
    }

    public function search_medicine(Request $request)
    {
        $keyword= $request->keyword;
        if ($keyword != ""){
        $medicine_list = Medicine::select('medicine_id', 'medicine_name', 'business_name')->where('medicine_name', 'like', '%'.($keyword).'%')
            ->orWhere('business_name', 'like', '%'.($keyword).'%')->get();
        }
        else {
            $medicine_list = [];
        }
        return compact('keyword','medicine_list');
    }

    public function get_medicine_detail(Request $request)
    {
        $medicine = Medicine::findOrFail($request->medicine_id);
        return $medicine;
    }
}
