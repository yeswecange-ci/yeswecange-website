<?php

namespace App\Models;

use App\Support\Concerns\HasLocalizedContent;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasLocalizedContent;

    protected $fillable = [
        'order_column',
        'value',
        'label_fr',
        'label_en',
    ];
}
