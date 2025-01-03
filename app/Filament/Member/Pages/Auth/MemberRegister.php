<?php

namespace App\Filament\Member\Pages\Auth;

use App\Models\CompanyRepresentative;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Forms\Components\Component;
use Filament\Forms\Form;
use Filament\Http\Responses\Auth\RegistrationResponse;
use Filament\Pages\Auth\Register as BaseRegister;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\HtmlString;
use Spatie\Permission\Models\Role;

class MemberRegister extends BaseRegister
{
    protected ?string $maxWidth = '4xl';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Personal Info')
                        ->icon('heroicon-o-user')
                        ->schema([
                            $this->getNameFormComponent(),
                            $this->getEmailFormComponent(),
                            $this->getPasswordFormComponent(),
                            $this->getPasswordConfirmationFormComponent(),
                        ]),

                    Wizard\Step::make('Company Details')
                        ->icon('heroicon-o-building-office')
                        ->schema([
                            $this->getCompanyBasicFormComponent(),
                            $this->getCompanyContactFormComponent(),
                        ]),

                    Wizard\Step::make('Company Documents')
                        ->icon('heroicon-o-document-text')
                        ->schema([
                            $this->getCompanyDocsFormComponent(),
                            $this->getCompanyAddressFormComponent(),
                        ]),

                    Wizard\Step::make('Company Representative')
                        ->icon('heroicon-o-document-text')
                        ->schema([
                            $this->getCompanyRepresentativeFormComponent(),
                        ]),
                ])
                    ->submitAction(new HtmlString(Blade::render(<<<BLADE
                        <x-filament::button
                            type="submit"
                            size="lg"
                            wire:submit="register"
                        >
                            Register
                        </x-filament::button>
                    BLADE)))
                    ->persistStepInQueryString(),
            ]);
    }

    protected function getFormActions(): array
    {
        return [];
    }

    protected function getCompanyBasicFormComponent(): Component
    {
        return Grid::make(2)
            ->schema([
                TextInput::make('company.name')
                    ->label('Company Name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('company.membership_number')
                    ->label('Membership Number')
                    ->required(),

                Select::make('company.company_type')
                    ->label('Company Type')
                    ->required()
                    ->options([
                        'sole_proprietorship' => 'Sole Proprietorship',
                        'partnership' => 'Partnership',
                        'corporation' => 'Corporation',
                        'llc' => 'Limited Liability Company',
                        'other' => 'Other',
                    ]),

                DatePicker::make('company.establishment_date')
                    ->label('Establishment Date')
                    ->required()
                    ->maxDate(now()),
            ]);
    }

    protected function getCompanyRepresentativeFormComponent() : Component
    {
        return Grid::make(2)
            ->schema([
                TextInput::make('representative_name')
                    ->label('Representative Name')
                    ->required()
                    ->maxLength(255),
                Select::make('representative_gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ])
                    ->required(),
                TextInput::make('representative_designation')
                    ->required(),

                TextInput::make('representative_phone')
                    ->required(),
                TextInput::make('representative_email')
                    ->required()
            ]);
    }

    protected function getCompanyContactFormComponent(): Component
    {
        return Grid::make(2)
            ->schema([
                TextInput::make('company.website')
                    ->label('Website')
                    ->url()
                    ->prefix('https://')
                    ->placeholder('example.com'),

                TextInput::make('company.phone')
                    ->label('Phone Number')
                    ->tel()
                    ->required(),

                TextInput::make('company.bin_number')
                    ->label('BIN Number')
                    ->required(),

                TextInput::make('company.tin_number')
                    ->label('TIN Number')
                    ->required(),
            ]);
    }

    protected function getCompanyDocsFormComponent(): Component
    {
        return Grid::make(1)
            ->schema([
                FileUpload::make('company.logo')
                    ->image()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->directory('company-logos')
                    ->label('Company Logo'),

                FileUpload::make('company.trade_license')
                    ->label('Trade License')
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory('trade-licenses'),
            ]);
    }

    protected function getCompanyAddressFormComponent(): Component
    {
        return Grid::make(2)
            ->schema([
                TextInput::make('company.address')
                    ->label('Street Address')
                    ->required()
                    ->columnSpan(2),

                TextInput::make('company.city')
                    ->label('City')
                    ->required(),

                TextInput::make('company.district')
                    ->label('District')
                    ->required(),

                TextInput::make('company.zip')
                    ->label('ZIP Code')
                    ->required(),
            ]);
    }

    public function register(): RegistrationResponse
    {
        $data = $this->form->getState();

        \DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);

            $role = Role::where('name', 'panel_user')->first();
            if ($role) {
                $user->assignRole($role);
            }

            $user->company()->create([
                'name' => $data['company']['name'],
                'membership_number' => $data['company']['membership_number'],
                'company_type' => $data['company']['company_type'],
                'establishment_date' => $data['company']['establishment_date'],
                'website' => $data['company']['website'] ?? null,
                'phone' => $data['company']['phone'],
                'bin_number' => $data['company']['bin_number'],
                'tin_number' => $data['company']['tin_number'],
                'address' => $data['company']['address'],
                'city' => $data['company']['city'],
                'district' => $data['company']['district'],
                'zip' => $data['company']['zip'],
                'logo' => $data['company']['logo'] ?? null,
                'trade_license' => $data['company']['trade_license'] ?? null,
                'email' => $user->email,
            ]);

            $user->representatives()->create([
                'user_id' => $user->id,
                'company_id' => $user->company->id,
                'name' => $data['representative_name'],
                'phone' => $data['representative_phone'],
                'email' => $data['representative_email'],
                'designation' => $data['representative_designation'],
                'gender' => $data['representative_gender'],
                ]);
            \DB::commit();


            Filament::auth()->login($user);
        }
        catch (\Exception $e) {
            \DB::rollBack();
            $this->addError('email', $e->getMessage());
        }
        return app(RegistrationResponse::class);



    }
}
