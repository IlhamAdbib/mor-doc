<?php

namespace App\Http\Controllers;

use App\Models\BirthCertificateRequest;
use App\Models\Bureau;
use App\Models\City;
use App\Models\Commune;
use App\Models\Region;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

class DemanderController extends Controller
{

    public function demande()
    {
        $regions = Region::all();
        return view('demande', compact('regions'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'region' => 'required',
            'city' => 'required',
            'commune' => 'required',
            'bureau' => 'required',
            'birth_extract' => 'required',
            'integral_copy' => 'required',
            'marriage_type' => 'required',
            'document_language' => 'required',
            'first_name_ar' => 'required',
            'last_name_ar' => 'required',
            'first_name_latin' => 'required',
            'last_name_latin' => 'required',
            'mother_first_name' => 'required',
            'mother_last_name' => 'required',
            'father_first_name' => 'required',
            'birth_day' => 'required',
            'birth_month' => 'required',
            'birth_year' => 'required',
            'gender' => 'required',
            'act_number' => 'required',
            'transcription_year' => 'required',
            'nom_complet' => 'required',
            'recipient_email' => 'required',
            'phone_country_code' => 'required',
            'recipient_phone' => 'required',
            'delivery_location' => 'required',
            'address_line1' => 'required',
            'address_line2' => 'required',
            'postal_code' => 'required',
            'locality' => 'required',
            'country' => 'required',
        ]);

        $regionName = DB::table('regions')->where('id', $validated['region'])->value('name');

        DB::table('birth_certificate_requests')->insert([
            'region_id' => $regionName, 
            'city_id' => $validated['city'],
            'commune_id' => $validated['commune'],
            'bureau_id' => $validated['bureau'],
            'birth_extract_doc_num' => $validated['birth_extract'],
            'birth_complete_doc_num' => $validated['integral_copy'],
            'marriage_interest' => $validated['marriage_type'],
            'doc_language' => $validated['document_language'],
            'first_name_ar' => $validated['first_name_ar'],
            'last_name_ar' => $validated['last_name_ar'],
            'first_name_fr' => $validated['first_name_latin'],
            'last_name_fr' => $validated['last_name_latin'],
            'mother_firstname' => $validated['mother_first_name'],
            'mother_lastname' => $validated['mother_last_name'],
            'father_firstname' => $validated['father_first_name'],
            'day_birthdate' => $validated['birth_day'],
            'month_birthdate' => $validated['birth_month'],
            'year_birthdate' => $validated['birth_year'],
            'gender' => $validated['gender'],
            'doc_num' => $validated['act_number'],
            'subscription_year' => $validated['transcription_year'],
            'fullname' => $validated['nom_complet'],
            'email' =>  $validated['recipient_email'],
            'phone_code' =>  $validated['phone_country_code'],
            'phone_number' =>  $validated['recipient_phone'],
            'delivery_place' =>  $validated['delivery_location'],
            'first_address' =>  $validated['address_line1'],
            'second_address' =>  $validated['address_line2'],
            'postal_code' =>  $validated['postal_code'],
            'city' =>  $validated['locality'],
            'country' =>  $validated['country'],
        ]);

        return back()->with('success', 'تم تسجيل البيانات بنجاح!');
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

