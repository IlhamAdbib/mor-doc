<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Citoyen extends Authenticatable
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
        'country',
        'password', // Add password field if it's part of the model
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

    // Add any additional relationships or methods needed
}
