<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'filename',
        'path',
        'mime_type',
        'size',
        'title',
        'alt',
        'created_by',
        'width',
        'height',
    ];
}

