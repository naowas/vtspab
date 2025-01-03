<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BtrcNotice extends Model
{
    protected $fillable = [
        'title',
        'description',
        'url',
        'user_id',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted(): void
    {
        static::created(static function ($notice) {
            $notice->user_id = auth()->id();
            $notice->save();
        });
    }


}
