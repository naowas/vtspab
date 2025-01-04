<?php

namespace App\Filament\Admin\Resources\CompanyResource\Pages;

use App\Filament\Admin\Resources\CompanyResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class CreateCompany extends CreateRecord
{
    protected static string $resource = CompanyResource::class;


    /**
     * @throws \Exception
     */
    protected function handleRecordCreation(array $data): Model
    {
        try {
            DB::beginTransaction();
            // Create user
            $user = User::create([
                'name' => $data['user']['name'],
                'email' => $data['user']['email'],
                'password' => $data['user']['password'],
            ]);

            $role = Role::where('name', 'panel_user')->first();
            if ($role) {
                $user->assignRole($role);
            }

            $user->company()->create([
                'name' => $data['name'],
                'membership_number' => $data['membership_number'],
                'company_type' => $data['company_type'],
                'establishment_date' => $data['establishment_date'],
                'website' => $data['website'] ?? null,
                'phone' => $data['phone'],
                'bin_number' => $data['bin_number'],
                'address' => $data['address'],
                'city' => $data['city'],
                'district' => $data['district'],
                'zip' => $data['zip'],
                'logo' => $data['logo'] ?? null,
                'trade_license' => $data['trade_license'] ?? null,
                'email' => $data['email'],
                'status' => 'approved',
            ]);

            $user->representatives()->create([
                'user_id' => $user->id,
                'company_id' => $user->company->id,
                'name' => $data['representative']['name'],
                'phone' => $data['representative']['phone'],
                'email' => $data['representative']['email'],
                'designation' => $data['representative']['designation'],
                'gender' => $data['representative']['gender'],
            ]);
            DB::commit();
            return $user->company;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
