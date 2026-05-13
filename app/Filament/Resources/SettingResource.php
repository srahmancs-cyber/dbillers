<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'Settings';

    public static function canViewAny(): bool
    {
        return Auth::check() && Auth::user()->role === 'super_admin';
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('key')
                    ->required()
                    ->disabled()
                    ->maxLength(255),
                
                // For text settings (non-logo)
                Forms\Components\TextInput::make('value')
                    ->required()
                    ->maxLength(65535)
                    ->hidden(fn ($get) => $get('key') === 'logo'),
                
                // For logo setting - file upload stores directly to 'value'
                Forms\Components\FileUpload::make('value')
                    ->label('Logo')
                    ->image()
                    ->directory('logos')
                    ->visibility('public')
                    ->maxSize(1024)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'])
                    ->multiple(false)
                    ->maxFiles(1)
                    ->hidden(fn ($get) => $get('key') !== 'logo')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')->searchable(),
                Tables\Columns\ImageColumn::make('value')
                    ->label('Logo Preview')
                    ->circular()
                    ->height(40)
                    ->visible(fn ($record) => $record && $record->key === 'logo' && $record->value),
                Tables\Columns\TextColumn::make('value')
                    ->label('Value')
                    ->limit(50)
                    ->visible(fn ($record) => $record && $record->key !== 'logo'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
