<?php

namespace App\Models;

use App\Support\Concerns\HasLocalizedContent;
use Illuminate\Database\Eloquent\Model;

class FaqItem extends Model
{
    use HasLocalizedContent;

    protected $fillable = [
        'order_column',
        'question_fr',
        'question_en',
        'answer_fr',
        'answer_en',
    ];
}
