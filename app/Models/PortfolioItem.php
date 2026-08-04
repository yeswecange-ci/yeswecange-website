<?php

namespace App\Models;

use App\Support\Concerns\HasLocalizedContent;
use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    use HasLocalizedContent;

    public const CATEGORIES = ['chatbots', 'communication', 'social', 'branding', 'publicite'];

    public const SIZES = ['normal', 'wide', 'tall'];

    protected $fillable = [
        'order_column',
        'title_fr',
        'title_en',
        'description_fr',
        'description_en',
        'category',
        'image',
        'size',
    ];
}
