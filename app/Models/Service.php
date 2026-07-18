<?php

namespace App\Models;

use App\Support\Concerns\HasLocalizedContent;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasLocalizedContent;

    protected $fillable = [
        'order_column',
        'icon',
        'image',
        'title_fr',
        'title_en',
        'description_fr',
        'description_en',
        'tags_fr',
        'tags_en',
        'feature',
    ];

    protected $casts = [
        'tags_fr' => 'array',
        'tags_en' => 'array',
        'feature' => 'boolean',
    ];
}
