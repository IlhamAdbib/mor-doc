<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demandereleve extends Model
{
    use HasFactory;

    //declaration du nom de la table
    protected $table = 'demande_releve';

    //declaration des colonnes
    protected $fillable = [
        'email',
        'apogee',
        'cin',
        'annee_universitaire',
        'status',
        'document',
        'motif',
    ];

    // Indiquer que les colonnes peuvent être nulles
    protected $nullable = [
        'document',
        'motif',
    ];

    protected $dates = ['created_at', 'updated_at'];
}
