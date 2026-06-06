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

class ManageAboutPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'About Page';
    protected static ?string $navigationGroup = 'Page Content';
    protected static ?int    $navigationSort  = 2;
    protected static string  $view            = 'filament.pages.manage-about-page';

    public array $hero          = [];
    public array $our_story     = [];
    public array $mission       = [];
    public array $team          = [];
    public array $why_choose    = [];
    public array $approach      = [];
    public array $certifications= [];
    public array $final_cta     = [];

    public static function canAccess(): bool
    {
        return Auth::check() && in_array(Auth::user()->role, ['super_admin', 'admin']);
    }

    public function mount(): void
    {
        $rows = PageContent::where('page', 'about')->orderBy('order')->get()->keyBy('section');
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
                ->description('Top section of the About page.')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('hero_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('hero.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\TextInput::make('hero.subtitle')->label('Subheading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('hero.content')->label('Description')->toolbarButtons(['bold','italic','link'])->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Button')->icon('heroicon-o-cursor-arrow-rays')->schema([
                            Forms\Components\TextInput::make('hero.metadata.button_text')->label('Button Text'),
                            Forms\Components\TextInput::make('hero.metadata.button_link')->label('Button URL')->helperText('Example: #team'),
                        ])->columns(2),
                        Forms\Components\Tabs\Tab::make('SEO')->icon('heroicon-o-magnifying-glass')->schema([
                            Forms\Components\TextInput::make('hero.metadata.meta_title')->label('Page Title')->helperText('50–60 characters')->columnSpanFull(),
                            Forms\Components\Textarea::make('hero.metadata.meta_description')->label('Meta Description')->helperText('150–160 characters')->rows(3)->columnSpanFull(),
                        ]),
                    ])->columnSpanFull(),
                ]),

            // ── OUR STORY ─────────────────────────────────────────
            Forms\Components\Section::make('Our Story')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('story_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('our_story.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('our_story.content')->label('Story Text')->toolbarButtons(['bold','italic'])->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Image')->icon('heroicon-o-photo')->schema([
                            Forms\Components\FileUpload::make('our_story.image_url')->label('Section Image')->image()->directory('page-images')->visibility('public')->imagePreviewHeight('160')->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Stats')->icon('heroicon-o-chart-bar')->schema([
                            Forms\Components\Fieldset::make('Stat 1')->schema([
                                Forms\Components\TextInput::make('our_story.metadata.stats.0.value')->label('Value — e.g. 2015'),
                                Forms\Components\TextInput::make('our_story.metadata.stats.0.label')->label('Label — e.g. Founded'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Stat 2')->schema([
                                Forms\Components\TextInput::make('our_story.metadata.stats.1.value')->label('Value'),
                                Forms\Components\TextInput::make('our_story.metadata.stats.1.label')->label('Label'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Stat 3')->schema([
                                Forms\Components\TextInput::make('our_story.metadata.stats.2.value')->label('Value'),
                                Forms\Components\TextInput::make('our_story.metadata.stats.2.label')->label('Label'),
                            ])->columns(2),
                        ]),
                    ])->columnSpanFull(),
                ]),

            // ── MISSION & VALUES ──────────────────────────────────
            Forms\Components\Section::make('Mission & Values')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('mission_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('mission.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('mission.content')->label('Mission Statement (shown in the blue quote box)')->toolbarButtons(['bold','italic'])->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Values Cards')->icon('heroicon-o-star')->schema([
                            Forms\Components\Fieldset::make('Value 1')->schema([
                                Forms\Components\TextInput::make('mission.metadata.values.0.title')->label('Title'),
                                Forms\Components\TextInput::make('mission.metadata.values.0.icon')->label('Icon class'),
                                Forms\Components\TextInput::make('mission.metadata.values.0.description')->label('Description')->columnSpanFull(),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Value 2')->schema([
                                Forms\Components\TextInput::make('mission.metadata.values.1.title')->label('Title'),
                                Forms\Components\TextInput::make('mission.metadata.values.1.icon')->label('Icon class'),
                                Forms\Components\TextInput::make('mission.metadata.values.1.description')->label('Description')->columnSpanFull(),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Value 3')->schema([
                                Forms\Components\TextInput::make('mission.metadata.values.2.title')->label('Title'),
                                Forms\Components\TextInput::make('mission.metadata.values.2.icon')->label('Icon class'),
                                Forms\Components\TextInput::make('mission.metadata.values.2.description')->label('Description')->columnSpanFull(),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Value 4')->schema([
                                Forms\Components\TextInput::make('mission.metadata.values.3.title')->label('Title'),
                                Forms\Components\TextInput::make('mission.metadata.values.3.icon')->label('Icon class'),
                                Forms\Components\TextInput::make('mission.metadata.values.3.description')->label('Description')->columnSpanFull(),
                            ])->columns(2),
                        ]),
                    ])->columnSpanFull(),
                ]),

            // ── TEAM ─────────────────────────────────────────────
            Forms\Components\Section::make('The Experts — Team Stats')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('team_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('team.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('team.content')->label('Description')->toolbarButtons(['bold','italic'])->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Stats')->icon('heroicon-o-chart-bar')->schema([
                            Forms\Components\Fieldset::make('Stat 1')->schema([
                                Forms\Components\TextInput::make('team.metadata.stats.0.value')->label('Value'),
                                Forms\Components\TextInput::make('team.metadata.stats.0.label')->label('Label'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Stat 2')->schema([
                                Forms\Components\TextInput::make('team.metadata.stats.1.value')->label('Value'),
                                Forms\Components\TextInput::make('team.metadata.stats.1.label')->label('Label'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Stat 3')->schema([
                                Forms\Components\TextInput::make('team.metadata.stats.2.value')->label('Value'),
                                Forms\Components\TextInput::make('team.metadata.stats.2.label')->label('Label'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Stat 4')->schema([
                                Forms\Components\TextInput::make('team.metadata.stats.3.value')->label('Value'),
                                Forms\Components\TextInput::make('team.metadata.stats.3.label')->label('Label'),
                            ])->columns(2),
                        ]),
                        Forms\Components\Tabs\Tab::make('Button')->icon('heroicon-o-cursor-arrow-rays')->schema([
                            Forms\Components\TextInput::make('team.metadata.button_text')->label('Button Text'),
                            Forms\Components\TextInput::make('team.metadata.button_link')->label('Button URL'),
                        ])->columns(2),
                    ])->columnSpanFull(),
                ]),

            // ── WHY CHOOSE ────────────────────────────────────────
            Forms\Components\Section::make('Why Providers Trust Us')
                ->description('Two-column checklist of reasons.')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('why_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Heading')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('why_choose.title')->label('Section Heading')->columnSpanFull(),
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
                        ])->columns(2),
                    ])->columnSpanFull(),
                ]),

            // ── APPROACH ─────────────────────────────────────────
            Forms\Components\Section::make('How We Work — Process Steps')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('approach_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Heading')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('approach.title')->label('Section Heading')->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Steps')->icon('heroicon-o-numbered-list')->schema([
                            Forms\Components\Fieldset::make('Step 1')->schema([
                                Forms\Components\TextInput::make('approach.metadata.steps.0.number')->label('Number'),
                                Forms\Components\TextInput::make('approach.metadata.steps.0.title')->label('Title'),
                                Forms\Components\TextInput::make('approach.metadata.steps.0.description')->label('Description')->columnSpanFull(),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Step 2')->schema([
                                Forms\Components\TextInput::make('approach.metadata.steps.1.number')->label('Number'),
                                Forms\Components\TextInput::make('approach.metadata.steps.1.title')->label('Title'),
                                Forms\Components\TextInput::make('approach.metadata.steps.1.description')->label('Description')->columnSpanFull(),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Step 3')->schema([
                                Forms\Components\TextInput::make('approach.metadata.steps.2.number')->label('Number'),
                                Forms\Components\TextInput::make('approach.metadata.steps.2.title')->label('Title'),
                                Forms\Components\TextInput::make('approach.metadata.steps.2.description')->label('Description')->columnSpanFull(),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Step 4')->schema([
                                Forms\Components\TextInput::make('approach.metadata.steps.3.number')->label('Number'),
                                Forms\Components\TextInput::make('approach.metadata.steps.3.title')->label('Title'),
                                Forms\Components\TextInput::make('approach.metadata.steps.3.description')->label('Description')->columnSpanFull(),
                            ])->columns(2),
                        ]),
                    ])->columnSpanFull(),
                ]),

            // ── CERTIFICATIONS ────────────────────────────────────
            Forms\Components\Section::make('Certifications & Accreditations')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('cert_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('certifications.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\TextInput::make('certifications.subtitle')->label('Subheading')->columnSpanFull(),
                            Forms\Components\TextInput::make('certifications.metadata.trust_text')->label('Trust Text (shown at bottom)')->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Badges')->icon('heroicon-o-shield-check')->schema([
                            Forms\Components\TextInput::make('certifications.metadata.badges.0')->label('Badge 1'),
                            Forms\Components\TextInput::make('certifications.metadata.badges.1')->label('Badge 2'),
                            Forms\Components\TextInput::make('certifications.metadata.badges.2')->label('Badge 3'),
                            Forms\Components\TextInput::make('certifications.metadata.badges.3')->label('Badge 4'),
                        ])->columns(2),
                    ])->columnSpanFull(),
                ]),

            // ── FINAL CTA ─────────────────────────────────────────
            Forms\Components\Section::make('Final Call-to-Action Banner')
                ->collapsed()
                ->schema([
                    Forms\Components\Tabs::make('cta_tabs')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('final_cta.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\TextInput::make('final_cta.subtitle')->label('Subheading')->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Buttons')->icon('heroicon-o-cursor-arrow-rays')->schema([
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
        $sections = ['hero','our_story','mission','team','why_choose','approach','certifications','final_cta'];
        foreach ($sections as $key) {
            if (!isset($data[$key])) continue;
            $values = $data[$key];
            $metadata = $values['metadata'] ?? null;
            unset($values['metadata']);
            $update = array_intersect_key($values, array_flip(['title','subtitle','content','image_url']));
            if ($metadata !== null) $update['metadata'] = json_encode($metadata);
            if (!empty($update)) PageContent::where('page','about')->where('section',$key)->update($update);
        }
        Notification::make()->title('About page saved successfully')->success()->send();
    }

    protected function getFormActions(): array { return []; }
}
