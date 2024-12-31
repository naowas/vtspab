<?php

namespace App\Filament\Member\Resources\CompanyRepresentativeResource\Pages;

use App\Filament\Member\Resources\CompanyRepresentativeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompanyRepresentatives extends ListRecords
{
    protected static string $resource = CompanyRepresentativeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
