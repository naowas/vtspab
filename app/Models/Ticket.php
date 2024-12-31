<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    public static array $statuses = [
        'Open' => 'Open',
        'In-Progress' => 'In Progress',
        'Resolved' => 'Resolved',
    ];

    public static array $priorities = [
        'Low' => 'Low',
        'Medium' => 'Medium',
        'High' => 'High',
    ];

    protected $fillable = [
        'user_id',
        'subject',
        'description',
        'status',
        'priority',
        'attachments',
    ];


    protected $casts = [
        'attachments' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(TicketComment::class);
    }

    protected static function booted(): void
    {
        static::creating(static function ($ticket) {
            $ticket->user_id = auth()->id();
        });
    }

}
