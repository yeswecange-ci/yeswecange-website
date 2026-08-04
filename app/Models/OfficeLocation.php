<?php

namespace App\Models;

use App\Support\Concerns\HasLocalizedContent;
use Illuminate\Database\Eloquent\Model;

class OfficeLocation extends Model
{
    use HasLocalizedContent;

    protected $fillable = [
        'order_column',
        'slug',
        'eyebrow',
        'title_fr',
        'title_en',
        'address',
        'phone',
        'cta_label_fr',
        'cta_label_en',
        'is_dark',
    ];

    protected $casts = [
        'is_dark' => 'boolean',
    ];
}
