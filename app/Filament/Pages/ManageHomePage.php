<?php

namespace App\Filament\Pages;

use App\Models\PageContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class ManageHomePage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Home Page';
    protected static ?string $navigationGroup = 'Page Content';
    protected static ?int    $navigationSort  = 1;
    protected static string  $view            = 'filament.pages.manage-home-page';

    public array $hero                = [];
    public array $services_overview   = [];
    public array $medical_claims      = [];
    public array $specialized_agency  = [];
    public array $trust_ratings       = [];
    public array $tech_expertise      = [];
    public array $pricing_offer       = [];
    public array $dedicated_team      = [];
    public array $provider_challenges = [];
    public array $specialty_billing   = [];
    public array $nationwide          = [];
    public array $testimonials        = [];
    public array $faq                 = [];
    public array $final_cta           = [];

    public static function canAccess(): bool
    {
        return Auth::check() && in_array(Auth::user()->role, ['super_admin', 'admin']);
    }

    public function mount(): void
    {
        $rows = PageContent::where('page', 'home')
            ->orderBy('order')
            ->get()
            ->keyBy('section');

        $fill = [];
        foreach ($rows as $key => $row) {
            $fill[$key] = [
                'title'     => $row->title     ?? '',
                'subtitle'  => $row->subtitle  ?? '',
                'content'   => $row->content   ?? '',
                'image_url' => $row->image_url ?? '',
                'metadata'  => $row->metadata  ?? [],
            ];
        }

        $this->form->fill($fill);
    }

    // ── Reusable tab builders ─────────────────────────────────────

    private static function contentTab(string $key, bool $hasSubtitle = true): Forms\Components\Tabs\Tab
    {
        $fields = [
            Forms\Components\TextInput::make("{$key}.title")
                ->label('Heading')
                ->columnSpanFull(),
        ];

        if ($hasSubtitle) {
            $fields[] = Forms\Components\TextInput::make("{$key}.subtitle")
                ->label('Subheading')
                ->columnSpanFull();
        }

        $fields[] = Forms\Components\RichEditor::make("{$key}.content")
            ->label('Body Text')
            ->toolbarButtons(['bold', 'italic', 'underline', 'link', 'bulletList', 'orderedList'])
            ->columnSpanFull();

        return Forms\Components\Tabs\Tab::make('Content')
            ->icon('heroicon-o-document-text')
            ->schema($fields);
    }

    private static function mediaTab(string $key): Forms\Components\Tabs\Tab
    {
        return Forms\Components\Tabs\Tab::make('Image')
            ->icon('heroicon-o-photo')
            ->schema([
                Forms\Components\FileUpload::make("{$key}.image_url")
                    ->label('Section Image')
                    ->helperText('Recommended: JPG or PNG, max 2 MB.')
                    ->image()
                    ->directory('page-images')
                    ->visibility('public')
                    ->imagePreviewHeight('160')
                    ->columnSpanFull(),
            ]);
    }

    private static function seoTab(string $key): Forms\Components\Tabs\Tab
    {
        return Forms\Components\Tabs\Tab::make('SEO')
            ->icon('heroicon-o-magnifying-glass')
            ->schema([
                Forms\Components\TextInput::make("{$key}.metadata.meta_title")
                    ->label('Page Title')
                    ->helperText('Shown in the browser tab and Google. Keep 50–60 characters.')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make("{$key}.metadata.meta_description")
                    ->label('Meta Description')
                    ->helperText('Shown in Google search results. Keep 150–160 characters.')
                    ->rows(3)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make("{$key}.metadata.meta_keywords")
                    ->label('Keywords')
                    ->helperText('Comma-separated. Example: medical billing, RCM, coding')
                    ->columnSpanFull(),
            ]);
    }

    private static function buttonFieldset(string $key, int $index, string $label): Forms\Components\Fieldset
    {
        return Forms\Components\Fieldset::make($label)
            ->schema([
                Forms\Components\TextInput::make("{$key}.metadata.buttons.{$index}.text")
                    ->label('Button Text')
                    ->helperText('Example: Book a Free Consultation'),
                Forms\Components\TextInput::make("{$key}.metadata.buttons.{$index}.url")
                    ->label('Button URL')
                    ->helperText('Example: /contact'),
            ])
            ->columns(2);
    }

    // ── Main form ─────────────────────────────────────────────────

    public function form(Form $form): Form
    {
        return $form->schema([

            // ── 1. HERO ───────────────────────────────────────────
            Forms\Components\Section::make('Hero — Main Banner')
                ->description('The first thing visitors see when they land on the home page.')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('hero_tabs')->tabs([

                        Forms\Components\Tabs\Tab::make('Content')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\TextInput::make('hero.title')
                                    ->label('Main Heading')
                                    ->helperText('The big bold headline. Keep it punchy.')
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('hero.subtitle')
                                    ->label('Tagline')
                                    ->helperText('Shown below the heading in blue.')
                                    ->columnSpanFull(),
                                Forms\Components\RichEditor::make('hero.content')
                                    ->label('Description Paragraph')
                                    ->toolbarButtons(['bold', 'italic', 'link'])
                                    ->columnSpanFull(),
                            ]),

                        self::mediaTab('hero'),

                        Forms\Components\Tabs\Tab::make('Buttons & Badges')
                            ->icon('heroicon-o-cursor-arrow-rays')
                            ->schema([
                                self::buttonFieldset('hero', 0, 'Primary Button'),
                                self::buttonFieldset('hero', 1, 'Secondary Button'),
                                Forms\Components\Fieldset::make('Trust Badges (shown below buttons)')
                                    ->schema([
                                        Forms\Components\TextInput::make('hero.metadata.trust_badges.0')->label('Badge 1'),
                                        Forms\Components\TextInput::make('hero.metadata.trust_badges.1')->label('Badge 2'),
                                        Forms\Components\TextInput::make('hero.metadata.trust_badges.2')->label('Badge 3'),
                                    ])->columns(3),
                            ]),

                        self::seoTab('hero'),

                    ])->columnSpanFull(),
                ]),

            // ── 2. SERVICES OVERVIEW ──────────────────────────────
            Forms\Components\Section::make('Services Overview')
                ->description('4-card grid showing your main service categories.')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('svc_tabs')->tabs([

                        self::contentTab('services_overview', false),

                        Forms\Components\Tabs\Tab::make('Service Cards')
                            ->icon('heroicon-o-squares-2x2')
                            ->schema([
                                Forms\Components\Fieldset::make('Card 1')->schema([
                                    Forms\Components\TextInput::make('services_overview.metadata.services.0.title')->label('Title'),
                                    Forms\Components\TextInput::make('services_overview.metadata.services.0.link')->label('Link URL'),
                                    Forms\Components\Textarea::make('services_overview.metadata.services.0.description')->label('Description')->rows(2)->columnSpanFull(),
                                ])->columns(2),
                                Forms\Components\Fieldset::make('Card 2')->schema([
                                    Forms\Components\TextInput::make('services_overview.metadata.services.1.title')->label('Title'),
                                    Forms\Components\TextInput::make('services_overview.metadata.services.1.link')->label('Link URL'),
                                    Forms\Components\Textarea::make('services_overview.metadata.services.1.description')->label('Description')->rows(2)->columnSpanFull(),
                                ])->columns(2),
                                Forms\Components\Fieldset::make('Card 3')->schema([
                                    Forms\Components\TextInput::make('services_overview.metadata.services.2.title')->label('Title'),
                                    Forms\Components\TextInput::make('services_overview.metadata.services.2.link')->label('Link URL'),
                                    Forms\Components\Textarea::make('services_overview.metadata.services.2.description')->label('Description')->rows(2)->columnSpanFull(),
                                ])->columns(2),
                                Forms\Components\Fieldset::make('Card 4')->schema([
                                    Forms\Components\TextInput::make('services_overview.metadata.services.3.title')->label('Title'),
                                    Forms\Components\TextInput::make('services_overview.metadata.services.3.link')->label('Link URL'),
                                    Forms\Components\Textarea::make('services_overview.metadata.services.3.description')->label('Description')->rows(2)->columnSpanFull(),
                                ])->columns(2),
                            ]),

                    ])->columnSpanFull(),
                ]),

            // ── 3. MEDICAL CLAIMS ─────────────────────────────────
            Forms\Components\Section::make('Medical Claims Billing')
                ->description('Two-column section: text on left, image on right.')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('mc_tabs')->tabs([
                        self::contentTab('medical_claims'),
                        self::mediaTab('medical_claims'),
                        Forms\Components\Tabs\Tab::make('Button')
                            ->icon('heroicon-o-cursor-arrow-rays')
                            ->schema([
                                Forms\Components\TextInput::make('medical_claims.metadata.button_text')->label('Button Text'),
                                Forms\Components\TextInput::make('medical_claims.metadata.button_link')->label('Button URL')->helperText('Example: /contact'),
                            ])->columns(2),
                    ])->columnSpanFull(),
                ]),

            // ── 4. SPECIALIZED AGENCY ─────────────────────────────
            Forms\Components\Section::make('Specialized Agency')
                ->description('Full-width blue band with a headline and one CTA button.')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('sa_tabs')->tabs([
                        self::contentTab('specialized_agency', false),
                        Forms\Components\Tabs\Tab::make('Button')
                            ->icon('heroicon-o-cursor-arrow-rays')
                            ->schema([
                                Forms\Components\TextInput::make('specialized_agency.metadata.button_text')->label('Button Text'),
                                Forms\Components\TextInput::make('specialized_agency.metadata.button_link')->label('Button URL'),
                            ])->columns(2),
                    ])->columnSpanFull(),
                ]),

            // ── 5. TRUST & RATINGS ────────────────────────────────
            Forms\Components\Section::make('Trust & Ratings')
                ->description('3 headline stats shown in large numbers (e.g. 99% Clean Claim Ratio).')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('tr_tabs')->tabs([
                        self::contentTab('trust_ratings', false),
                        Forms\Components\Tabs\Tab::make('Stats')
                            ->icon('heroicon-o-chart-bar')
                            ->schema([
                                Forms\Components\Fieldset::make('Stat 1')->schema([
                                    Forms\Components\TextInput::make('trust_ratings.metadata.stats.0.value')->label('Number — e.g. Almost 99%'),
                                    Forms\Components\TextInput::make('trust_ratings.metadata.stats.0.label')->label('Label — e.g. Clean Claim Ratio'),
                                ])->columns(2),
                                Forms\Components\Fieldset::make('Stat 2')->schema([
                                    Forms\Components\TextInput::make('trust_ratings.metadata.stats.1.value')->label('Number'),
                                    Forms\Components\TextInput::make('trust_ratings.metadata.stats.1.label')->label('Label'),
                                ])->columns(2),
                                Forms\Components\Fieldset::make('Stat 3')->schema([
                                    Forms\Components\TextInput::make('trust_ratings.metadata.stats.2.value')->label('Number'),
                                    Forms\Components\TextInput::make('trust_ratings.metadata.stats.2.label')->label('Label'),
                                ])->columns(2),
                            ]),
                    ])->columnSpanFull(),
                ]),

            // ── 6. TECH & EXPERTISE ───────────────────────────────
            Forms\Components\Section::make('Technology & Expertise')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('te_tabs')->tabs([
                        self::contentTab('tech_expertise', false),
                        Forms\Components\Tabs\Tab::make('Button')
                            ->icon('heroicon-o-cursor-arrow-rays')
                            ->schema([
                                Forms\Components\TextInput::make('tech_expertise.metadata.button_text')->label('Button Text'),
                                Forms\Components\TextInput::make('tech_expertise.metadata.button_link')->label('Button URL'),
                            ])->columns(2),
                    ])->columnSpanFull(),
                ]),

            // ── 7. PRICING OFFER ──────────────────────────────────
            Forms\Components\Section::make('Pricing Offer')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('po_tabs')->tabs([
                        self::contentTab('pricing_offer', false),
                        Forms\Components\Tabs\Tab::make('Button')
                            ->icon('heroicon-o-cursor-arrow-rays')
                            ->schema([
                                Forms\Components\TextInput::make('pricing_offer.metadata.button_text')->label('Button Text'),
                                Forms\Components\TextInput::make('pricing_offer.metadata.button_link')->label('Button URL'),
                            ])->columns(2),
                    ])->columnSpanFull(),
                ]),

            // ── 8. DEDICATED TEAM ─────────────────────────────────
            Forms\Components\Section::make('Dedicated Team')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('dt_tabs')->tabs([
                        self::contentTab('dedicated_team', false),
                        self::mediaTab('dedicated_team'),
                        Forms\Components\Tabs\Tab::make('Button')
                            ->icon('heroicon-o-cursor-arrow-rays')
                            ->schema([
                                Forms\Components\TextInput::make('dedicated_team.metadata.button_text')->label('Button Text'),
                                Forms\Components\TextInput::make('dedicated_team.metadata.button_link')->label('Button URL'),
                            ])->columns(2),
                    ])->columnSpanFull(),
                ]),

            // ── 9. PROVIDER CHALLENGES ────────────────────────────
            Forms\Components\Section::make('Provider Challenges')
                ->description('Checkbox list + free consultation form. Edit the challenge items below.')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('pc_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\TextInput::make('provider_challenges.title')
                                    ->label('Section Heading')
                                    ->columnSpanFull(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Challenges')
                            ->icon('heroicon-o-list-bullet')
                            ->schema([
                                Forms\Components\TextInput::make('provider_challenges.metadata.challenges.0')->label('Challenge 1'),
                                Forms\Components\TextInput::make('provider_challenges.metadata.challenges.1')->label('Challenge 2'),
                                Forms\Components\TextInput::make('provider_challenges.metadata.challenges.2')->label('Challenge 3'),
                                Forms\Components\TextInput::make('provider_challenges.metadata.challenges.3')->label('Challenge 4'),
                                Forms\Components\TextInput::make('provider_challenges.metadata.challenges.4')->label('Challenge 5'),
                            ])->columns(1),
                    ])->columnSpanFull(),
                ]),

            // ── 10. SPECIALTY BILLING ─────────────────────────────
            Forms\Components\Section::make('Specialty Medical Billing')
                ->description('Tag cloud showing which medical specialties you serve.')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('sb_tabs')->tabs([
                        self::contentTab('specialty_billing', false),
                        Forms\Components\Tabs\Tab::make('Specialty Tags')
                            ->icon('heroicon-o-tag')
                            ->schema([
                                Forms\Components\TextInput::make('specialty_billing.metadata.specialties.0')->label('Specialty 1'),
                                Forms\Components\TextInput::make('specialty_billing.metadata.specialties.1')->label('Specialty 2'),
                                Forms\Components\TextInput::make('specialty_billing.metadata.specialties.2')->label('Specialty 3'),
                                Forms\Components\TextInput::make('specialty_billing.metadata.specialties.3')->label('Specialty 4'),
                                Forms\Components\TextInput::make('specialty_billing.metadata.specialties.4')->label('Specialty 5'),
                                Forms\Components\TextInput::make('specialty_billing.metadata.specialties.5')->label('Specialty 6'),
                            ])->columns(3),
                    ])->columnSpanFull(),
                ]),

            // ── 11. NATIONWIDE ────────────────────────────────────
            Forms\Components\Section::make('Nationwide Availability')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('nw_tabs')->tabs([
                        self::contentTab('nationwide', false),
                        Forms\Components\Tabs\Tab::make('Locations')
                            ->icon('heroicon-o-map-pin')
                            ->schema([
                                Forms\Components\TextInput::make('nationwide.metadata.locations.0')->label('Location 1'),
                                Forms\Components\TextInput::make('nationwide.metadata.locations.1')->label('Location 2'),
                                Forms\Components\TextInput::make('nationwide.metadata.locations.2')->label('Location 3'),
                                Forms\Components\TextInput::make('nationwide.metadata.locations.3')->label('Location 4'),
                                Forms\Components\TextInput::make('nationwide.metadata.locations.4')->label('Location 5'),
                                Forms\Components\TextInput::make('nationwide.metadata.locations.5')->label('Location 6'),
                            ])->columns(3),
                    ])->columnSpanFull(),
                ]),

            // ── 12. TESTIMONIALS ──────────────────────────────────
            Forms\Components\Section::make('Testimonials')
                ->description('Customer reviews shown in cards. Stars: enter a number 1–5.')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('tm_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Section Heading')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\TextInput::make('testimonials.title')->label('Section Heading')->columnSpanFull(),
                                Forms\Components\Fieldset::make('Rating Summary Badge')
                                    ->schema([
                                        Forms\Components\TextInput::make('testimonials.metadata.trust_badge')->label('Badge Text — e.g. "Trusted by 300+ Verified Practices"'),
                                        Forms\Components\TextInput::make('testimonials.metadata.rating')->label('Rating — e.g. 4.8/5'),
                                        Forms\Components\TextInput::make('testimonials.metadata.reviews')->label('Review Count — e.g. 354'),
                                    ])->columns(3),
                            ]),
                        Forms\Components\Tabs\Tab::make('Testimonials 1 & 2')
                            ->icon('heroicon-o-chat-bubble-left')
                            ->schema([
                                Forms\Components\Fieldset::make('Testimonial 1')->schema([
                                    Forms\Components\TextInput::make('testimonials.metadata.testimonials.0.author')->label('Name'),
                                    Forms\Components\TextInput::make('testimonials.metadata.testimonials.0.role')->label('Job Title'),
                                    Forms\Components\TextInput::make('testimonials.metadata.testimonials.0.stars')->label('Stars (1–5)')->numeric(),
                                    Forms\Components\Textarea::make('testimonials.metadata.testimonials.0.text')->label('Quote')->rows(3)->columnSpanFull(),
                                ])->columns(3),
                                Forms\Components\Fieldset::make('Testimonial 2')->schema([
                                    Forms\Components\TextInput::make('testimonials.metadata.testimonials.1.author')->label('Name'),
                                    Forms\Components\TextInput::make('testimonials.metadata.testimonials.1.role')->label('Job Title'),
                                    Forms\Components\TextInput::make('testimonials.metadata.testimonials.1.stars')->label('Stars (1–5)')->numeric(),
                                    Forms\Components\Textarea::make('testimonials.metadata.testimonials.1.text')->label('Quote')->rows(3)->columnSpanFull(),
                                ])->columns(3),
                            ]),
                        Forms\Components\Tabs\Tab::make('Testimonials 3 & 4')
                            ->icon('heroicon-o-chat-bubble-left-right')
                            ->schema([
                                Forms\Components\Fieldset::make('Testimonial 3')->schema([
                                    Forms\Components\TextInput::make('testimonials.metadata.testimonials.2.author')->label('Name'),
                                    Forms\Components\TextInput::make('testimonials.metadata.testimonials.2.role')->label('Job Title'),
                                    Forms\Components\TextInput::make('testimonials.metadata.testimonials.2.stars')->label('Stars (1–5)')->numeric(),
                                    Forms\Components\Textarea::make('testimonials.metadata.testimonials.2.text')->label('Quote')->rows(3)->columnSpanFull(),
                                ])->columns(3),
                                Forms\Components\Fieldset::make('Testimonial 4')->schema([
                                    Forms\Components\TextInput::make('testimonials.metadata.testimonials.3.author')->label('Name'),
                                    Forms\Components\TextInput::make('testimonials.metadata.testimonials.3.role')->label('Job Title'),
                                    Forms\Components\TextInput::make('testimonials.metadata.testimonials.3.stars')->label('Stars (1–5)')->numeric(),
                                    Forms\Components\Textarea::make('testimonials.metadata.testimonials.3.text')->label('Quote')->rows(3)->columnSpanFull(),
                                ])->columns(3),
                            ]),
                    ])->columnSpanFull(),
                ]),

            // ── 13. FAQ ───────────────────────────────────────────
            Forms\Components\Section::make('Frequently Asked Questions')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('faq_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Heading')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\TextInput::make('faq.title')->label('Section Heading')->columnSpanFull(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Questions 1–3')
                            ->icon('heroicon-o-question-mark-circle')
                            ->schema([
                                Forms\Components\Fieldset::make('FAQ 1')->schema([
                                    Forms\Components\TextInput::make('faq.metadata.faqs.0.question')->label('Question')->columnSpanFull(),
                                    Forms\Components\Textarea::make('faq.metadata.faqs.0.answer')->label('Answer')->rows(3)->columnSpanFull(),
                                ]),
                                Forms\Components\Fieldset::make('FAQ 2')->schema([
                                    Forms\Components\TextInput::make('faq.metadata.faqs.1.question')->label('Question')->columnSpanFull(),
                                    Forms\Components\Textarea::make('faq.metadata.faqs.1.answer')->label('Answer')->rows(3)->columnSpanFull(),
                                ]),
                                Forms\Components\Fieldset::make('FAQ 3')->schema([
                                    Forms\Components\TextInput::make('faq.metadata.faqs.2.question')->label('Question')->columnSpanFull(),
                                    Forms\Components\Textarea::make('faq.metadata.faqs.2.answer')->label('Answer')->rows(3)->columnSpanFull(),
                                ]),
                            ]),
                        Forms\Components\Tabs\Tab::make('Questions 4–6')
                            ->icon('heroicon-o-question-mark-circle')
                            ->schema([
                                Forms\Components\Fieldset::make('FAQ 4')->schema([
                                    Forms\Components\TextInput::make('faq.metadata.faqs.3.question')->label('Question')->columnSpanFull(),
                                    Forms\Components\Textarea::make('faq.metadata.faqs.3.answer')->label('Answer')->rows(3)->columnSpanFull(),
                                ]),
                                Forms\Components\Fieldset::make('FAQ 5')->schema([
                                    Forms\Components\TextInput::make('faq.metadata.faqs.4.question')->label('Question')->columnSpanFull(),
                                    Forms\Components\Textarea::make('faq.metadata.faqs.4.answer')->label('Answer')->rows(3)->columnSpanFull(),
                                ]),
                                Forms\Components\Fieldset::make('FAQ 6')->schema([
                                    Forms\Components\TextInput::make('faq.metadata.faqs.5.question')->label('Question')->columnSpanFull(),
                                    Forms\Components\Textarea::make('faq.metadata.faqs.5.answer')->label('Answer')->rows(3)->columnSpanFull(),
                                ]),
                            ]),
                    ])->columnSpanFull(),
                ]),

            // ── 14. FINAL CTA ─────────────────────────────────────
            Forms\Components\Section::make('Final Call-to-Action Banner')
                ->description('The closing blue section at the very bottom of the page.')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('cta_tabs')->tabs([
                        self::contentTab('final_cta'),
                        Forms\Components\Tabs\Tab::make('Buttons')
                            ->icon('heroicon-o-cursor-arrow-rays')
                            ->schema([
                                Forms\Components\Fieldset::make('Button 1')->schema([
                                    Forms\Components\TextInput::make('final_cta.metadata.buttons.0.text')->label('Text'),
                                    Forms\Components\TextInput::make('final_cta.metadata.buttons.0.link')->label('URL'),
                                ])->columns(2),
                                Forms\Components\Fieldset::make('Button 2')->schema([
                                    Forms\Components\TextInput::make('final_cta.metadata.buttons.1.text')->label('Text'),
                                    Forms\Components\TextInput::make('final_cta.metadata.buttons.1.link')->label('URL'),
                                ])->columns(2),
                            ]),
                    ])->columnSpanFull(),
                ]),

        ])->statePath('');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $sections = [
            'hero', 'services_overview', 'medical_claims', 'specialized_agency',
            'trust_ratings', 'tech_expertise', 'pricing_offer', 'dedicated_team',
            'provider_challenges', 'specialty_billing', 'nationwide',
            'testimonials', 'faq', 'final_cta',
        ];

        foreach ($sections as $key) {
            if (!isset($data[$key])) continue;

            $values   = $data[$key];
            $metadata = $values['metadata'] ?? null;
            unset($values['metadata']);

            $update = [];
            foreach (['title','subtitle','content','image_url'] as $field) {
                if (array_key_exists($field, $values)) {
                    $update[$field] = $values[$field];
                }
            }
            if ($metadata !== null) {
                $update['metadata'] = json_encode($metadata);
            }

            if (!empty($update)) {
                PageContent::where('page', 'home')
                    ->where('section', $key)
                    ->update($update);
            }
        }

        Notification::make()
            ->title('Home page saved successfully')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [];
    }
}
