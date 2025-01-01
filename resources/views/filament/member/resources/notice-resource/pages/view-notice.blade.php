<x-filament-panels::page>
    <div class="space-y-6">
        {{-- Ticket Details --}}
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <div class="p-6">
                <div class="flex justify-between items-start">
                    <h2 class="text-2xl font-bold">{{ $this->record->title }}</h2>
                </div>

                <div class="mt-4 text-sm text-gray-500">
                    Opened by {{ $this->record->creator->name }} · {{ $this->record->created_at->diffForHumans() }}
                </div>

                <div class="mt-6 prose max-w-none">
                    {!! $this->record->content !!}
                </div>

                @if($this->record->getMedia('notice_attachments')->isNotEmpty())
                    <div class="mt-6">
                        <h3 class="text-sm font-medium text-gray-900">Attachments</h3>
                        <ul class="mt-2 divide-y divide-gray-200">
                            @foreach($this->record->getMedia('notice_attachments') as $media)
                                <li class="py-2">
                                    <a href="{{ $media->getUrl() }}"
                                       target="_blank"
                                       class="flex items-center space-x-2 text-sm text-primary-600 hover:text-primary-900">
                                        <x-filament::icon
                                            icon="heroicon-m-paper-clip"
                                            class="w-4 h-4"
                                        />
                                        <span>{{ $media->name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-filament-panels::page>
