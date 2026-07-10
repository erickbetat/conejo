<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biography extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image_path',
        'is_active',
        'photo_1',
        'desc_1',
        'photo_2',
        'desc_2',
        'photo_3',
        'desc_3',
    ];
}
