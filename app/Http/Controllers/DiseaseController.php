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
            $disease->name = $request->name;
            $disease->icd10 = $request->icd10;
            $disease->snomed = $request->snomed;
            $disease->drg = $request->drg;
            $disease->save();
        } catch (Exception $e) {
            echo '<H2>Error</H2>';
        }
    }

    public function edit_disease(Request $request)
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

    public function delete_disease(Request $request)
    {
        $disease = Disease::findOrFail($request->id);
        $disease->delete();
    }

    public function get_disease_detail(Request $request)
    {
        $disease = Disease::findOrFail($request->id);
        return $disease;
    }

    public static function get_disease_list()
    {
        $disease_list = Disease::all();
        return $disease_list;
    }

    public static function search_disease_list($keyword = null)
    {
        if ($keyword != ""){
            $disease_list = Disease::where('icd10', 'like', '%'.($keyword).'%')
                ->orWhere('snomed', 'like', '%'.($keyword).'%')
                ->orWhere('drg', 'like', '%'.($keyword).'%')
                ->orWhere('name', 'like', '%'.($keyword).'%')
                ->get();
        }
        else {
            $disease_list = [];
        }

        return $disease_list;
    }
}
