<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Disease;
use Mockery\CountValidator\Exception;
class DiseaseController extends Controller
{

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

    public static function get_disease_list()
    {
        $disease_list = Disease::all();
        return $disease_list;
    }
}
