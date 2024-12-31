<x-filament-widgets::widget>
    <x-filament::section>
        {{-- Ticket Overview --}}
        <div class=" bg-white rounded-lg shadow-md">
            <h2 class="text-md font-semibold mb-4">Ticket Overview</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Open Tickets --}}
                <div class="p-4 bg-white rounded-lg border">
                    <div class="flex items-center gap-3">
                        <div class="shrink-0">
                            @svg('heroicon-o-ticket', 'w-5 h-5 text-gray-400')
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm text-gray-500">Open Tickets</p>
                            <p class="text-lg font-medium text-primary-600">{{ $openTickets }}</p>
                        </div>
                    </div>
                </div>

                {{-- Closed Tickets --}}
                <div class="p-4 bg-white rounded-lg border">
                    <div class="flex items-center gap-3">
                        <div class="shrink-0">
                            @svg('heroicon-o-check-circle', 'w-5 h-5 text-gray-400')
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm text-gray-500">Closed Tickets</p>
                            <p class="text-lg font-medium text-success-600">{{ $closedTickets }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
