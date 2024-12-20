<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamations extends Model
{
    use HasFactory;

    // Nom de la table
    protected $table = 'reclamations';

    // Colonnes modifiables dans la table
    protected $fillable = [
        'email',
        'cin',
        'description',
        'statut',
    ];

    // Pas besoin de $casts ici, sauf si vous avez un type personnalisé à caster.
}
