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

class ManageRcmPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-chart-bar';
    protected static ?string $navigationLabel = 'RCM Page';
    protected static ?string $navigationGroup = 'Page Content';
    protected static ?int    $navigationSort  = 6;
    protected static string  $view            = 'filament.pages.manage-rcm-page';

    public array $hero          = [];
    public array $why_choose    = [];
    public array $audit_cta     = [];
    public array $billing_core  = [];
    public array $coding        = [];
    public array $audit_insight = [];
    public array $roi_case_study= [];
    public array $features      = [];
    public array $seal_cracks   = [];
    public array $solutions     = [];
    public array $reporting     = [];
    public array $testimonials  = [];
    public array $specialties   = [];
    public array $faq           = [];

    public static function canAccess(): bool
    {
        return Auth::check() && in_array(Auth::user()->role, ['super_admin', 'admin']);
    }

    public function mount(): void
    {
        $rows = PageContent::where('page', 'rcm')->orderBy('order')->get()->keyBy('section');
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

            Forms\Components\Section::make('Hero — Page Banner')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('h')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('hero.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('hero.content')->label('Description')->toolbarButtons(['bold','italic'])->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Image')->icon('heroicon-o-photo')->schema([
                            Forms\Components\FileUpload::make('hero.image_url')->label('Hero Image')->image()->directory('page-images')->visibility('public')->imagePreviewHeight('160')->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('SEO')->icon('heroicon-o-magnifying-glass')->schema([
                            Forms\Components\TextInput::make('hero.metadata.meta_title')->label('Page Title')->columnSpanFull(),
                            Forms\Components\Textarea::make('hero.metadata.meta_description')->label('Meta Description')->rows(3)->columnSpanFull(),
                            Forms\Components\TextInput::make('hero.metadata.meta_keywords')->label('Keywords')->columnSpanFull(),
                        ]),
                    ])->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Why Choose DBillers RCM')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('wc')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('why_choose.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('why_choose.content')->label('Description')->toolbarButtons(['bold','italic'])->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Image')->icon('heroicon-o-photo')->schema([
                            Forms\Components\FileUpload::make('why_choose.image_url')->label('Section Image')->image()->directory('page-images')->visibility('public')->imagePreviewHeight('160')->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Trust Badges')->icon('heroicon-o-shield-check')->schema([
                            Forms\Components\TextInput::make('why_choose.metadata.badges.0')->label('Badge 1'),
                            Forms\Components\TextInput::make('why_choose.metadata.badges.1')->label('Badge 2'),
                            Forms\Components\TextInput::make('why_choose.metadata.badges.2')->label('Badge 3'),
                            Forms\Components\TextInput::make('why_choose.metadata.badges.3')->label('Badge 4'),
                            Forms\Components\TextInput::make('why_choose.metadata.badges.4')->label('Badge 5'),
                        ])->columns(2),
                    ])->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Audit CTA — Blue Banner')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('ac')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('audit_cta.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\TextInput::make('audit_cta.subtitle')->label('Subheading')->columnSpanFull(),
                        ]),
                    ])->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Billing Core — SmartClaim')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('bc')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('billing_core.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('billing_core.content')->label('Description')->toolbarButtons(['bold','italic'])->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Image')->icon('heroicon-o-photo')->schema([
                            Forms\Components\FileUpload::make('billing_core.image_url')->label('Section Image')->image()->directory('page-images')->visibility('public')->imagePreviewHeight('160')->columnSpanFull(),
                        ]),
                    ])->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Coding Excellence')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('ce')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('coding.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('coding.content')->label('Description')->toolbarButtons(['bold','italic'])->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Image')->icon('heroicon-o-photo')->schema([
                            Forms\Components\FileUpload::make('coding.image_url')->label('Section Image')->image()->directory('page-images')->visibility('public')->imagePreviewHeight('160')->columnSpanFull(),
                        ]),
                    ])->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Audit & Insight')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('ai')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('audit_insight.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('audit_insight.content')->label('Description')->toolbarButtons(['bold','italic'])->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Image')->icon('heroicon-o-photo')->schema([
                            Forms\Components\FileUpload::make('audit_insight.image_url')->label('Section Image')->image()->directory('page-images')->visibility('public')->imagePreviewHeight('160')->columnSpanFull(),
                        ]),
                    ])->columnSpanFull(),
                ]),

            Forms\Components\Section::make('ROI Case Study — Section Heading')
                ->description('Only the section heading is editable. The table data is calculated automatically.')
                ->collapsed()->schema([
                    Forms\Components\TextInput::make('roi_case_study.title')->label('Section Heading')->columnSpanFull(),
                    Forms\Components\TextInput::make('roi_case_study.subtitle')->label('Subheading')->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Seal Cracks — CTA Strip')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('sc')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('seal_cracks.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\TextInput::make('seal_cracks.content')->label('Description')->columnSpanFull(),
                        ]),
                    ])->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Testimonials')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('tm')->tabs([
                        Forms\Components\Tabs\Tab::make('Heading')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('testimonials.title')->label('Section Heading')->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Testimonials')->icon('heroicon-o-chat-bubble-left-right')->schema([
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
                            Forms\Components\Fieldset::make('Testimonial 3')->schema([
                                Forms\Components\TextInput::make('testimonials.metadata.testimonials.2.author')->label('Name'),
                                Forms\Components\TextInput::make('testimonials.metadata.testimonials.2.role')->label('Job Title'),
                                Forms\Components\TextInput::make('testimonials.metadata.testimonials.2.stars')->label('Stars (1–5)')->numeric(),
                                Forms\Components\Textarea::make('testimonials.metadata.testimonials.2.text')->label('Quote')->rows(3)->columnSpanFull(),
                            ])->columns(3),
                        ]),
                    ])->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Specialties We Serve — Tags')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('sp')->tabs([
                        Forms\Components\Tabs\Tab::make('Heading')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('specialties.title')->label('Section Heading')->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Specialties')->icon('heroicon-o-tag')->schema([
                            Forms\Components\TextInput::make('specialties.metadata.specialties.0')->label('1'),
                            Forms\Components\TextInput::make('specialties.metadata.specialties.1')->label('2'),
                            Forms\Components\TextInput::make('specialties.metadata.specialties.2')->label('3'),
                            Forms\Components\TextInput::make('specialties.metadata.specialties.3')->label('4'),
                            Forms\Components\TextInput::make('specialties.metadata.specialties.4')->label('5'),
                            Forms\Components\TextInput::make('specialties.metadata.specialties.5')->label('6'),
                            Forms\Components\TextInput::make('specialties.metadata.specialties.6')->label('7'),
                            Forms\Components\TextInput::make('specialties.metadata.specialties.7')->label('8'),
                            Forms\Components\TextInput::make('specialties.metadata.specialties.8')->label('9'),
                            Forms\Components\TextInput::make('specialties.metadata.specialties.9')->label('10'),
                            Forms\Components\TextInput::make('specialties.metadata.specialties.10')->label('11'),
                            Forms\Components\TextInput::make('specialties.metadata.specialties.11')->label('12'),
                            Forms\Components\TextInput::make('specialties.metadata.specialties.12')->label('13'),
                            Forms\Components\TextInput::make('specialties.metadata.specialties.13')->label('14'),
                            Forms\Components\TextInput::make('specialties.metadata.specialties.14')->label('15'),
                        ])->columns(5),
                    ])->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Frequently Asked Questions')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('fq')->tabs([
                        Forms\Components\Tabs\Tab::make('Heading')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('faq.title')->label('Section Heading')->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Questions 1–4')->icon('heroicon-o-question-mark-circle')->schema([
                            Forms\Components\Fieldset::make('FAQ 1')->schema([
                                Forms\Components\TextInput::make('faq.metadata.faqs.0.q')->label('Question')->columnSpanFull(),
                                Forms\Components\Textarea::make('faq.metadata.faqs.0.a')->label('Answer')->rows(3)->columnSpanFull(),
                            ]),
                            Forms\Components\Fieldset::make('FAQ 2')->schema([
                                Forms\Components\TextInput::make('faq.metadata.faqs.1.q')->label('Question')->columnSpanFull(),
                                Forms\Components\Textarea::make('faq.metadata.faqs.1.a')->label('Answer')->rows(3)->columnSpanFull(),
                            ]),
                            Forms\Components\Fieldset::make('FAQ 3')->schema([
                                Forms\Components\TextInput::make('faq.metadata.faqs.2.q')->label('Question')->columnSpanFull(),
                                Forms\Components\Textarea::make('faq.metadata.faqs.2.a')->label('Answer')->rows(3)->columnSpanFull(),
                            ]),
                            Forms\Components\Fieldset::make('FAQ 4')->schema([
                                Forms\Components\TextInput::make('faq.metadata.faqs.3.q')->label('Question')->columnSpanFull(),
                                Forms\Components\Textarea::make('faq.metadata.faqs.3.a')->label('Answer')->rows(3)->columnSpanFull(),
                            ]),
                        ]),
                        Forms\Components\Tabs\Tab::make('Questions 5–7')->icon('heroicon-o-question-mark-circle')->schema([
                            Forms\Components\Fieldset::make('FAQ 5')->schema([
                                Forms\Components\TextInput::make('faq.metadata.faqs.4.q')->label('Question')->columnSpanFull(),
                                Forms\Components\Textarea::make('faq.metadata.faqs.4.a')->label('Answer')->rows(3)->columnSpanFull(),
                            ]),
                            Forms\Components\Fieldset::make('FAQ 6')->schema([
                                Forms\Components\TextInput::make('faq.metadata.faqs.5.q')->label('Question')->columnSpanFull(),
                                Forms\Components\Textarea::make('faq.metadata.faqs.5.a')->label('Answer')->rows(3)->columnSpanFull(),
                            ]),
                            Forms\Components\Fieldset::make('FAQ 7')->schema([
                                Forms\Components\TextInput::make('faq.metadata.faqs.6.q')->label('Question')->columnSpanFull(),
                                Forms\Components\Textarea::make('faq.metadata.faqs.6.a')->label('Answer')->rows(3)->columnSpanFull(),
                            ]),
                        ]),
                    ])->columnSpanFull(),
                ]),

        ])->statePath('');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $keys = ['hero','why_choose','audit_cta','billing_core','coding','audit_insight',
                 'roi_case_study','features','seal_cracks','solutions','reporting',
                 'testimonials','specialties','faq'];
        foreach ($keys as $key) {
            if (!isset($data[$key])) continue;
            $values = $data[$key]; $metadata = $values['metadata'] ?? null; unset($values['metadata']);
            $update = array_intersect_key($values, array_flip(['title','subtitle','content','image_url']));
            if ($metadata !== null) $update['metadata'] = json_encode($metadata);
            if (!empty($update)) PageContent::where('page','rcm')->where('section',$key)->update($update);
        }
        Notification::make()->title('RCM page saved successfully')->success()->send();
    }

    protected function getFormActions(): array { return []; }
}
