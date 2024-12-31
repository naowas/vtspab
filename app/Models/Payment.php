<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'company_id',
        'payment_purpose',
        'payment_reference',
        'payment_method',
        'payment_status',
        'payment_amount',
        'payment_description',
        'payment_receipt',
        'payment_date',
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
        static::created(static function ($payment) {
            $payment->company_id = auth()->user()->company->id;
            $payment->user_id = auth()->id();
            $payment->save();
        });
    }
}
