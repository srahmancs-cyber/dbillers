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

class ManageContactPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Contact Page';
    protected static ?string $navigationGroup = 'Page Content';
    protected static ?int    $navigationSort  = 5;
    protected static string  $view            = 'filament.pages.manage-contact-page';

    public array $hero = [];
    public array $info = [];

    public static function canAccess(): bool
    {
        return Auth::check() && in_array(Auth::user()->role, ['super_admin', 'admin']);
    }

    public function mount(): void
    {
        $rows = PageContent::where('page', 'contact')->orderBy('order')->get()->keyBy('section');
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
                            Forms\Components\RichEditor::make('hero.content')->label('Description Paragraph')->toolbarButtons(['bold','italic'])->columnSpanFull(),
                        ]),
                        Forms\Components\Tabs\Tab::make('SEO')->icon('heroicon-o-magnifying-glass')->schema([
                            Forms\Components\TextInput::make('hero.metadata.meta_title')->label('Page Title')->columnSpanFull(),
                            Forms\Components\Textarea::make('hero.metadata.meta_description')->label('Meta Description')->rows(3)->columnSpanFull(),
                        ]),
                    ])->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Contact Information')
                ->description('Phone, email, address, and hours shown on the right side of the contact page.')
                ->collapsed()->schema([
                    Forms\Components\Tabs::make('i')->tabs([
                        Forms\Components\Tabs\Tab::make('Details')->icon('heroicon-o-phone')->schema([
                            Forms\Components\TextInput::make('info.title')->label('Section Heading — e.g. "Get in Touch"')->columnSpanFull(),
                            Forms\Components\TextInput::make('info.metadata.phone')
                                ->label('Phone Number')
                                ->helperText('Example: +1 (727) 350-2535'),
                            Forms\Components\TextInput::make('info.metadata.email')
                                ->label('Email Address')
                                ->helperText('Example: billing@dbillers.com'),
                            Forms\Components\TextInput::make('info.metadata.hours')
                                ->label('Business Hours')
                                ->helperText('Example: Monday - Friday: 9AM - 6PM EST'),
                            Forms\Components\Textarea::make('info.metadata.address')
                                ->label('Office Address')
                                ->rows(2)
                                ->columnSpanFull(),
                        ])->columns(2),
                    ])->columnSpanFull(),
                ]),

        ])->statePath('');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        foreach (['hero','info'] as $key) {
            if (!isset($data[$key])) continue;
            $values = $data[$key]; $metadata = $values['metadata'] ?? null; unset($values['metadata']);
            $update = array_intersect_key($values, array_flip(['title','subtitle','content','image_url']));
            if ($metadata !== null) $update['metadata'] = json_encode($metadata);
            if (!empty($update)) PageContent::where('page','contact')->where('section',$key)->update($update);
        }
        Notification::make()->title('Contact page saved successfully')->success()->send();
    }

    protected function getFormActions(): array { return []; }
}
