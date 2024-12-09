<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    //declaration de la table de l'attestation de reussite
    protected $table = 'demandes';

    //declaration de ses colonnes
    protected $fillable = [
        'Appogé',
        'Prenom',
        'Nom',
        'Type',
        'Semestre',
        'Email',
        'CIN',
        'CNE',
        'image',
        'nomEntreprise',
        'representant',
        'adressMail',
        'tele',
        'adressReel',
        'periode',
        'encadrantEntreprise',
        'encadrantEcole',
        'themeDeStage',
        'Etat',
        'Validation',
        'Motif',
        'filename'
    ];

    //protected $dates = ['date','date_naissance'];
}
