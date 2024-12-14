<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeathCertificateRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'citoyen_id',
        'relationship_to_deceased',
        'region_id',
        'city_id',
        'commune_id',
        'bureau_id',
        'death_date',
        'death_place',
        'death_cause',
        'document_number',
        'inscription_year',
        'family_book_number',
        'delivery_location',
        'delivery_address_line1',
        'delivery_address_line2',
        'delivery_postal_code',
        'delivery_locality',
        'delivery_country',
        'status'
    ];
}

