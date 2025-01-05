<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FoundingMemberResource\Pages;
use App\Filament\Admin\Resources\FoundingMemberResource\RelationManagers;
use App\Models\FoundingMember;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FoundingMemberResource extends Resource
{
    protected static ?string $model = FoundingMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Member Name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('company')
                            ->label('Company Name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('designation')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Select::make('member_type')
                            ->required()
                            ->options([
                                'Founder Member' => 'Founder Member',
                                'General Member' => 'General Member',
                                'Executive Member' => 'Executive Member',
                                'Life Time Member' => 'Life Time Member',
                                'Sub Committee Member' => 'Sub Committee Member',
                            ]),

                        SpatieMediaLibraryFileUpload::make('image')
                            ->collection('founding-member-images')
                            ->responsiveImages(),
                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\TextInput::make('linkedin')
                                    ->url()
                                    ->nullable()
                                    ->prefix('https://'),

                                Forms\Components\TextInput::make('twitter')
                                    ->url()
                                    ->nullable()
                                    ->prefix('https://'),

                                Forms\Components\TextInput::make('facebook')
                                    ->url()
                                    ->nullable()
                                    ->prefix('https://'),

                                Forms\Components\TextInput::make('instagram')
                                    ->url()
                                    ->nullable()
                                    ->prefix('https://'),

                                Forms\Components\TextInput::make('github')
                                    ->url()
                                    ->nullable()
                                    ->prefix('https://'),
                            ])
                            ->columns(2),

                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->default(true),

                                Forms\Components\DatePicker::make('member_since')
                                    ->nullable(),

                                Forms\Components\TextInput::make('sorting_order')
                                    ->numeric()
                                    ->nullable(),
                            ])
                            ->columns(3),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('image')
                    ->collection('founding-member-images')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('designation')
                    ->searchable(),

                Tables\Columns\TextColumn::make('member_type')
                    ->badge()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('member_since')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('sorting_order')
                    ->sortable(),
            ])
            ->defaultSort('sorting_order')
            ->filters([
//                Tables\Filters\SelectFilter::make('member_type')
//                    ->options([
//                        'staff' => 'Staff',
//                        'associate' => 'Associate',
//                        'contributor' => 'Contributor',
//                    ]),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListFoundingMembers::route('/'),
            'create' => Pages\CreateFoundingMember::route('/create'),
            'edit' => Pages\EditFoundingMember::route('/{record}/edit'),
        ];
    }
}
