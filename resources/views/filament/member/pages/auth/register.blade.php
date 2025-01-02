<x-filament-panels::page.simple>
    @if (filament()->hasRegistration())
        <x-slot name="subheading">
            {{ __('filament-panels::pages/auth/register.actions.login.before') }}

            {{ $this->loginAction }}
        </x-slot>
    @endif

    <div class="relative">
        <!-- Custom background -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-purple-600 opacity-75"></div>

        <!-- Form container -->
        <div class="relative bg-white dark:bg-gray-900 rounded-lg shadow-xl p-8 max-w-md mx-auto">
            <h2 class="text-2xl font-bold text-center mb-6">
                {{ __('Register Your Account') }}
            </h2>

            {{ $this->form }}

            {{ $this->registerAction }}
        </div>
    </div>
</x-filament-panels::page.simple>

@push('styles')
    <style>
        .filament-main {
            background-image: url('/path-to-your-background-image.jpg');
            background-size: cover;
            background-position: center;
        }

        .filament-form-component {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.9);
        }
    </style>
@endpush
