<?php

namespace App\Filament\Member\Pages;

use Filament\Forms\Get;
use Filament\Pages\Page;
use App\Models\Company;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;

class CompanyInformation extends Page
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.member.pages.company-information';
    protected static ?string $title = 'Company Information';

    public ?array $data = [];

    public function mount(): void
    {
        $company = auth()->user()->company;
        $this->form->fill($company->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Basic Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->label('Company Name'),
                                TextInput::make('membership_number')
                                    ->unique(ignoreRecord: true),
                                TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->unique(ignoreRecord: true),
                                TextInput::make('phone')
                                    ->tel()
                                    ->unique(ignoreRecord: true),
                                TextInput::make('fax'),
                                Select::make('company_type')
                                    ->options([
                                        'private' => 'Private Limited',
                                        'public' => 'Public Limited',
                                        'partnership' => 'Partnership',
                                        'proprietorship' => 'Proprietorship',
                                    ]),
                                DatePicker::make('establishment_date'),
                                TextInput::make('website')->url(),
                            ]),

                        FileUpload::make('logo')
                            ->image()
                            ->label('Company Logo')
                            ->directory('company/logos'),

                        RichEditor::make('description')
                            ->columnSpanFull(),
                        RichEditor::make('success_story')
                            ->columnSpanFull(),
                    ]),

                Section::make('Address Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('address'),
                                TextInput::make('city'),
                                TextInput::make('district'),
                                TextInput::make('zip'),
                                TextInput::make('country')
                                    ->default('Bangladesh'),
                            ]),
                    ]),

                Section::make('Legal Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('bin_number')
                                    ->unique(ignoreRecord: true),
                                TextInput::make('tin_number')
                                    ->unique(ignoreRecord: true),
                                FileUpload::make('bin_file')
                                    ->directory('company/documents'),
                                FileUpload::make('tin_file')
                                    ->directory('company/documents'),
                                Toggle::make('has_trade_license')
                                    ->live()
                                    ->columnSpanFull(),

                                // Conditional fields that appear when has_trade_license is true
                                Section::make('Trade License Information')
                                    ->schema([
                                        TextInput::make('trade_license_info.number')
                                            ->label('Trade License Number'),
                                        DatePicker::make('trade_license_info.validity_date')
                                            ->label('Validity Date'),
                                        FileUpload::make('trade_license_info.file')
                                            ->label('Trade License File')
                                            ->directory('company/trade-licenses'),
                                    ])
                                    ->columns(3)
                                    ->columnSpanFull()
                                    ->visible(fn(Get $get): bool => $get('has_trade_license')),
                            ]),
                    ]),

                Section::make('Additional Websites')
                    ->schema([
                        Repeater::make('other_websites')
                            ->schema([
                                TextInput::make('url')
                                    ->required()
                                    ->url(),
                                TextInput::make('description'),
                            ])
                            ->columns(2),
                    ]),

                Section::make('Shareholders Information')
                    ->schema([
                        Repeater::make('shareholders')
                            ->schema([
                                TextInput::make('name')->required(),
                                TextInput::make('shares_percentage')
                                    ->numeric()
                                    ->required(),
                                TextInput::make('designation'),
                            ])
                            ->columns(3),
                    ]),

                Section::make('Board Members')
                    ->schema([
                        Repeater::make('board_members')
                            ->schema([
                                TextInput::make('name')->required(),
                                TextInput::make('designation')->required(),
                                TextInput::make('phone'),
                                TextInput::make('email')->email(),
                            ])
                            ->columns(2),
                    ]),

                Section::make('Company Head Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('company_head_name'),
                                TextInput::make('company_head_designation'),
                                TextInput::make('company_head_phone'),
                                TextInput::make('company_head_email')
                                    ->email(),
                                FileUpload::make('company_head_photo')
                                    ->directory('company/heads'),
                                TextInput::make('company_head_socials'),
                            ]),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $company = auth()->user()->company;
        $company->update($data);

        Notification::make()
            ->success()
            ->title('Company information updated successfully')
            ->send();
    }
}
