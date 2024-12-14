<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidenceCertificateRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'cin',
        'birthdate',
        'birthplace',
        'profession',
        'residence_type',
        'full_address',
        'postal_code',
        'city',
        'proof_doc',
        'proof_doc_path',
        'cin_path',
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