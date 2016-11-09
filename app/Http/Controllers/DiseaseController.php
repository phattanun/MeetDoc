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

    public function search_disease(Request $request)
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

    public static function get_disease_list()
    {
        $disease_list = Disease::all();
        return $disease_list;
    }

    public static function search_disease_list(Request $request) {
        $tmp = [];
        $tmp['total_count'] = 3;
        $tmp['incomplete_result'] = true;
        $tmp['items'] = [];
        $tmp['items'][0] = [
            'name' => 'Hello444',
            "id"=> 4444
        ];
        $tmp['items'][1] = [
            'name' => 'Hello216546',
            "id"=> 24195339
        ];

        return $tmp;
    }
}
