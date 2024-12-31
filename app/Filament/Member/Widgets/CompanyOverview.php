<?php

namespace App\Filament\Member\Widgets;

use Filament\Widgets\Widget;

class CompanyOverview extends Widget
{
    protected static string $view = 'filament.member.widgets.company-overview';

    public function getViewData(): array
    {
        $company = auth()->user()->company;

        return [
            'company' => $company,
            'companyInfo' => [
                [
                    'label' => 'Company Name',
                    'value' => $company->name,
                    'icon' => 'heroicon-o-building-office-2',
                ],
                [
                    'label' => 'Membership Number',
                    'value' => $company->membership_number ?? 'Not Assigned',
                    'icon' => 'heroicon-o-identification',
                ],
                [
                    'label' => 'Email',
                    'value' => $company->email,
                    'icon' => 'heroicon-o-envelope',
                ],
                [
                    'label' => 'Phone',
                    'value' => $company->phone ?? 'Not provided',
                    'icon' => 'heroicon-o-phone',
                ],
                [
                    'label' => 'Company Type',
                    'value' => $company->company_type ?? 'Not specified',
                    'icon' => 'heroicon-o-building-office',
                ],
//                [
//                    'label' => 'Status',
//                    'value' => ucfirst($company->status),
//                    'icon' => 'heroicon-o-check-circle',
//                    'color' => $company->status === 'active' ? 'success' : 'warning',
//                ],
            ],
        ];
    }
}
