<?php

namespace App\Filament\Admin\Resources\PhotoAlbumResource\Pages;

use App\Filament\Admin\Resources\PhotoAlbumResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPhotoAlbum extends EditRecord
{
    protected static string $resource = PhotoAlbumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
