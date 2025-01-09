<?php

namespace App\Filament\Admin\Pages;

use App\Mail\UserBulkEmail;
use App\Models\User;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;

class SendEmails extends Page
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Send Emails';
    protected static ?string $title = 'Send Emails to Users';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('subject')
                    ->required()
                    ->maxLength(255),
                Select::make('users')
                    ->multiple()
                    ->options(User::where('id','!=', \Auth::id())->pluck('email', 'id')->toArray())
                    ->searchable()
                    ->preload()
                    ->required()
                    ->placeholder('Select users')
                    ->hintAction(fn (Select $component) => Action::make('select all')
                        ->action(fn () => $component->state(User::where('id','!=', \Auth::id())->pluck('id')->toArray())
                    )),
                RichEditor::make('content')
                    ->required()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'link',
                        'orderedList',
                        'unorderedList',
                        'h2',
                        'h3',
                        'quote',
                        'code',
                        'table',
                        'horizontalRule',
                        'undo',
                        'redo',
                        'removeFormat',
                        'fullscreen',
                        'viewSource',
                        'help',
                        'html',
                        'preview',
                        'print',
                        'maximize',


                    ]),
                FileUpload::make('email_attachments')
                    ->label('Attachments')
                    ->disk('public')
                    ->multiple()
                    ->directory('users/bulk-emails')
                    ->hint('Max 5 files, 5MB each'),
            ])
            ->statePath('data');
    }

    public function send(): void
    {
        $data = $this->form->getState();

        // Validate data
        $this->validate([
            'data.subject' => 'required|string|max:255',
            'data.users' => 'required|array',
            'data.content' => 'required|string',
            'data.email_attachments' => 'nullable|array',
            'data.email_attachments.*' => 'max:5120', // 5MB max per file
        ]);

        // Process emails
        foreach ($data['users'] as $userId) {
            $user = User::find($userId);

            if ($user) {
                // Prepare email data
                $emailData = [
                    'subject' => $data['subject'],
                    'content' => $data['content'],
                    'email_attachments' => $data['email_attachments'] ?? [],
                ];

                // Send email using queue
                \Mail::to($user)->send(new UserBulkEmail($emailData));
            }
        }

        Notification::make()
            ->title('Emails queued for sending')
            ->success()
            ->send();

        // Reset form
        $this->form->fill();
    }

    public function getFormActions(): array
    {
        return [
            \Filament\Forms\Components\Actions\Action::make('send')
                ->label('Send Emails')
                ->submit('send'),
        ];
    }

    protected static string $view = 'filament.admin.pages.send-emails';
}
