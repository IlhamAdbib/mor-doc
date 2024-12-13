<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id',
        'request_type',
        'document_type',
        'file_path',
        'file_name',
        'mime_type'
    ];

    public function request()
    {
        return $this->morphTo('request', 'request_type', 'request_id');
    }
}
