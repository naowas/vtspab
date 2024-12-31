<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'success_story',
        'membership_number',
        'company_type',
        'email',
        'phone',
        'fax',
        'establishment_date',
        'logo',
        'website',
        'other_websites',
        'address',
        'city',
        'district',
        'division',
        'zip',
        'country',
        'status',
        'bin_number',
        'tin_number',
        'bin_file',
        'tin_file',
        'shareholders',
        'has_trade_license',
        'board_members',
        'company_head_name',
        'company_head_designation',
        'company_head_phone',
        'company_head_email',
        'company_head_photo',
        'company_head_socials',
        'trade_license_info'
    ];

    protected $casts = [
        'other_websites' => 'array',
        'shareholders' => 'array',
        'board_members' => 'array',
        'has_trade_license' => 'boolean',
        'trade_license_info' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function representatives(): HasMany
    {
        return $this->hasMany(CompanyRepresentative::class);
    }
}
