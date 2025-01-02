<div class="flex items-center gap-3">
    <div class="flex flex-col">
        <img src="{{asset('assets/img/300ppi/logo.png')}}" alt="Logo" class="h-10"/>
    </div>
    @if(auth()->check() && auth()->user()?->company?->logo)
        <img src="{{ Storage::url(auth()->user()->company->logo) }}" alt="Logo" class="h-10"/>
    @endif
</div>
