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

class ManageServicesPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-briefcase';
    protected static ?string $navigationLabel = 'Services Page';
    protected static ?string $navigationGroup = 'Page Content';
    protected static ?int    $navigationSort  = 3;
    protected static string  $view            = 'filament.pages.manage-services-page';

    public array $hero          = [];
    public array $core_services = [];
    public array $why_different = [];
    public array $features      = [];
    public array $pricing       = [];
    public array $final_cta     = [];

    public static function canAccess(): bool
    {
        return Auth::check() && in_array(Auth::user()->role, ['super_admin', 'admin']);
    }

    public function mount(): void
    {
        $rows = PageContent::where('page', 'services')->orderBy('order')->get()->keyBy('section');
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
                            Forms\Components\TextInput::make('hero.subtitle')->label('Subheading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('hero.content')->label('Description')->toolbarButtons(['bold','italic'])->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Button')->icon('heroicon-o-cursor-arrow-rays')->schema([
                            Forms\Components\TextInput::make('hero.metadata.button_text')->label('Button Text'),
                            Forms\Components\TextInput::make('hero.metadata.button_link')->label('Button URL'),
                        ])->columns(2),
                        Forms\Components\Tabs\Tab::make('SEO')->icon('heroicon-o-magnifying-glass')->schema([
                            Forms\Components\TextInput::make('hero.metadata.meta_title')->label('Page Title')->columnSpanFull(),
                            Forms\Components\Textarea::make('hero.metadata.meta_description')->label('Meta Description')->rows(3)->columnSpanFull(),
                        ]),
                    ])->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Core Services — What We Do')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('cs')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('core_services.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('core_services.content')->label('Intro Text')->toolbarButtons(['bold','italic'])->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Service Cards')->icon('heroicon-o-squares-2x2')->schema([
                            Forms\Components\Fieldset::make('Card 1')->schema([
                                Forms\Components\TextInput::make('core_services.metadata.services.0.title')->label('Title'),
                                Forms\Components\TextInput::make('core_services.metadata.services.0.link')->label('Link URL'),
                                Forms\Components\Textarea::make('core_services.metadata.services.0.description')->label('Description')->rows(2)->columnSpanFull(),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Card 2')->schema([
                                Forms\Components\TextInput::make('core_services.metadata.services.1.title')->label('Title'),
                                Forms\Components\TextInput::make('core_services.metadata.services.1.link')->label('Link URL'),
                                Forms\Components\Textarea::make('core_services.metadata.services.1.description')->label('Description')->rows(2)->columnSpanFull(),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Card 3')->schema([
                                Forms\Components\TextInput::make('core_services.metadata.services.2.title')->label('Title'),
                                Forms\Components\TextInput::make('core_services.metadata.services.2.link')->label('Link URL'),
                                Forms\Components\Textarea::make('core_services.metadata.services.2.description')->label('Description')->rows(2)->columnSpanFull(),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Card 4')->schema([
                                Forms\Components\TextInput::make('core_services.metadata.services.3.title')->label('Title'),
                                Forms\Components\TextInput::make('core_services.metadata.services.3.link')->label('Link URL'),
                                Forms\Components\Textarea::make('core_services.metadata.services.3.description')->label('Description')->rows(2)->columnSpanFull(),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Card 5')->schema([
                                Forms\Components\TextInput::make('core_services.metadata.services.4.title')->label('Title'),
                                Forms\Components\TextInput::make('core_services.metadata.services.4.link')->label('Link URL'),
                                Forms\Components\Textarea::make('core_services.metadata.services.4.description')->label('Description')->rows(2)->columnSpanFull(),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Card 6')->schema([
                                Forms\Components\TextInput::make('core_services.metadata.services.5.title')->label('Title'),
                                Forms\Components\TextInput::make('core_services.metadata.services.5.link')->label('Link URL'),
                                Forms\Components\Textarea::make('core_services.metadata.services.5.description')->label('Description')->rows(2)->columnSpanFull(),
                            ])->columns(2),
                        ]),
                    ])->columnSpanFull(),
                ]),

            Forms\Components\Section::make('What Makes Us Different')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('wd')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('why_different.title')->label('Heading')->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Image')->icon('heroicon-o-photo')->schema([
                            Forms\Components\FileUpload::make('why_different.image_url')->label('Section Image')->image()->directory('page-images')->visibility('public')->imagePreviewHeight('160')->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Reasons')->icon('heroicon-o-check-circle')->schema([
                            Forms\Components\TextInput::make('why_different.metadata.reasons.0')->label('Reason 1'),
                            Forms\Components\TextInput::make('why_different.metadata.reasons.1')->label('Reason 2'),
                            Forms\Components\TextInput::make('why_different.metadata.reasons.2')->label('Reason 3'),
                            Forms\Components\TextInput::make('why_different.metadata.reasons.3')->label('Reason 4'),
                            Forms\Components\TextInput::make('why_different.metadata.reasons.4')->label('Reason 5'),
                            Forms\Components\TextInput::make('why_different.metadata.reasons.5')->label('Reason 6'),
                        ])->columns(2),
                    ])->columnSpanFull(),
                ]),

            Forms\Components\Section::make("What's Included With Every Service")
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('ft')->tabs([
                        Forms\Components\Tabs\Tab::make('Heading')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('features.title')->label('Heading')->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Feature Cards')->icon('heroicon-o-squares-2x2')->schema([
                            Forms\Components\Fieldset::make('Feature 1')->schema([
                                Forms\Components\TextInput::make('features.metadata.features.0.title')->label('Title'),
                                Forms\Components\TextInput::make('features.metadata.features.0.description')->label('Description'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Feature 2')->schema([
                                Forms\Components\TextInput::make('features.metadata.features.1.title')->label('Title'),
                                Forms\Components\TextInput::make('features.metadata.features.1.description')->label('Description'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Feature 3')->schema([
                                Forms\Components\TextInput::make('features.metadata.features.2.title')->label('Title'),
                                Forms\Components\TextInput::make('features.metadata.features.2.description')->label('Description'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Feature 4')->schema([
                                Forms\Components\TextInput::make('features.metadata.features.3.title')->label('Title'),
                                Forms\Components\TextInput::make('features.metadata.features.3.description')->label('Description'),
                            ])->columns(2),
                        ]),
                    ])->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Pricing')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('pr')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-currency-dollar')->schema([
                            Forms\Components\TextInput::make('pricing.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\TextInput::make('pricing.subtitle')->label('Subheading')->columnSpanFull(),
                            Forms\Components\TextInput::make('pricing.metadata.savings_text')->label('Savings Headline — e.g. "Save 30-40%"')->columnSpanFull(),
                            Forms\Components\TextInput::make('pricing.metadata.savings_subtext')->label('Savings Subtext')->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Button')->icon('heroicon-o-cursor-arrow-rays')->schema([
                            Forms\Components\TextInput::make('pricing.metadata.button_text')->label('Button Text'),
                            Forms\Components\TextInput::make('pricing.metadata.button_link')->label('Button URL'),
                        ])->columns(2),
                    ])->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Final Call-to-Action Banner')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('cta')->tabs([
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
        foreach (['hero','core_services','why_different','features','pricing','final_cta'] as $key) {
            if (!isset($data[$key])) continue;
            $values = $data[$key]; $metadata = $values['metadata'] ?? null; unset($values['metadata']);
            $update = array_intersect_key($values, array_flip(['title','subtitle','content','image_url']));
            if ($metadata !== null) $update['metadata'] = json_encode($metadata);
            if (!empty($update)) PageContent::where('page','services')->where('section',$key)->update($update);
        }
        Notification::make()->title('Services page saved successfully')->success()->send();
    }

    protected function getFormActions(): array { return []; }
}
