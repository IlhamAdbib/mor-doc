<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamations extends Model
{
    use HasFactory;

    //declaration du nom de la table
    protected $table = 'reclamations'; 

    //declaration des colonnes de la table

    protected $fillable = [
        'name',
        'email',
        'apogee',
        'cin',
        'description',
    ];

    protected $casts = [
        'apogee' => 'integer',
    ];
}
