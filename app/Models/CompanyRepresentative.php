<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyRepresentative extends Model
{
    protected $fillable = [
        'company_id',
        'user_id',
        'name',
        'gender',
        'designation',
        'phone',
        'email',
        'photo',
        'address',
        'date_of_birth',
        'socials',
        'nid_number',
        'nid_file',
        'passport_number',
        'passport_file',
        'driving_license_number',
        'driving_license_file',
    ];

    protected $casts = [
        'socials' => 'array',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted(): void
    {
        static::created(static function ($representative) {
            $representative->company_id = auth()->user()->company->id;
            $representative->user_id = auth()->id();
            $representative->save();
        });
    }
}
