<?php

namespace App\Models;

use App\Support\Concerns\HasLocalizedContent;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasLocalizedContent;

    protected $fillable = [
        'order_column',
        'quote_fr',
        'quote_en',
        'author_name',
        'role_fr',
        'role_en',
        'initials',
    ];
}
