<?php

namespace App\Filament\Member\Widgets;

use App\Models\Notice;
use Filament\Widgets\Widget;

class NoticeOverview extends Widget
{
    protected static string $view = 'filament.member.widgets.notice-overview';

    public function getViewData(): array
    {

        return [
            'notices' => Notice::with('creator')->latest()->limit(5)->get(),
        ];
    }
}
