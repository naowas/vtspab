<x-filament-panels::page>
    <form wire:submit="send">
        {{ $this->form }}

        <div class="py-6">
            <x-filament::button type="submit">
                Send
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>
