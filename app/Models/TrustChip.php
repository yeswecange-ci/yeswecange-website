<?php

namespace App\Models;

use App\Support\Concerns\HasLocalizedContent;
use Illuminate\Database\Eloquent\Model;

class TrustChip extends Model
{
    use HasLocalizedContent;

    protected $fillable = [
        'order_column',
        'key',
        'label_fr',
        'label_en',
        'text_fr',
        'text_en',
        'is_default',
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];
}
