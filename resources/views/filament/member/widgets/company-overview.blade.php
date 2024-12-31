<x-filament-widgets::widget>
    <x-filament::section>
        {{-- Basic Info Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($companyInfo as $info)
                <div class="p-4 bg-white rounded-lg border">
                    <div class="flex items-center gap-3">
                        <div class="shrink-0">
                            @svg($info['icon'], 'w-5 h-5 text-gray-400')
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm text-gray-500">{{ $info['label'] }}</p>
                            <p @class([
                                'text-sm font-medium break-words',
                                'text-success-600' => ($info['color'] ?? '') === 'success',
                                'text-warning-600' => ($info['color'] ?? '') === 'warning',
                                'text-gray-900' => !isset($info['color']),
                            ])>
                                {{ $info['value'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Website Card --}}
            @if($company->website)
                <div class="p-4 bg-white rounded-lg border">
                    <div class="flex items-center gap-3">
                        <div class="shrink-0">
                            @svg('heroicon-o-globe-alt', 'w-5 h-5 text-gray-400')
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm text-gray-500">Website</p>
                            <a href="{{ $company->website }}"
                               target="_blank"
                               class="text-sm font-medium text-primary-600 hover:underline break-all">
                                {{ $company->website }}
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Establishment Date Card --}}
            @if($company->establishment_date)
                <div class="p-4 bg-white rounded-lg border">
                    <div class="flex items-center gap-3">
                        <div class="shrink-0">
                            @svg('heroicon-o-calendar', 'w-5 h-5 text-gray-400')
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm text-gray-500">Established</p>
                            <p class="text-sm font-medium text-gray-900">
                                {{ \Carbon\Carbon::parse($company->establishment_date)->format('F j, Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

                {{-- Address Card --}}
                @if($company->address)
                    <div class="p-4 bg-white rounded-lg border">
                        <div class="flex items-center gap-3">
                            <div class="shrink-0">
                                @svg('heroicon-o-map-pin', 'w-5 h-5 text-gray-400')
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm text-gray-500">Address</p>
                                <div class="text-sm font-medium text-gray-900 break-words">
                                    {{ $company->address }}<br>
                                    {{ collect([$company->city, $company->district, $company->zip])->filter()->join(', ') }}<br>
                                    {{ $company->country }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
