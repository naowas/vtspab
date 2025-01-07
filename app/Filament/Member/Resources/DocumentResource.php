<?php

namespace App\Filament\Member\Resources;

use App\Filament\Member\Resources\DocumentResource\Pages;
use App\Filament\Member\Resources\DocumentResource\RelationManagers;
use App\Models\Document;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Documents Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->maxLength(255),
                Forms\Components\Select::make('document_type')
                    ->required()
                    ->options([
                        'invoice' => 'Invoice',
                        'receipt' => 'Receipt',
                        'contract' => 'Contract',
                        'report' => 'Report',
                        'quotation' => 'Quotation',
                        'purchase_order' => 'Purchase Order',
                        'delivery_note' => 'Delivery Note',
                        'tax_document' => 'Tax Document',
                        'business_license' => 'Business License',
                        'financial_statement' => 'Financial Statement',
                    ]),
                Forms\Components\Textarea::make('description')
                    ->maxLength(255),
                Forms\Components\SpatieMediaLibraryFileUpload::make('document')
                    ->collection('documents')
                    ->multiple(false)
                    ->required()
                    ->maxSize(1024), // 10MB max
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('document_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label(''),
                Tables\Actions\EditAction::make()->label(''),
                Tables\Actions\DeleteAction::make()->label(''),
                Tables\Actions\Action::make('download')->label('')
                    ->icon('heroicon-o-arrow-down-on-square-stack')
                    ->url(fn (Document $record) => $record->getFirstMediaUrl('documents'))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        // Only show documents belonging to the current user
        return parent::getEloquentQuery()
            ->where('user_id', auth()->id());
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
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        $authUser = auth()->user();
        return $authUser->company()->first()->status === 'approved';
    }
}
