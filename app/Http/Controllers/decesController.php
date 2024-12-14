<?php

namespace App\Http\Controllers;

use App\Models\Bureau;
use App\Models\City;
use App\Models\Commune;
use App\Models\Region;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class decesController extends Controller
{
    public function deces(){
        $regions = Region::all();
        return view('deces', compact('regions'));
    }

    //enregistrer les informations de reclamation
    public function store(Request $request){

        $validated = $request->validate([
            'region' => 'required',
            'city' => 'required',
            'commune' => 'required',
        ]);

        $regionName = DB::table('regions')->where('id', $validated['region'])->value('name');

        DB::table('death_certificate_requests')->insert([
            'region_id' => $regionName, 
            'city_id' => $validated['city'],
            'commune_id' => $validated['commune'],
        ]);

        return back()->with('success', 'تم إرسال الطلب بنجاح !');

    }

    public function getCities($regionId)
    {
        $cities = City::where('region_id', $regionId)->get();
        return response()->json(['cities' => $cities]);
    }

    public function getCommunes($cityId)
    {
        $communes = Commune::where('city_id', $cityId)->get();
        return response()->json(['communes' => $communes]);
    }

    public function getBureaux($cityId)
    {
        $bureaux = Bureau::where('city_id', $cityId)->get(); 
        return response()->json(['bureaux' => $bureaux]);
    }

}