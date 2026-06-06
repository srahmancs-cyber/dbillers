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

class ManageMbcPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-phone';
    protected static ?string $navigationLabel = 'Medical Billing Consulting';
    protected static ?string $navigationGroup = 'Page Content';
    protected static ?int    $navigationSort  = 8;
    protected static string  $view            = 'filament.pages.manage-mbc-page';

    public array $hero                 = [];
    public array $three_pillars        = [];
    public array $why_choose           = [];
    public array $what_we_offer        = [];
    public array $smart_billing        = [];
    public array $stats                = [];
    public array $dedicated_consultant = [];
    public array $benefits             = [];
    public array $coding_consultants   = [];
    public array $partners             = [];
    public array $final_cta            = [];

    public static function canAccess(): bool
    {
        return Auth::check() && in_array(Auth::user()->role, ['super_admin', 'admin']);
    }

    public function mount(): void
    {
        $rows = PageContent::where('page', 'mbc')->orderBy('order')->get()->keyBy('section');
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

    public function form(Form $form): Form
    {
        return $form->schema([

            // ── HERO ──────────────────────────────────────────────
            Forms\Components\Section::make('Hero — Page Banner')
                ->description('Top section with headline, description and hero image.')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('hero_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('hero.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\TextInput::make('hero.subtitle')->label('Subheading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('hero.content')->label('Description')->toolbarButtons(['bold','italic','link','bulletList'])->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Image')->icon('heroicon-o-photo')->schema([
                            Forms\Components\FileUpload::make('hero.image_url')->label('Hero Image')->image()->directory('page-images')->visibility('public')->imagePreviewHeight('160')->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('SEO')->icon('heroicon-o-magnifying-glass')->schema([
                            Forms\Components\TextInput::make('hero.metadata.meta_title')->label('Page Title')->helperText('50–60 characters')->columnSpanFull(),
                            Forms\Components\Textarea::make('hero.metadata.meta_description')->label('Meta Description')->helperText('150–160 characters')->rows(3)->columnSpanFull(),
                            Forms\Components\TextInput::make('hero.metadata.meta_keywords')->label('Keywords')->columnSpanFull(),
                        ]),
                    ])->columnSpanFull(),
                ]),

            // ── THREE PILLARS ─────────────────────────────────────
            Forms\Components\Section::make('Three Pillars — Optimized RCM / Revenue / Claims')
                ->description('The 3 benefit cards shown below the hero.')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('tp_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Heading')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('three_pillars.title')->label('Section Heading')->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Pillar 1')->icon('heroicon-o-square-3-stack-3d')->schema([
                            Forms\Components\TextInput::make('three_pillars.metadata.pillars.0.icon')->label('Icon class — e.g. fa-chart-line'),
                            Forms\Components\TextInput::make('three_pillars.metadata.pillars.0.title')->label('Title'),
                            Forms\Components\Textarea::make('three_pillars.metadata.pillars.0.description')->label('Description')->rows(3)->columnSpanFull(),
                        ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Pillar 2')->icon('heroicon-o-square-3-stack-3d')->schema([
                            Forms\Components\TextInput::make('three_pillars.metadata.pillars.1.icon')->label('Icon class'),
                            Forms\Components\TextInput::make('three_pillars.metadata.pillars.1.title')->label('Title'),
                            Forms\Components\Textarea::make('three_pillars.metadata.pillars.1.description')->label('Description')->rows(3)->columnSpanFull(),
                        ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Pillar 3')->icon('heroicon-o-square-3-stack-3d')->schema([
                            Forms\Components\TextInput::make('three_pillars.metadata.pillars.2.icon')->label('Icon class'),
                            Forms\Components\TextInput::make('three_pillars.metadata.pillars.2.title')->label('Title'),
                            Forms\Components\Textarea::make('three_pillars.metadata.pillars.2.description')->label('Description')->rows(3)->columnSpanFull(),
                        ])->columns(2),
                    ])->columnSpanFull(),
                ]),

            // ── WHY CHOOSE ────────────────────────────────────────
            Forms\Components\Section::make('Why Choose Us')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('wc_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('why_choose.subtitle')->label('Label above heading — e.g. "Why Choose Us"')->columnSpanFull(),
                            Forms\Components\TextInput::make('why_choose.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('why_choose.content')->label('Description')->toolbarButtons(['bold','italic'])->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Reasons')->icon('heroicon-o-check-circle')->schema([
                            Forms\Components\TextInput::make('why_choose.metadata.reasons.0')->label('Reason 1'),
                            Forms\Components\TextInput::make('why_choose.metadata.reasons.1')->label('Reason 2'),
                            Forms\Components\TextInput::make('why_choose.metadata.reasons.2')->label('Reason 3'),
                            Forms\Components\TextInput::make('why_choose.metadata.reasons.3')->label('Reason 4'),
                            Forms\Components\TextInput::make('why_choose.metadata.reasons.4')->label('Reason 5'),
                            Forms\Components\TextInput::make('why_choose.metadata.reasons.5')->label('Reason 6'),
                            Forms\Components\TextInput::make('why_choose.metadata.reasons.6')->label('Reason 7'),
                            Forms\Components\TextInput::make('why_choose.metadata.reasons.7')->label('Reason 8'),
                            Forms\Components\TextInput::make('why_choose.metadata.reasons.8')->label('Reason 9'),
                        ])->columns(1),
                    ])->columnSpanFull(),
                ]),

            // ── WHAT WE OFFER ─────────────────────────────────────
            Forms\Components\Section::make('What We Offer — 5 Service Offerings')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('wo_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('what_we_offer.subtitle')->label('Section Label')->columnSpanFull(),
                            Forms\Components\TextInput::make('what_we_offer.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('what_we_offer.content')->label('Intro Text')->toolbarButtons(['bold','italic'])->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Offering 1')->icon('heroicon-o-squares-2x2')->schema([
                            Forms\Components\TextInput::make('what_we_offer.metadata.offerings.0.icon')->label('Icon class'),
                            Forms\Components\TextInput::make('what_we_offer.metadata.offerings.0.title')->label('Title'),
                            Forms\Components\TextInput::make('what_we_offer.metadata.offerings.0.items.0')->label('Item 1'),
                            Forms\Components\TextInput::make('what_we_offer.metadata.offerings.0.items.1')->label('Item 2'),
                            Forms\Components\TextInput::make('what_we_offer.metadata.offerings.0.items.2')->label('Item 3'),
                            Forms\Components\TextInput::make('what_we_offer.metadata.offerings.0.items.3')->label('Item 4'),
                        ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Offering 2')->icon('heroicon-o-squares-2x2')->schema([
                            Forms\Components\TextInput::make('what_we_offer.metadata.offerings.1.icon')->label('Icon class'),
                            Forms\Components\TextInput::make('what_we_offer.metadata.offerings.1.title')->label('Title'),
                            Forms\Components\TextInput::make('what_we_offer.metadata.offerings.1.items.0')->label('Item 1'),
                            Forms\Components\TextInput::make('what_we_offer.metadata.offerings.1.items.1')->label('Item 2'),
                            Forms\Components\TextInput::make('what_we_offer.metadata.offerings.1.items.2')->label('Item 3'),
                            Forms\Components\TextInput::make('what_we_offer.metadata.offerings.1.items.3')->label('Item 4'),
                            Forms\Components\TextInput::make('what_we_offer.metadata.offerings.1.items.4')->label('Item 5'),
                        ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Offering 3')->icon('heroicon-o-squares-2x2')->schema([
                            Forms\Components\TextInput::make('what_we_offer.metadata.offerings.2.icon')->label('Icon class'),
                            Forms\Components\TextInput::make('what_we_offer.metadata.offerings.2.title')->label('Title'),
                            Forms\Components\TextInput::make('what_we_offer.metadata.offerings.2.items.0')->label('Item 1'),
                            Forms\Components\TextInput::make('what_we_offer.metadata.offerings.2.items.1')->label('Item 2'),
                            Forms\Components\TextInput::make('what_we_offer.metadata.offerings.2.items.2')->label('Item 3'),
                            Forms\Components\TextInput::make('what_we_offer.metadata.offerings.2.items.3')->label('Item 4'),
                        ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Offerings 4 & 5')->icon('heroicon-o-squares-2x2')->schema([
                            Forms\Components\Fieldset::make('Offering 4')->schema([
                                Forms\Components\TextInput::make('what_we_offer.metadata.offerings.3.icon')->label('Icon'),
                                Forms\Components\TextInput::make('what_we_offer.metadata.offerings.3.title')->label('Title'),
                                Forms\Components\TextInput::make('what_we_offer.metadata.offerings.3.items.0')->label('Item 1'),
                                Forms\Components\TextInput::make('what_we_offer.metadata.offerings.3.items.1')->label('Item 2'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Offering 5')->schema([
                                Forms\Components\TextInput::make('what_we_offer.metadata.offerings.4.icon')->label('Icon'),
                                Forms\Components\TextInput::make('what_we_offer.metadata.offerings.4.title')->label('Title'),
                                Forms\Components\TextInput::make('what_we_offer.metadata.offerings.4.items.0')->label('Item 1'),
                                Forms\Components\TextInput::make('what_we_offer.metadata.offerings.4.items.1')->label('Item 2'),
                            ])->columns(2),
                        ]),
                    ])->columnSpanFull(),
                ]),

            // ── SMART BILLING ─────────────────────────────────────
            Forms\Components\Section::make('Smart Billing Advisory — 4 Service Cards')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('sb_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('smart_billing.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('smart_billing.content')->label('Intro Text')->toolbarButtons(['bold','italic'])->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Cards')->icon('heroicon-o-squares-2x2')->schema([
                            Forms\Components\Fieldset::make('Card 1 — Medicare Billing')->schema([
                                Forms\Components\TextInput::make('smart_billing.metadata.services.0.icon')->label('Icon class'),
                                Forms\Components\TextInput::make('smart_billing.metadata.services.0.title')->label('Title'),
                                Forms\Components\Textarea::make('smart_billing.metadata.services.0.description')->label('Description')->rows(3)->columnSpanFull(),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Card 2 — Provider Enrollment')->schema([
                                Forms\Components\TextInput::make('smart_billing.metadata.services.1.icon')->label('Icon class'),
                                Forms\Components\TextInput::make('smart_billing.metadata.services.1.title')->label('Title'),
                                Forms\Components\Textarea::make('smart_billing.metadata.services.1.description')->label('Description')->rows(3)->columnSpanFull(),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Card 3 — Reimbursement Forms')->schema([
                                Forms\Components\TextInput::make('smart_billing.metadata.services.2.icon')->label('Icon class'),
                                Forms\Components\TextInput::make('smart_billing.metadata.services.2.title')->label('Title'),
                                Forms\Components\Textarea::make('smart_billing.metadata.services.2.description')->label('Description')->rows(3)->columnSpanFull(),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Card 4 — EHR Adoption')->schema([
                                Forms\Components\TextInput::make('smart_billing.metadata.services.3.icon')->label('Icon class'),
                                Forms\Components\TextInput::make('smart_billing.metadata.services.3.title')->label('Title'),
                                Forms\Components\Textarea::make('smart_billing.metadata.services.3.description')->label('Description')->rows(3)->columnSpanFull(),
                            ])->columns(2),
                        ]),
                    ])->columnSpanFull(),
                ]),

            // ── STATS ─────────────────────────────────────────────
            Forms\Components\Section::make('Stats — Blue Banner with 4 Numbers')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('st_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Heading')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('stats.title')->label('Section Heading')->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Numbers')->icon('heroicon-o-chart-bar')->schema([
                            Forms\Components\Fieldset::make('Stat 1')->schema([
                                Forms\Components\TextInput::make('stats.metadata.stats.0.value')->label('Value — e.g. 97.35%'),
                                Forms\Components\TextInput::make('stats.metadata.stats.0.label')->label('Label — e.g. Claim Approval'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Stat 2')->schema([
                                Forms\Components\TextInput::make('stats.metadata.stats.1.value')->label('Value'),
                                Forms\Components\TextInput::make('stats.metadata.stats.1.label')->label('Label'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Stat 3')->schema([
                                Forms\Components\TextInput::make('stats.metadata.stats.2.value')->label('Value'),
                                Forms\Components\TextInput::make('stats.metadata.stats.2.label')->label('Label'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Stat 4')->schema([
                                Forms\Components\TextInput::make('stats.metadata.stats.3.value')->label('Value'),
                                Forms\Components\TextInput::make('stats.metadata.stats.3.label')->label('Label'),
                            ])->columns(2),
                        ]),
                    ])->columnSpanFull(),
                ]),

            // ── DEDICATED CONSULTANT CTA ──────────────────────────
            Forms\Components\Section::make('Dedicated Consultant CTA')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('dc_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('dedicated_consultant.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('dedicated_consultant.content')->label('Description')->toolbarButtons(['bold','italic'])->columnSpanFull(),
                        ]),
                    ])->columnSpanFull(),
                ]),

            // ── BENEFITS ─────────────────────────────────────────
            Forms\Components\Section::make('Benefits — 9 Feature Cards')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('bn_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Heading')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('benefits.title')->label('Section Heading')->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Cards 1–5')->icon('heroicon-o-squares-2x2')->schema([
                            Forms\Components\Fieldset::make('Card 1')->schema([
                                Forms\Components\TextInput::make('benefits.metadata.benefits.0.title')->label('Title'),
                                Forms\Components\TextInput::make('benefits.metadata.benefits.0.description')->label('Description'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Card 2')->schema([
                                Forms\Components\TextInput::make('benefits.metadata.benefits.1.title')->label('Title'),
                                Forms\Components\TextInput::make('benefits.metadata.benefits.1.description')->label('Description'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Card 3')->schema([
                                Forms\Components\TextInput::make('benefits.metadata.benefits.2.title')->label('Title'),
                                Forms\Components\TextInput::make('benefits.metadata.benefits.2.description')->label('Description'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Card 4')->schema([
                                Forms\Components\TextInput::make('benefits.metadata.benefits.3.title')->label('Title'),
                                Forms\Components\TextInput::make('benefits.metadata.benefits.3.description')->label('Description'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Card 5')->schema([
                                Forms\Components\TextInput::make('benefits.metadata.benefits.4.title')->label('Title'),
                                Forms\Components\TextInput::make('benefits.metadata.benefits.4.description')->label('Description'),
                            ])->columns(2),
                        ]),
                        Forms\Components\Tabs\Tab::make('Cards 6–9')->icon('heroicon-o-squares-2x2')->schema([
                            Forms\Components\Fieldset::make('Card 6')->schema([
                                Forms\Components\TextInput::make('benefits.metadata.benefits.5.title')->label('Title'),
                                Forms\Components\TextInput::make('benefits.metadata.benefits.5.description')->label('Description'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Card 7')->schema([
                                Forms\Components\TextInput::make('benefits.metadata.benefits.6.title')->label('Title'),
                                Forms\Components\TextInput::make('benefits.metadata.benefits.6.description')->label('Description'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Card 8')->schema([
                                Forms\Components\TextInput::make('benefits.metadata.benefits.7.title')->label('Title'),
                                Forms\Components\TextInput::make('benefits.metadata.benefits.7.description')->label('Description'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Card 9')->schema([
                                Forms\Components\TextInput::make('benefits.metadata.benefits.8.title')->label('Title'),
                                Forms\Components\TextInput::make('benefits.metadata.benefits.8.description')->label('Description'),
                            ])->columns(2),
                        ]),
                    ])->columnSpanFull(),
                ]),

            // ── CODING CONSULTANTS ────────────────────────────────
            Forms\Components\Section::make('Coding Consultants — 3 Feature Cards')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('cc_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('coding_consultants.subtitle')->label('Label above heading')->columnSpanFull(),
                            Forms\Components\TextInput::make('coding_consultants.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('coding_consultants.content')->label('Description')->toolbarButtons(['bold','italic'])->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Cards')->icon('heroicon-o-squares-2x2')->schema([
                            Forms\Components\Fieldset::make('Card 1 — Claim Scrubbing')->schema([
                                Forms\Components\TextInput::make('coding_consultants.metadata.features.0.icon')->label('Icon class'),
                                Forms\Components\TextInput::make('coding_consultants.metadata.features.0.title')->label('Title'),
                                Forms\Components\Textarea::make('coding_consultants.metadata.features.0.description')->label('Description')->rows(3)->columnSpanFull(),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Card 2 — KBA')->schema([
                                Forms\Components\TextInput::make('coding_consultants.metadata.features.1.icon')->label('Icon class'),
                                Forms\Components\TextInput::make('coding_consultants.metadata.features.1.title')->label('Title'),
                                Forms\Components\Textarea::make('coding_consultants.metadata.features.1.description')->label('Description')->rows(3)->columnSpanFull(),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Card 3 — Account Management')->schema([
                                Forms\Components\TextInput::make('coding_consultants.metadata.features.2.icon')->label('Icon class'),
                                Forms\Components\TextInput::make('coding_consultants.metadata.features.2.title')->label('Title'),
                                Forms\Components\Textarea::make('coding_consultants.metadata.features.2.description')->label('Description')->rows(3)->columnSpanFull(),
                            ])->columns(2),
                        ]),
                    ])->columnSpanFull(),
                ]),

            // ── PARTNERS ─────────────────────────────────────────
            Forms\Components\Section::make("Partners in Success — 3 Feature Cards")
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('pr_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('partners.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('partners.content')->label('Description')->toolbarButtons(['bold','italic'])->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Cards')->icon('heroicon-o-squares-2x2')->schema([
                            Forms\Components\Fieldset::make('Card 1 — 24/7 Support')->schema([
                                Forms\Components\TextInput::make('partners.metadata.features.0.icon')->label('Icon class'),
                                Forms\Components\TextInput::make('partners.metadata.features.0.title')->label('Title'),
                                Forms\Components\Textarea::make('partners.metadata.features.0.description')->label('Description')->rows(3)->columnSpanFull(),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Card 2 — Out of State Medicaid')->schema([
                                Forms\Components\TextInput::make('partners.metadata.features.1.icon')->label('Icon class'),
                                Forms\Components\TextInput::make('partners.metadata.features.1.title')->label('Title'),
                                Forms\Components\Textarea::make('partners.metadata.features.1.description')->label('Description')->rows(3)->columnSpanFull(),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Card 3 — Clearinghouse Support')->schema([
                                Forms\Components\TextInput::make('partners.metadata.features.2.icon')->label('Icon class'),
                                Forms\Components\TextInput::make('partners.metadata.features.2.title')->label('Title'),
                                Forms\Components\Textarea::make('partners.metadata.features.2.description')->label('Description')->rows(3)->columnSpanFull(),
                            ])->columns(2),
                        ]),
                    ])->columnSpanFull(),
                ]),

            // ── FINAL CTA ─────────────────────────────────────────
            Forms\Components\Section::make('Final Call-to-Action Banner')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('cta_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('final_cta.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('final_cta.content')->label('Description')->toolbarButtons(['bold','italic'])->columnSpanFull(),
                        ]),
                    ])->columnSpanFull(),
                ]),

        ])->statePath('');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $sections = [
            'hero','three_pillars','why_choose','what_we_offer','smart_billing',
            'stats','dedicated_consultant','benefits','coding_consultants',
            'partners','final_cta',
        ];

        foreach ($sections as $key) {
            if (!isset($data[$key])) continue;
            $values   = $data[$key];
            $metadata = $values['metadata'] ?? null;
            unset($values['metadata']);
            $update = array_intersect_key($values, array_flip(['title','subtitle','content','image_url']));
            if ($metadata !== null) $update['metadata'] = json_encode($metadata);
            if (!empty($update)) {
                PageContent::where('page','mbc')->where('section',$key)->update($update);
            }
        }

        Notification::make()->title('Medical Billing Consulting page saved')->success()->send();
    }

    protected function getFormActions(): array { return []; }
}
