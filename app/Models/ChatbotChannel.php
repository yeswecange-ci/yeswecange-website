<?php

namespace App\Models;

use App\Support\Concerns\HasLocalizedContent;
use Illuminate\Database\Eloquent\Model;

class ChatbotChannel extends Model
{
    use HasLocalizedContent;

    protected $fillable = [
        'order_column',
        'label_fr',
        'label_en',
    ];
}
