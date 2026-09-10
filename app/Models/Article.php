<?php

namespace App\Models;

use App\Support\Concerns\HasLocalizedContent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasLocalizedContent;

    protected $fillable = [
        'slug',
        'title_fr',
        'title_en',
        'excerpt_fr',
        'excerpt_en',
        'content_fr',
        'content_en',
        'cover_image',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->where(function (Builder $q) {
                $q->whereNull('published_at')->orWhere('published_at', '<=', now());
            });
    }
}
