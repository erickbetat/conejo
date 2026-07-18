<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedRace extends Model
{
    use HasFactory;

    protected $fillable = [
        'badge',
        'category',
        'title',
        'location',
        'description',
        'stat1_label',
        'stat1_value',
        'stat2_label',
        'stat2_value',
        'video_url',
        'video_path',
        'image_path',
    ];
}
