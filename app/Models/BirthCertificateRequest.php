<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BirthCertificateRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'citoyen_id',
        'region_id',
        'city_id',
        'commune_id',
        'bureau_id',
        'birth_extract_doc_num',
        'birth_complete_doc_num',
        'marriage_interest',
        'doc_language',
        'first_name_ar',
        'last_name_ar',
        'first_name_fr',
        'last_name_fr',
        'mother_firstname',
        'mother_lastname',
        'father_firstname',
        'day_birthdate',
        'month_birthdate',
        'year_birthdate',
        'gender',
        'doc_num',
        'subscription_year',
        'fullname',
        'email',
        'phone_code',
        'phone_number',
        'delivery_place',
        'first_address',
        'second_address',
        'postal_code',
        'city',
        'country'
    ];

}