<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Citoyen extends Model
{
    use HasFactory;

    protected $table = 'citoyens';

    protected $fillable = [
        'first_name_ar',
        'last_name_ar',
        'cnie_number',
        'phone_country_code',
        'phone_number',
        'email',
        'address_line1',
        'address_line2',
        'postal_code',
        'city',
        'country'
    ];

    // Relationships for different document requests
    public function deathCertificateRequests()
    {
        return $this->hasMany(DeathCertificateRequest::class, 'citoyen_id');
    }

    public function birthCertificateRequests()
    {
        return $this->hasMany(BirthCertificateRequest::class, 'citoyen_id');
    }

    // Add more d
}
