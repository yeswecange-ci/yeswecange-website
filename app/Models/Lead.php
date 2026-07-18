<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    public const TYPE_CONTACT = 'contact';

    public const TYPE_QUOTE = 'quote';

    public const STATUS_NEW = 'new';

    public const STATUS_IN_PROGRESS = 'in_progress';

    public const STATUS_WON = 'won';

    public const STATUS_LOST = 'lost';

    public const STATUS_ARCHIVED = 'archived';

    protected $fillable = [
        'type',
        'name',
        'email',
        'phone',
        'company',
        'subject',
        'message',
        'budget',
        'appointment_at',
        'services',
        'status',
        'locale',
        'ip_address',
        'user_agent',
        'read_at',
    ];

    protected $casts = [
        'services' => 'array',
        'appointment_at' => 'datetime',
        'read_at' => 'datetime',
    ];

    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    public function scopeQuotes($query)
    {
        return $query->where('type', self::TYPE_QUOTE);
    }
}
