<?php

namespace App\Filament\Admin\Resources\FoundingMemberResource\Pages;

use App\Filament\Admin\Resources\FoundingMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFoundingMember extends EditRecord
{
    protected static string $resource = FoundingMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
