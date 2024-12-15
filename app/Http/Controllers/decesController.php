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
            'requester_relationship' => 'required', 
            'requester_first_name_ar' => 'required',  
            'requester_last_name_ar' => 'required', 
            'requester_cnie_number' => 'required', 
            'requester_phone' => 'required', 
            'death_date' => 'required', 
            'death_place' => 'required', 
            'death_cause' => 'required', 
            'document_number' => 'required',
            'inscription_year' => 'required',
            'family_book_number' => 'required',
            'recipient_full_name' => 'required',
            'recipient_email' => 'required',
            'recipient_phone' => 'required',
            'delivery_location' => 'required',
            'address_line1' => 'required',
            'address_line2' => 'required',
            'postal_code' => 'required',
            'locality' => 'required',
            'country' => 'required',
        ]);

        $regionName = DB::table('regions')->where('id', $validated['region'])->value('name');

        DB::table('death_certificate_requests')->insert([
            'region_id' => $regionName, 
            'city_id' => $validated['city'],
            'commune_id' => $validated['commune'],
            'requester_relationship' => $validated['requester_relationship'],
            'requester_first_name_ar' => $validated['requester_first_name_ar'],
            'requester_last_name_ar' => $validated['requester_last_name_ar'],
            'requester_cnie_number' => $validated['requester_cnie_number'],
            'requester_phone' => $validated['requester_phone'],
            'death_date' => $validated['death_date'],
            'death_place' => $validated['death_place'],
            'death_cause' => $validated['death_cause'],
            'document_number' => $validated['document_number'],
            'inscription_year' => $validated['inscription_year'],
            'family_book_number' => $validated['family_book_number'],
            'recipient_full_name' => $validated['recipient_full_name'],
            'recipient_email' => $validated['recipient_email'],
            'recipient_phone' => $validated['recipient_phone'],
            'delivery_location' => $validated['delivery_location'],
            'address_line1' => $validated['address_line1'],
            'address_line2' => $validated['address_line2'],
            'postal_code' => $validated['postal_code'],
            'locality' => $validated['locality'],
            'country' => $validated['country'],
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