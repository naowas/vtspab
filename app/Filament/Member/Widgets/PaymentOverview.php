<?php

namespace App\Filament\Member\Widgets;

use Filament\Widgets\Widget;

class PaymentOverview extends Widget
{
    protected static string $view = 'filament.member.widgets.payment';


    public function getViewData(): array
    {
        $payments = auth()->user()->payments;



        return [
            'totalAmount' => $payments->sum('payment_amount'),
            'totalPayments' => $payments->count(),
            'recentPayments' => $payments->take(5),
        ];
    }
}
