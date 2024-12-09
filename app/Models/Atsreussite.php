<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atsreussite extends Model
{
    use HasFactory;

    //declaration de la table de l'attestation de reussite
    protected $table = 'ats_reussite';

    //declaration de ses colonnes
    protected $fillable = [
        'email',
        'apogee',
        'cin',
        'nom',
        'date',
        'status',
        'document',
        'motif',
    ];

    protected $dates = ['date'];
}
