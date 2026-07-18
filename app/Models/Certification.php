<?php

namespace App\Models;

use App\Support\Concerns\HasLocalizedContent;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasLocalizedContent;

    protected $fillable = [
        'order_column',
        'name_fr',
        'name_en',
        'issuer_fr',
        'issuer_en',
        'logo',
    ];
}
