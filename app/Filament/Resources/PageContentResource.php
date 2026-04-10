<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageContentResource\Pages;
use App\Models\PageContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageContentResource extends Resource
{
    protected static ?string $model = PageContent::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Website Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Content')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Basic Info')
                            ->schema([
                                Forms\Components\Select::make('page')
                                    ->options([
                                        'home' => 'Home Page',
                                        'about' => 'About Page',
                                        'services' => 'Services Page',
                                        'specialities' => 'Specialities Page',
                                        'contact' => 'Contact Page',
                                    ])
                                    ->required(),
                                Forms\Components\TextInput::make('section')
                                    ->required()
                                    ->helperText('Unique identifier for this section'),
                                Forms\Components\TextInput::make('order')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Show this section')
                                    ->default(true),
                            ]),
                        
                        Forms\Components\Tabs\Tab::make('Content')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Main Heading')
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('subtitle')
                                    ->label('Subheading (small text above heading)')
                                    ->columnSpanFull(),
                                Forms\Components\RichEditor::make('content')
                                    ->label('Description Text')
                                    ->toolbarButtons(['bold', 'italic', 'underline', 'link'])
                                    ->columnSpanFull(),
                                Forms\Components\FileUpload::make('image_url')
                                    ->label('Section Image')
                                    ->image()
                                    ->directory('page-images'),
                            ]),
                        
                        Forms\Components\Tabs\Tab::make('Hero Settings')
                            ->schema([
                                Forms\Components\Repeater::make('metadata.buttons')
                                    ->label('Buttons')
                                    ->schema([
                                        Forms\Components\TextInput::make('text')->required(),
                                        Forms\Components\TextInput::make('url')->required(),
                                        Forms\Components\TextInput::make('icon')->default('fa-arrow-right'),
                                    ])
                                    ->columns(3),
                                Forms\Components\Repeater::make('metadata.trust_badges')
                                    ->label('Trust Badges')
                                    ->schema([
                                        Forms\Components\TextInput::make('value')->required(),
                                    ]),
                                Forms\Components\TextInput::make('metadata.floating_icon')
                                    ->label('Floating Icon'),
                            ])
                            ->visible(fn ($get) => $get('page') === 'home' && $get('section') === 'hero'),
                        
                        Forms\Components\Tabs\Tab::make('Services Overview')
                            ->schema([
                                Forms\Components\Repeater::make('metadata.services')
                                    ->label('Services List')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')->required(),
                                        Forms\Components\Textarea::make('description')->required()->rows(3),
                                        Forms\Components\TextInput::make('icon')->required(),
                                        Forms\Components\TextInput::make('link')->default('/contact'),
                                    ])
                                    ->columns(1),
                            ])
                            ->visible(fn ($get) => $get('page') === 'home' && $get('section') === 'services_overview'),
                        
                        Forms\Components\Tabs\Tab::make('Medical Claims')
                            ->schema([
                                Forms\Components\TextInput::make('metadata.button_text')
                                    ->label('Button Text')
                                    ->default('Book Free Consultation'),
                                Forms\Components\TextInput::make('metadata.button_link')
                                    ->label('Button Link')
                                    ->default('/contact'),
                                Forms\Components\Repeater::make('metadata.features')
                                    ->label('Features List')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')->required(),
                                        Forms\Components\Textarea::make('description')->required()->rows(2),
                                        Forms\Components\TextInput::make('icon')->required(),
                                    ])
                                    ->columns(1)
                                    ->default([
                                        ['title' => 'Secure Claim Data Transmission', 'description' => 'Safest digital encryption protects sensitive patient data.', 'icon' => 'fa-shield-alt'],
                                        ['title' => 'Increase Revenue', 'description' => 'Get full payments without unfair insurance network cuts.', 'icon' => 'fa-chart-line'],
                                        ['title' => 'Instant Claim Submission', 'description' => 'Electronic billing service files claims instantly.', 'icon' => 'fa-bolt'],
                                        ['title' => 'Claim Follow-Up & Resolution', 'description' => 'Denied claims are appealed and reprocessed successfully.', 'icon' => 'fa-clock'],
                                    ]),
                            ])
                            ->visible(fn ($get) => $get('page') === 'home' && $get('section') === 'medical_claims'),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page')->badge(),
                Tables\Columns\TextColumn::make('section'),
                Tables\Columns\TextColumn::make('title')->limit(40),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
                Tables\Columns\TextColumn::make('order')->sortable(),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('page')
                    ->options([
                        'home' => 'Home',
                        'about' => 'About',
                        'services' => 'Services',
                        'specialities' => 'Specialities',
                        'contact' => 'Contact',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPageContents::route('/'),
            'create' => Pages\CreatePageContent::route('/create'),
            'edit' => Pages\EditPageContent::route('/{record}/edit'),
        ];
    }
}
