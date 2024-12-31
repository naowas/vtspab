<?php

namespace App\Filament\Member\Widgets;

use Filament\Widgets\Widget;

class TicketOverview extends Widget
{
    protected static string $view = 'filament.member.widgets.ticket';

    public function getViewData(): array
    {
        $tickets = auth()->user()->tickets;
        $openTickets = $tickets->where('status', 'Open')->count();
        $closedTickets = $tickets->where('status', 'Closed')->count();

        return [
            'tickets' => $tickets,
            'openTickets' => $openTickets,
            'closedTickets' => $closedTickets,
        ];
    }
}
