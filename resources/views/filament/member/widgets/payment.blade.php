<x-filament-widgets::widget>
    <x-filament::section>
        {{-- Payment Overview --}}
        <div class="bg-white rounded-lg shadow-md">
            <h2 class="text-md font-semibold mb-4">Payment Overview</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Total Amount --}}
                <div class="p-4 bg-white rounded-lg border">
                    <div class="flex items-center gap-3">
                        <div class="shrink-0">
                            @svg('heroicon-o-currency-dollar', 'w-5 h-5 text-gray-400')
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm text-gray-500">Total Amount</p>
                            <p class="text-lg font-medium text-primary-600">${{ number_format($totalAmount, 2) }}</p>
                        </div>
                    </div>
                </div>

                {{-- Total Payments --}}
                <div class="p-4 bg-white rounded-lg border">
                    <div class="flex items-center gap-3">
                        <div class="shrink-0">
                            @svg('heroicon-o-credit-card', 'w-5 h-5 text-gray-400')
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm text-gray-500">Total Payments</p>
                            <p class="text-lg font-medium text-success-600">{{ $totalPayments }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Recent Payments --}}
            <div class="mt-6">
                <h3 class="text-md font-semibold mb-2">Recent Payments</h3>
                <ul class="space-y-3">
                    @forelse ($recentPayments as $payment)
                        <li class="p-4 bg-gray-50 rounded-lg border">
                            <div class="flex justify-between">
                                <p class="text-sm text-gray-500">{{ $payment->created_at->format('F j, Y') }}</p>
                                <p class="text-sm font-medium text-gray-900">${{ number_format($payment->payment_amount, 2) }}</p>
                            </div>
                            <p class="text-sm text-gray-400">Transaction ID: {{ $payment->payment_reference }}</p>
                        </li>
                    @empty
                        <p class="text-sm text-gray-500">No recent payments found.</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
