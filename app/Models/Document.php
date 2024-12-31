<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Document extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'document_type',
        'description',
        'user_id',
        'company_id',
        'other_data',
    ];

    protected $casts = [
        'other_data' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    protected static function booted(): void
    {
        static::created(static function ($document) {
            $document->company_id = auth()->user()->company->id;
            $document->user_id = auth()->id();
            $document->save();
        });
    }
}
