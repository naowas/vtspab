<x-filament-panels::page>
    <div class="space-y-6">
        {{-- Ticket Details --}}
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <div class="p-6">
                <div class="flex justify-between items-start">
                    <h2 class="text-2xl font-bold">{{ $this->record->subject }}</h2>
                    <div class="flex gap-2">
                        <x-filament::badge :color="$this->getStatusColor()">
                            {{ $this->record->status }}
                        </x-filament::badge>
                        <x-filament::badge :color="$this->getPriorityColor()">
                            {{ $this->record->priority }}
                        </x-filament::badge>
                    </div>
                </div>

                <div class="mt-4 text-sm text-gray-500">
                    Opened by {{ $this->record->user->name }} · {{ $this->record->created_at->diffForHumans() }}
                </div>

                <div class="mt-6 prose max-w-none">
                    {!! $this->record->description !!}
                </div>

                @if($this->record->attachments)
                    <div class="mt-6">
                        <h3 class="text-sm font-medium text-gray-900">Attachments</h3>
                        <ul class="mt-2 divide-y divide-gray-200">
                            @foreach($this->record->attachments as $attachment)
                                <li class="py-2">
                                    <a href="{{ Storage::url($attachment) }}"
                                       target="_blank"
                                       class="flex items-center space-x-2 text-sm text-primary-600 hover:text-primary-900">
                                        <x-filament::icon
                                            icon="heroicon-m-paper-clip"
                                            class="w-4 h-4"
                                        />
                                        <span>{{ basename($attachment) }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        {{-- Comments Section --}}
        <div class="space-y-4">
            <h3 class="text-lg font-semibold">Comments</h3>
            @foreach($this->record->comments as $comment)
                <div class="bg-gray-50 rounded-lg overflow-hidden">
                    <div class="p-4">
                        <div class="flex justify-between items-start">
                            <div class="font-medium">{{ $comment->user->name }}</div>
                            <div class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</div>
                        </div>
                        <div class="mt-2 text-gray-700">
                            {!! $comment->comment !!}
                        </div>
                        @if($comment->attachments)
                            <div class="mt-3">
                                <div class="text-sm font-medium text-gray-900">Attachments:</div>
                                <div class="mt-2 flex flex-wrap gap-2">
                                    @foreach($comment->attachments as $attachment)
                                        <a href="{{ Storage::url($attachment) }}"
                                           target="_blank"
                                           class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-gray-700 bg-gray-100 rounded hover:bg-gray-200">
                                            <x-filament::icon
                                                icon="heroicon-m-paper-clip"
                                                class="w-4 h-4 mr-1"
                                            />
                                            {{ basename($attachment) }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Comment Form --}}
        <form wire:submit="save">
            {{ $this->form }}

            <x-filament::button
                type="submit"
                class="mt-4"
            >
                Add Comment
            </x-filament::button>
        </form>
    </div>
</x-filament-panels::page>
