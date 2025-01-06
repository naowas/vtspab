<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PhotoAlbumResource\Pages;
use App\Filament\Admin\Resources\PhotoAlbumResource\RelationManagers;
use App\Models\PhotoAlbum;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PhotoAlbumResource extends Resource
{
    protected static ?string $model = PhotoAlbum::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('album_type')
                    ->required()
                    ->options([
                        'Events' => 'Events',
                        'Meetings' => 'Meetings',
                        'BTRC Meetings' => 'BTRC Meetings',
                        'Celebrations' => 'Celebrations',
                        'Other Activities' => 'Other Activities',
                    ]),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('photo_albums')
                    ->required()
                    ->collection('photo_albums')
                    ->multiple()
                    ->maxFiles(20)
                    ->acceptedFileTypes(['image/*'])
                    ->downloadable()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPhotoAlbums::route('/'),
            'create' => Pages\CreatePhotoAlbum::route('/create'),
            'edit' => Pages\EditPhotoAlbum::route('/{record}/edit'),
        ];
    }
}
