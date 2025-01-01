<x-filament-widgets::widget>
    <x-filament::section>
        <div class="bg-white rounded-lg shadow-md">
        <h2 class="text-md font-semibold mb-4">Latest Notices</h2>
        <ul class="list-disc pl-5">
            @foreach ($notices as $notice)
                <li class="mb-2">
                    <h3 class="font-bold"><a href="{{ route('filament.member.resources.notices.view', $notice) }}">{{ $notice->title }}</a></h3>
                    <p class="text-sm text-gray-600">Published at: {{ $notice->published_at->format('d-M-Y H:i A') }}</p>
                </li>
            @endforeach
        </ul>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
