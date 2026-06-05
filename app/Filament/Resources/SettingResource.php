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

    // Hidden from nav — replaced by ManageSettings custom page
    protected static bool $shouldRegisterNavigation = false;

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
                // Key — read-only identifier
                Forms\Components\TextInput::make('key')
                    ->required()
                    ->disabled()
                    ->maxLength(255),

                // ── Plain text value (all settings except logo and gtm_enabled) ──
                Forms\Components\TextInput::make('value')
                    ->label('Value')
                    ->maxLength(65535)
                    ->hidden(fn ($get) => in_array($get('key'), ['logo', 'gtm_enabled'])),

                // ── Logo: uses a SEPARATE virtual field 'logo_file' ──
                // The model handles syncing logo_file → value on save.
                Forms\Components\FileUpload::make('logo_file')
                    ->label('Logo')
                    ->image()
                    ->directory('logos')
                    ->visibility('public')
                    ->maxSize(1024)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'])
                    ->multiple(false)
                    ->maxFiles(1)
                    ->hidden(fn ($get) => $get('key') !== 'logo')
                    ->columnSpanFull()
                    ->helperText('Upload a new logo. Current logo will be replaced.'),

                // ── GTM enabled: uses a SEPARATE virtual field 'gtm_enabled_value' ──
                Forms\Components\Select::make('gtm_enabled_value')
                    ->label('GTM Enabled')
                    ->options(['1' => 'Enabled', '0' => 'Disabled'])
                    ->hidden(fn ($get) => $get('key') !== 'gtm_enabled')
                    ->helperText('Enable or disable Google Tag Manager on the site.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('value')
                    ->label('Logo Preview')
                    ->circular()
                    ->height(40)
                    ->visible(fn ($record) => $record && $record->key === 'logo' && $record->value),
                Tables\Columns\TextColumn::make('value')
                    ->label('Value')
                    ->limit(60)
                    ->visible(fn ($record) => $record && $record->key !== 'logo'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('key')
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
            'index'  => Pages\ListSettings::route('/'),
            'edit'   => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
