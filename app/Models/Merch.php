<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merch extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'image_path',
        'is_active',
        'sort_order',
    ];
}
