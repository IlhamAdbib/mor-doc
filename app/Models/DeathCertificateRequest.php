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

    public function citoyen()
    {
        return $this->belongsTo(Citoyen::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function bureau()
    {
        return $this->belongsTo(Bureau::class);
    }

    public function documentAttachments()
    {
        return $this->hasMany(DocumentAttachment::class, 'request_id')
            ->where('request_type', 'death_certificate');
    }
}

