<?php

namespace App\Models;

use App\Support\Concerns\HasLocalizedContent;
use Illuminate\Database\Eloquent\Model;

class CompanyValue extends Model
{
    use HasLocalizedContent;

    protected $fillable = [
        'order_column',
        'icon_key',
        'title_fr',
        'title_en',
        'description_fr',
        'description_en',
    ];
}
