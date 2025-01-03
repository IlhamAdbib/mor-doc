<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bureau extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'commune_id'];

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }
}
