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

class ManageSpecialitiesPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-heart';
    protected static ?string $navigationLabel = 'Specialities Page';
    protected static ?string $navigationGroup = 'Page Content';
    protected static ?int    $navigationSort  = 4;
    protected static string  $view            = 'filament.pages.manage-specialities-page';

    public array $hero               = [];
    public array $popular_specialties= [];
    public array $not_listed         = [];
    public array $final_cta          = [];

    public static function canAccess(): bool
    {
        return Auth::check() && in_array(Auth::user()->role, ['super_admin', 'admin']);
    }

    public function mount(): void
    {
        $rows = PageContent::where('page', 'specialities')->orderBy('order')->get()->keyBy('section');
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

            Forms\Components\Section::make('Our Popular Specialties')
                ->description('The grid of specialty cards shown on the page.')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('ps')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('popular_specialties.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\RichEditor::make('popular_specialties.content')->label('Description')->toolbarButtons(['bold','italic'])->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Specialties 1–6')->icon('heroicon-o-heart')->schema([
                            Forms\Components\Fieldset::make('Specialty 1')->schema([
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.0.name')->label('Name'),
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.0.icon')->label('Icon class — e.g. fa-heartbeat'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Specialty 2')->schema([
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.1.name')->label('Name'),
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.1.icon')->label('Icon class'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Specialty 3')->schema([
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.2.name')->label('Name'),
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.2.icon')->label('Icon class'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Specialty 4')->schema([
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.3.name')->label('Name'),
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.3.icon')->label('Icon class'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Specialty 5')->schema([
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.4.name')->label('Name'),
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.4.icon')->label('Icon class'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Specialty 6')->schema([
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.5.name')->label('Name'),
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.5.icon')->label('Icon class'),
                            ])->columns(2),
                        ]),
                        Forms\Components\Tabs\Tab::make('Specialties 7–12')->icon('heroicon-o-heart')->schema([
                            Forms\Components\Fieldset::make('Specialty 7')->schema([
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.6.name')->label('Name'),
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.6.icon')->label('Icon class'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Specialty 8')->schema([
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.7.name')->label('Name'),
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.7.icon')->label('Icon class'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Specialty 9')->schema([
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.8.name')->label('Name'),
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.8.icon')->label('Icon class'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Specialty 10')->schema([
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.9.name')->label('Name'),
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.9.icon')->label('Icon class'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Specialty 11')->schema([
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.10.name')->label('Name'),
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.10.icon')->label('Icon class'),
                            ])->columns(2),
                            Forms\Components\Fieldset::make('Specialty 12')->schema([
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.11.name')->label('Name'),
                                Forms\Components\TextInput::make('popular_specialties.metadata.specialties.11.icon')->label('Icon class'),
                            ])->columns(2),
                        ]),
                    ])->columnSpanFull(),
                ]),

            Forms\Components\Section::make("Specialty Not Listed — Contact Form")
                ->description('The section inviting visitors to submit their specialty.')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('nl')->tabs([
                        Forms\Components\Tabs\Tab::make('Content')->icon('heroicon-o-document-text')->schema([
                            Forms\Components\TextInput::make('not_listed.title')->label('Heading')->columnSpanFull(),
                            Forms\Components\Textarea::make('not_listed.subtitle')->label('Subheading / Description')->rows(3)->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('Button')->icon('heroicon-o-cursor-arrow-rays')->schema([
                            Forms\Components\TextInput::make('not_listed.metadata.button_text')->label('Submit Button Text'),
                            Forms\Components\TextInput::make('not_listed.metadata.button_link')->label('Form Action URL'),
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
        foreach (['hero','popular_specialties','not_listed','final_cta'] as $key) {
            if (!isset($data[$key])) continue;
            $values = $data[$key]; $metadata = $values['metadata'] ?? null; unset($values['metadata']);
            $update = array_intersect_key($values, array_flip(['title','subtitle','content','image_url']));
            if ($metadata !== null) $update['metadata'] = json_encode($metadata);
            if (!empty($update)) PageContent::where('page','specialities')->where('section',$key)->update($update);
        }
        Notification::make()->title('Specialities page saved successfully')->success()->send();
    }

    protected function getFormActions(): array { return []; }
}
