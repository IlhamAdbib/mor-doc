<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atsscolarite extends Model
{
    use HasFactory;
    //declaration de la table de l'attestation de reussite
    protected $table = 'ats_scolarite';

    //declaration de ses colonnes
    protected $fillable = [
        'email',
        'apogee',
        'cin',
        'nom',
        'date',
        'date_naissance',
        'cne',
        'filiere',
        'annee_univ',
        'status',
        'document',
        'motif',
    ];

    protected $dates = ['date','date_naissance'];
}
