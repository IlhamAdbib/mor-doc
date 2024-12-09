<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    //declaration de la table de l'attestation de reussite
    protected $table = 'etudiants';

    //declaration de ses colonnes
    protected $fillable = [
        'Appogé',
        'Prenom',
        'Nom',
        'CIN',
        'CNE',
        'Niveau',
        'filiere',
        'email',
        'semestreAct'
    ];

    //protected $dates = ['date','date_naissance'];
}
