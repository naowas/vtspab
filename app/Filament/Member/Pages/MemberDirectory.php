<?php

namespace App\Filament\Member\Pages;

use App\Models\Company;
use Filament\Pages\Page;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;

class MemberDirectory extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.member.pages.member-directory';

    public function table(Table $table): Table
    {
        return $table
            ->query(Company::query())
            ->columns([
                ImageColumn::make('logo')
                    ->circular(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('establishment_date')
                    ->searchable()
                    ->sortable()
                    ->date(),
                TextColumn::make('website')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('membership_number')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('company_type')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('district')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('phone')
                    ->searchable(),
            ])
            ->actions([
//                ViewAction::make(),
            ])
            ->defaultSort('name', 'asc');
    }
}
