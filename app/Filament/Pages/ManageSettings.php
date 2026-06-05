<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Settings';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int    $navigationSort  = 1;
    protected static string  $view            = 'filament.pages.manage-settings';

    // ── Form state: one property per setting key ──
    public string  $company_name    = '';
    public string  $company_email   = '';
    public string  $company_phone   = '';
    public string  $company_address = '';

    public string  $facebook_url  = '';
    public string  $twitter_url   = '';
    public string  $linkedin_url  = '';

    public string  $site_title       = '';
    public string  $site_description = '';
    public string  $site_keywords    = '';
    public string  $og_image         = '';

    public array   $logo_file        = [];

    public string  $gtm_id           = '';
    public string  $gtm_enabled      = '0';

    public static function canAccess(): bool
    {
        return Auth::check() && Auth::user()->role === 'super_admin';
    }

    // Load all settings from DB into properties on mount
    public function mount(): void
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();

        $this->company_name    = $settings['company_name']    ?? '';
        $this->company_email   = $settings['company_email']   ?? '';
        $this->company_phone   = $settings['company_phone']   ?? '';
        $this->company_address = $settings['company_address'] ?? '';

        $this->facebook_url    = $settings['facebook_url']    ?? '';
        $this->twitter_url     = $settings['twitter_url']     ?? '';
        $this->linkedin_url    = $settings['linkedin_url']    ?? '';

        $this->site_title       = $settings['site_title']       ?? '';
        $this->site_description = $settings['site_description'] ?? '';
        $this->site_keywords    = $settings['site_keywords']    ?? '';
        $this->og_image         = $settings['og_image']         ?? '';

        // FileUpload expects an array
        $logoPath = $settings['logo'] ?? '';
        $this->logo_file = $logoPath ? [$logoPath] : [];

        $this->gtm_id      = $settings['gtm_id']      ?? '';
        $this->gtm_enabled = $settings['gtm_enabled'] ?? '0';

        $this->form->fill([
            'company_name'    => $this->company_name,
            'company_email'   => $this->company_email,
            'company_phone'   => $this->company_phone,
            'company_address' => $this->company_address,
            'facebook_url'    => $this->facebook_url,
            'twitter_url'     => $this->twitter_url,
            'linkedin_url'    => $this->linkedin_url,
            'site_title'       => $this->site_title,
            'site_description' => $this->site_description,
            'site_keywords'    => $this->site_keywords,
            'og_image'         => $this->og_image,
            'logo_file'        => $this->logo_file,
            'gtm_id'           => $this->gtm_id,
            'gtm_enabled'      => $this->gtm_enabled,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('settings_tabs')
                    ->tabs([

                        // ── Tab 1: Company Info ──────────────────────────
                        Forms\Components\Tabs\Tab::make('Company Info')
                            ->icon('heroicon-o-building-office')
                            ->schema([
                                Forms\Components\Section::make('Brand')
                                    ->description('Your company name and logo.')
                                    ->schema([
                                        Forms\Components\TextInput::make('company_name')
                                            ->label('Company Name')
                                            ->required()
                                            ->maxLength(255)
                                            ->columnSpanFull(),

                                        Forms\Components\FileUpload::make('logo_file')
                                            ->label('Logo')
                                            ->image()
                                            ->directory('logos')
                                            ->visibility('public')
                                            ->maxSize(2048)
                                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'])
                                            ->multiple(false)
                                            ->maxFiles(1)
                                            ->helperText('Recommended: PNG or SVG, max 2 MB.')
                                            ->columnSpanFull(),
                                    ]),

                                Forms\Components\Section::make('Contact Details')
                                    ->description('Contact information shown in the footer and contact page.')
                                    ->columns(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('company_email')
                                            ->label('Email Address')
                                            ->email()
                                            ->required()
                                            ->maxLength(255),

                                        Forms\Components\TextInput::make('company_phone')
                                            ->label('Phone Number')
                                            ->maxLength(50),

                                        Forms\Components\Textarea::make('company_address')
                                            ->label('Address')
                                            ->rows(2)
                                            ->maxLength(500)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // ── Tab 2: Social Media ──────────────────────────
                        Forms\Components\Tabs\Tab::make('Social Media')
                            ->icon('heroicon-o-share')
                            ->schema([
                                Forms\Components\Section::make('Social Profiles')
                                    ->description('Links shown in the footer social icons. Leave blank to hide.')
                                    ->schema([
                                        Forms\Components\TextInput::make('facebook_url')
                                            ->label('Facebook URL')
                                            ->url()
                                            ->maxLength(500)
                                            ->prefix('🔵')
                                            ->placeholder('https://facebook.com/yourpage'),

                                        Forms\Components\TextInput::make('twitter_url')
                                            ->label('X (Twitter) URL')
                                            ->url()
                                            ->maxLength(500)
                                            ->prefix('🐦')
                                            ->placeholder('https://x.com/yourhandle'),

                                        Forms\Components\TextInput::make('linkedin_url')
                                            ->label('LinkedIn URL')
                                            ->url()
                                            ->maxLength(500)
                                            ->prefix('🔷')
                                            ->placeholder('https://linkedin.com/company/yourcompany'),
                                    ]),
                            ]),

                        // ── Tab 3: SEO ───────────────────────────────────
                        Forms\Components\Tabs\Tab::make('SEO')
                            ->icon('heroicon-o-magnifying-glass')
                            ->schema([
                                Forms\Components\Section::make('Page Defaults')
                                    ->description('Fallback meta tags used when a page does not have its own SEO content set.')
                                    ->schema([
                                        Forms\Components\TextInput::make('site_title')
                                            ->label('Default Site Title')
                                            ->required()
                                            ->maxLength(70)
                                            ->helperText('Recommended: 50–60 characters.')
                                            ->columnSpanFull(),

                                        Forms\Components\Textarea::make('site_description')
                                            ->label('Default Meta Description')
                                            ->rows(3)
                                            ->maxLength(165)
                                            ->helperText('Recommended: 150–160 characters.')
                                            ->columnSpanFull(),

                                        Forms\Components\TextInput::make('site_keywords')
                                            ->label('Default Meta Keywords')
                                            ->maxLength(500)
                                            ->helperText('Comma-separated keywords.')
                                            ->columnSpanFull(),
                                    ]),

                                Forms\Components\Section::make('Open Graph')
                                    ->description('Used when sharing pages on social media (Facebook, LinkedIn).')
                                    ->schema([
                                        Forms\Components\TextInput::make('og_image')
                                            ->label('Default OG Image URL')
                                            ->url()
                                            ->maxLength(500)
                                            ->placeholder('https://dbillers.com/images/og-default.jpg')
                                            ->helperText('Recommended: 1200×630px JPG or PNG.')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // ── Tab 4: Google Tag Manager ────────────────────
                        Forms\Components\Tabs\Tab::make('Google Tag Manager')
                            ->icon('heroicon-o-tag')
                            ->schema([
                                Forms\Components\Section::make('GTM Configuration')
                                    ->description('Add your GTM container to load tracking scripts sitewide. Changes take effect immediately on save.')
                                    ->schema([
                                        Forms\Components\Toggle::make('gtm_enabled')
                                            ->label('Enable Google Tag Manager')
                                            ->helperText('Turn off to stop all GTM scripts from loading without deleting your container ID.')
                                            ->onColor('success')
                                            ->offColor('danger')
                                            ->columnSpanFull(),

                                        Forms\Components\TextInput::make('gtm_id')
                                            ->label('GTM Container ID')
                                            ->placeholder('GTM-XXXXXXX')
                                            ->maxLength(20)
                                            ->helperText('Found in your Google Tag Manager account. Format: GTM-XXXXXXX.')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                    ])
                    ->columnSpanFull(),
            ])
            ->statePath('');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        // Map form fields to setting keys
        $textKeys = [
            'company_name', 'company_email', 'company_phone', 'company_address',
            'facebook_url', 'twitter_url', 'linkedin_url',
            'site_title', 'site_description', 'site_keywords', 'og_image',
            'gtm_id',
        ];

        foreach ($textKeys as $key) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $data[$key] ?? '']
            );
        }

        // GTM enabled toggle — converts bool to '1'/'0' string
        Setting::updateOrCreate(
            ['key' => 'gtm_enabled'],
            ['value' => ($data['gtm_enabled'] ?? false) ? '1' : '0']
        );

        // Logo — FileUpload returns array; extract first path
        $logoFile = $data['logo_file'] ?? [];
        if (!empty($logoFile)) {
            $logoPath = is_array($logoFile) ? ($logoFile[array_key_first($logoFile)] ?? '') : $logoFile;
            if ($logoPath) {
                Setting::updateOrCreate(['key' => 'logo'], ['value' => $logoPath]);
            }
        }

        // Clear Laravel settings cache if used
        if (function_exists('cache')) {
            cache()->forget('settings');
        }

        Notification::make()
            ->title('Settings saved')
            ->body('All changes have been applied to the site.')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [];
    }
}
