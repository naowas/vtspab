<?php

namespace App\Filament\Member\Resources\PaymentResource\Pages;

use App\Filament\Member\Resources\PaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePayment extends CreateRecord
{
    protected static string $resource = PaymentResource::class;
}
