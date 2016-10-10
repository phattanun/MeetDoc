<?php

namespace App\Http\Controllers;

use App\Drug;
use Illuminate\Http\Request;

use App\Http\Requests;
use Mockery\CountValidator\Exception;

class MedicineController extends Controller
{
    public function add_drug(Request $request)
    {
        $input = $request->all();
        try {
            $drug = new Drug();
            $drug->name = $input['drug_name'];
            $drug->description = $input['drug_description'];
            $drug->instruction = $input['drug_instruction'];
            $drug->save();
        } catch (Exception $e) {
            echo '<H2>Error</H2>>';
        }

    }

    public function edit_drug(Request $request)
    {
        $drug = Drug::findOrFail($request->drug_id);
        $edited = array_filter($request->all());
        $editable = ['name', 'description', 'instruction'];
        $filtered = array_intersect_key($edited, array_flip($editable));

        foreach ($filtered as $key => $value)
            $drug[$key] = $value;
        $drug->save();

    }

    public function delete_drug(Request $request)
    {
        $drug = Drug::find($request->drug_id);
        $drug->delete();
    }
}
