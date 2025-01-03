<?php

namespace App\Filament\Member\Resources;

use App\Filament\Member\Resources\CompanyRepresentativeResource\Pages;
use App\Models\CompanyRepresentative;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CompanyRepresentativeResource extends Resource
{
    protected static ?string $model = CompanyRepresentative::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Representatives';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\Hidden::make('company_id')
                            ->default(auth()->user()->company->id),
                        Forms\Components\Hidden::make('user_id')->default(auth()->id()),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('gender')
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                                'other' => 'Other',
                            ])
                            ->nullable(),
                        Forms\Components\TextInput::make('designation')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->nullable()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('photo')
                            ->image()
                            ->directory('representatives/photos')
                            ->nullable(),
                        Forms\Components\Textarea::make('address')
                            ->nullable()
                            ->columnSpanFull(),
                        Forms\Components\DatePicker::make('date_of_birth')
                            ->nullable(),
                    ])->columns(2),

                Forms\Components\Section::make('Social Media')
                    ->schema([
                        Forms\Components\Repeater::make('socials')
                            ->schema([
                                Forms\Components\Select::make('platform')
                                    ->options([
                                        'facebook' => 'Facebook',
                                        'twitter' => 'Twitter',
                                        'linkedin' => 'LinkedIn',
                                        'instagram' => 'Instagram',
                                    ])
                                    ->required(),
                                Forms\Components\TextInput::make('url')
                                    ->url()
                                    ->required(),
                            ])
                            ->columns(2)
                            ->nullable(),
                    ]),

                Forms\Components\Section::make('Documents')
                    ->schema([
                        Forms\Components\Group::make([
                            Forms\Components\TextInput::make('nid_number')
                                ->unique(ignoreRecord: true)
                                ->nullable(),
                            Forms\Components\FileUpload::make('nid_file')
                                ->directory('representatives/nid')
                                ->nullable(),
                        ])->columns(2),

                        Forms\Components\Group::make([
                            Forms\Components\TextInput::make('passport_number')
                                ->unique(ignoreRecord: true)
                                ->nullable(),
                            Forms\Components\FileUpload::make('passport_file')
                                ->directory('representatives/passport')
                                ->nullable(),
                        ])->columns(2),

                        Forms\Components\Group::make([
                            Forms\Components\TextInput::make('driving_license_number')
                                ->unique(ignoreRecord: true)
                                ->nullable(),
                            Forms\Components\FileUpload::make('driving_license_file')
                                ->directory('representatives/driving-license')
                                ->nullable(),
                        ])->columns(2),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('designation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('company')
                    ->relationship('company', 'name'),
                Tables\Filters\SelectFilter::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                        'other' => 'Other',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([

            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('company_id', auth()->user()->company->id)
            ->where('user_id', auth()->id());
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanyRepresentatives::route('/'),
            'create' => Pages\CreateCompanyRepresentative::route('/create'),
            'edit' => Pages\EditCompanyRepresentative::route('/{record}/edit'),
        ];
    }
}
