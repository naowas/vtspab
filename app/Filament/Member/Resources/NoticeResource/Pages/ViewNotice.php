<?php

namespace App\Filament\Member\Resources\NoticeResource\Pages;


use App\Filament\Member\Resources\NoticeResource;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;

class ViewNotice extends Page
{

    use InteractsWithRecord;

    protected static string $resource = NoticeResource::class;

    protected static string $view = 'filament.member.resources.notice-resource.pages.view-notice';

    protected static bool $shouldRegisterNavigation = false;

    public ?array $data = [];


    public function mount($record): void
    {
        $this->record = $this->resolveRecord($record)->load(['creator','media']);
    }

}
