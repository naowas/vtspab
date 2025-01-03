<?php

namespace App\Filament\Admin\Resources\BtrcNoticeResource\Pages;

use App\Filament\Admin\Resources\BtrcNoticeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBtrcNotice extends EditRecord
{
    protected static string $resource = BtrcNoticeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
