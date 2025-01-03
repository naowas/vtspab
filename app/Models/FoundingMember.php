<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class FoundingMember extends Model Implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable = [
        'name',
        'company',
        'designation',
        'member_type',
        'image',
        'linkedin',
        'twitter',
        'facebook',
        'instagram',
        'github',
        'sorting_order',
        'is_active',
        'member_since',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'member_since' => 'date',
        'sorting_order' => 'integer',
    ];
}
