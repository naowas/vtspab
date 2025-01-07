<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CompanyResource\Pages;
use App\Filament\Admin\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Devfaysal\BangladeshGeocode\Models\District;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('User Information')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('user.name')
                                    ->label('User Name')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('user.email')
                                    ->label('Email')
                                    ->email()
                                    ->required(),

                                Forms\Components\TextInput::make('user.password')
                                    ->label('Password')
                                    ->password()
                                    ->required()
                                    ->minLength(8),
                            ]),
                    ])->visible(fn ($livewire) => $livewire instanceof Pages\CreateCompany)
                ,

                Forms\Components\Section::make('Company Details')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Company Name')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('membership_number')
                                    ->label('Membership Number')
                                    ->required(),

                                Forms\Components\Select::make('company_type')
                                    ->label('Company Type')
                                    ->required()
                                    ->options([
                                        'sole_proprietorship' => 'Sole Proprietorship',
                                        'partnership' => 'Partnership',
                                        'corporation' => 'Corporation',
                                        'llc' => 'Limited Liability Company',
                                        'ltd' => 'Limited Company',
                                        'other' => 'Other',
                                    ]),

                                Forms\Components\DatePicker::make('establishment_date')
                                    ->label('Establishment Date')
                                    ->required()
                                    ->maxDate(now()),

                                Forms\Components\TextInput::make('website')
                                    ->label('Website')
                                    ->url()
                                    ->prefix('https://')
                                    ->placeholder('example.com'),

                                Forms\Components\TextInput::make('phone')
                                    ->label('Phone Number')
                                    ->tel()
                                    ->required(),

                                Forms\Components\TextInput::make('bin_number')
                                    ->label('BIN Number'),
                            ]),
                    ]),

                Forms\Components\Section::make('Company Documents')
                    ->schema([
                        Forms\Components\FileUpload::make('logo')
                            ->image()
                            ->required()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->directory('company-logos')
                            ->label('Company Logo'),

                        Forms\Components\FileUpload::make('trade_license')
                            ->label('Trade License')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('trade-licenses'),
                    ]),

                Forms\Components\Section::make('Company Address')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('address')
                                    ->label('Street Address')
                                    ->required()
                                    ->columnSpan(2),

                                Forms\Components\TextInput::make('city')
                                    ->label('City')
                                    ->required(),

                                Forms\Components\Select::make('district')
                                    ->label('District')
                                    ->options(District::query()->pluck('name', 'name')->toArray())
                                    ->required(),

                                Forms\Components\TextInput::make('zip')
                                    ->label('ZIP Code')
                                    ->required(),
                            ]),
                    ]),

                Forms\Components\Section::make('Company Representative')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('representative.name')
                                    ->label('Representative Name')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\Select::make('representative.gender')
                                    ->label('Gender')
                                    ->options([
                                        'male' => 'Male',
                                        'female' => 'Female',
                                    ])
                                    ->required(),

                                Forms\Components\TextInput::make('representative.designation')
                                    ->label('Designation')
                                    ->required(),

                                Forms\Components\TextInput::make('representative.phone')
                                    ->label('Phone')
                                    ->required(),

                                Forms\Components\TextInput::make('representative.email')
                                    ->label('Email')
                                    ->email()
                                    ->required(),
                            ]),
                    ])->visible(fn ($livewire) => $livewire instanceof Pages\CreateCompany),

            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('membership_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('establishment_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('website')
                    ->searchable(),
                Tables\Columns\TextColumn::make('district')
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
                Action::make('changeStatus')
                    ->label('Change Status')
                    ->icon('heroicon-o-check-circle')
                    ->action(function (Company $record, array $data): void {
                        $record->status = $data['status'];
                        $record->save();
                    })
                    ->form([
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'approved' => 'Approved',
                                'declined' => 'Declined',
                            ])
                            ->required(),
                    ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }

}
