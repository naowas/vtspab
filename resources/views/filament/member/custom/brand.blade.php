<div class="flex items-center gap-3">
    <div class="flex flex-col">
        <span class="text-lg font-bold">{{Config::get('app.name')}}</span>
    </div>
    @if(auth()->check() && auth()->user()->company->logo)
        <img src="{{ Storage::url(auth()->user()->company->logo) }}" alt="Logo" class="h-10"/>
    @endif
</div>
