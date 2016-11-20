<?php

namespace App\Http\Controllers;

use App\AppointmentDisease;
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
        if(AppointmentDisease::where("disease_id",$request->id)->exists()){
            return "constraint";
        }
        $disease = Disease::findOrFail($request->id);
        $disease->delete();
        return "success";
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

    public static function search_disease(Request $request){
        $keyword = $request->keyword;
        $disease_list = self::search_disease_list($keyword);
        return compact('keyword','disease_list');
    }

    public static function search_disease_list($keyword = null)
    {
        if ($keyword != ""){
            $disease_list = Disease::where('icd10', 'like', '%'.($keyword).'%')
                ->orWhere('snomed', 'like', '%'.($keyword).'%')
                ->orWhere('drg', 'like', '%'.($keyword).'%')
                ->orWhere('name', 'like', '%'.($keyword).'%')
                ->get();
            foreach($disease_list as $disease){
                $disease['fullname'] = $disease['name']." (".$disease['icd10'].", ".$disease['snomed'].", ".$disease['drg'].")";
            }
        }
        else {
            $disease_list = [];
        }

        return $disease_list;
    }
}
