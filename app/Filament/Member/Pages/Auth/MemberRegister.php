<?php

namespace App\Filament\Member\Pages\Auth;

use App\Models\User;
use App\Models\Company;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register as BaseRegister;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\FileUpload;
use Spatie\Permission\Models\Role;

class MemberRegister extends BaseRegister
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Personal Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->unique(User::class)
                                    ->maxLength(255),
                                TextInput::make('password')
                                    ->password()
                                    ->required()
                                    ->minLength(8)
                                    ->same('passwordConfirmation'),
                                TextInput::make('passwordConfirmation')
                                    ->password()
                                    ->required()
                                    ->minLength(8)
                                    ->label('Confirm Password'),
                            ]),
                    ]),

                Section::make('Company Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('company.name')
                                    ->required()
                                    ->maxLength(255)
                                    ->label('Company Name'),
                                TextInput::make('company.phone')
                                    ->tel()
                                    ->required()
                                    ->label('Company Phone'),
                                TextInput::make('company.address')
                                    ->required()
                                    ->maxLength(255)
                                    ->label('Company Address'),
                                FileUpload::make('company.logo')
                                    ->image()
                                    ->directory('company-logos')
                                    ->label('Company Logo'),
                            ]),
                    ]),
            ]);
    }

    protected function handleRegistration(array $data): User
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Assign the panel_user role
        $role = Role::where('name', 'panel_user')->first();
        if ($role) {
            $user->assignRole($role);
        }

        // Create associated company
        $user->company()->create([
            'name' => $data['company']['name'],
            'phone' => $data['company']['phone'],
            'address' => $data['company']['address'],
            'logo' => $data['company']['logo'] ?? null,
        ]);

        return $user;
    }
}
