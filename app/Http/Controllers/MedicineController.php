<?php

namespace App\Http\Controllers;

use App\Medicine;
use Illuminate\Http\Request;

use App\Http\Requests;
use Mockery\CountValidator\Exception;

class MedicineController extends Controller
{
    private static function printTable($array) {
        $temp = "";
        if(sizeof($array) == 0) {
            $temp .=  "<h4>Empty Table</h4>";
            return;
        }
        $temp .=   "<table border='1'>";
        $temp .=   "<tr>";
        foreach ($array[0] as $key => $value)
            $temp .=   "<th>".$key."</th>";
        $temp .=   "</tr>";
        foreach ($array as $instance) {
            $temp .=   "<tr>";
            foreach($instance as $key => $value)
                $temp .=   "<td>".$value."</td>";
            $temp .=   "</tr>";
        }
        $temp .=   "</table><br>";
        return $temp;
    }

    public function create_medicine(Request $request)
    {
        $input = $request->all();
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
        $medicine = Medicine::findOrFail($request->medicine_id);
        $edited = array_filter($request->all());
        $editable = ['medicine_name', 'business_name', 'type', 'description', 'instruction', 'manufacturer'];
        $filtered = array_intersect_key($edited, array_flip($editable));

        try {
            foreach ($filtered as $key => $value)
                $medicine[$key] = $value;
            $medicine->save();
        } catch (Exception $e) {
            echo '<H2>Error</H2>';
        }

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

    public function get_medicine_detail(Request $request)
    {
        $medicine = Medicine::findOrFail($request->medicine_id);
        return $medicine;
    }
}
