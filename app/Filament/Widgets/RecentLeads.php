<?php

namespace App\Filament\Widgets;

use App\Models\ContactLead;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentLeads extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    
    public function table(Table $table): Table
    {
        return $table
            ->query(
                ContactLead::query()->latest()->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('M d, Y h:i A')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('message')
                    ->limit(50),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'unread',
                        'success' => 'read',
                    ]),
            ])
            ->actions([
                Tables\Actions\Action::make('mark_read')
                    ->action(function (ContactLead $record) {
                        $record->update(['status' => 'read']);
                    })
                    ->requiresConfirmation()
                    ->icon('heroicon-o-check-circle'),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
