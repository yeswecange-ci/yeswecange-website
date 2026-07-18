<?php

namespace App\Models;

use App\Support\Concerns\HasLocalizedContent;
use Illuminate\Database\Eloquent\Model;

class LegalPage extends Model
{
    use HasLocalizedContent;

    public const MENTIONS = 'mentions-legales';
    public const TERMS = 'conditions-generales';

    protected $fillable = [
        'slug',
        'title_fr',
        'title_en',
        'body_fr',
        'body_en',
    ];
}
