<?php

namespace App\Filament\Member\Resources\TicketResource\Pages;

use App\Filament\Member\Resources\TicketResource;
use App\Models\Ticket;
use App\Models\TicketComment;
use Filament\Forms\Form;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Resources\Pages\Page;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class ViewTicket extends Page
{
    use InteractsWithRecord;

    protected static string $resource = TicketResource::class;

    protected static string $view = 'filament.member.resources.ticket-resource.pages.view-ticket';

    protected static bool $shouldRegisterNavigation = false;

    public ?array $data = [];

    public function mount($record): void
    {
        $this->record = $this->resolveRecord($record)->load(['comments.user', 'user']);

        if ($this->record->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to this ticket.');
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Add Comment')
                    ->schema([
                        Textarea::make('comment')
                            ->required()
                            ->label('Your Comment')
                            ->placeholder('Enter your comment here...')
                            ->rows(3),
                        FileUpload::make('attachments')
                            ->multiple()
                            ->directory('ticket-comments')
                            ->preserveFilenames()
                            ->maxFiles(5)
                            ->acceptedFileTypes(['image/*', 'application/pdf', '.doc', '.docx', '.zip'])
                            ->maxSize(5120) // 5MB
                    ])
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $comment = new TicketComment();
        $comment->ticket_id = $this->record->id;
        $comment->comment = $this->data['comment'];
        $comment->attachments = $this->data['attachments'] ?? null;
        $comment->save();

        // Reset the form
        $this->data = [];

        // Reload the record to get fresh comments
        $this->record->refresh();

        Notification::make()
            ->success()
            ->title('Comment added successfully')
            ->send();
    }

    public function getStatusColor(): string
    {
        return match($this->record->status) {
            'Open' => 'info',
            'In-Progress' => 'warning',
            'Resolved' => 'success',
            default => 'gray'
        };
    }

    public function getPriorityColor(): string
    {
        return match($this->record->priority) {
            'Low' => 'info',
            'Medium' => 'warning',
            'High' => 'danger',
            default => 'gray'
        };
    }
}
