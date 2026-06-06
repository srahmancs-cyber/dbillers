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

class ManageLegalPages extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-scale';
    protected static ?string $navigationLabel = 'Privacy & Terms';
    protected static ?string $navigationGroup = 'Page Content';
    protected static ?int    $navigationSort  = 7;
    protected static string  $view            = 'filament.pages.manage-legal-pages';

    // Privacy sections
    public array $privacy_hero                    = [];
    public array $privacy_DBillers_Privacy_Policy  = [];
    public array $privacy_Scope_Purpose           = [];
    public array $privacy_HIPAA_Compliance        = [];
    public array $privacy_Our_Services            = [];
    public array $privacy_Information_We_Collect  = [];
    public array $privacy_How_We_Use_Information  = [];
    public array $privacy_Data_Security           = [];
    public array $privacy_Contact_Us              = [];

    // Terms sections
    public array $terms_hero                          = [];
    public array $terms_acceptance                    = [];
    public array $terms_services                      = [];
    public array $terms_user_obligations              = [];
    public array $terms_limitation                    = [];
    public array $terms_governing_law                 = [];
    public array $terms_Payments_Pricing              = [];
    public array $terms_DataProtection_HIPAA          = [];
    public array $terms_Working_with_other_plateforms = [];
    public array $terms_Communication                 = [];
    public array $terms_No_Guarantees                 = [];
    public array $terms_Limitation_Liability          = [];
    public array $terms_Service_Suspension            = [];
    public array $terms_Privacy_Matters               = [];
    public array $terms_Need_Assistance               = [];

    public static function canAccess(): bool
    {
        return Auth::check() && Auth::user()->role === 'super_admin';
    }

    public function mount(): void
    {
        $fill = [];

        $privacyRows = PageContent::where('page', 'privacy')->orderBy('order')->get();
        foreach ($privacyRows as $row) {
            $propKey = 'privacy_' . str_replace([' ', '?'], '_', $row->section);
            $fill[$propKey] = [
                'title'   => $row->title   ?? '',
                'subtitle'=> $row->subtitle ?? '',
                'content' => $row->content  ?? '',
            ];
        }

        $termsRows = PageContent::where('page', 'terms')->orderBy('order')->get();
        foreach ($termsRows as $row) {
            $propKey = 'terms_' . str_replace([' ', '?'], '_', $row->section);
            $fill[$propKey] = [
                'title'   => $row->title   ?? '',
                'subtitle'=> $row->subtitle ?? '',
                'content' => $row->content  ?? '',
            ];
        }

        $this->form->fill($fill);
    }

    private static function legalSection(string $propKey, string $label, bool $hasSubtitle = false): Forms\Components\Section
    {
        $schema = [
            Forms\Components\TextInput::make("{$propKey}.title")->label('Heading')->columnSpanFull(),
        ];
        if ($hasSubtitle) {
            $schema[] = Forms\Components\TextInput::make("{$propKey}.subtitle")->label('Date / Subheading')->columnSpanFull();
        }
        $schema[] = Forms\Components\RichEditor::make("{$propKey}.content")
            ->label('Content')
            ->toolbarButtons(['bold','italic','underline','link','bulletList','orderedList'])
            ->columnSpanFull();

        return Forms\Components\Section::make($label)->collapsed()->schema($schema);
    }

    public function form(Form $form): Form
    {
        return $form->schema([

            // ── PRIVACY PAGE ──────────────────────────────────────
            Forms\Components\Section::make('Privacy Policy Page')
                ->description('All sections of the Privacy Policy page. Click a section to expand and edit.')
                ->schema([
                    self::legalSection('privacy_hero', 'Page Header', true),
                    self::legalSection('privacy_DBillers_Privacy_Policy', 'Introduction'),
                    self::legalSection('privacy_Scope_Purpose', 'Scope and Purpose'),
                    self::legalSection('privacy_HIPAA_Compliance', 'HIPAA Compliance'),
                    self::legalSection('privacy_Our_Services', 'Our Services'),
                    self::legalSection('privacy_Information_We_Collect', 'Information We Collect'),
                    self::legalSection('privacy_How_We_Use_Information', 'How We Use Information'),
                    self::legalSection('privacy_Data_Security', 'Data Security'),
                    self::legalSection('privacy_Contact_Us', 'Contact Us'),
                ]),

            // ── TERMS PAGE ────────────────────────────────────────
            Forms\Components\Section::make('Terms & Conditions Page')
                ->description('All sections of the Terms of Service page.')
                ->schema([
                    self::legalSection('terms_hero', 'Page Header', true),
                    self::legalSection('terms_acceptance', 'Introduction / Acceptance'),
                    self::legalSection('terms_services', 'Who We Are'),
                    self::legalSection('terms_user_obligations', 'Using Our Services'),
                    self::legalSection('terms_limitation', 'Accounts & Access'),
                    self::legalSection('terms_governing_law', 'What We Do'),
                    self::legalSection('terms_Payments_Pricing', 'Payments & Pricing'),
                    self::legalSection('terms_DataProtection_HIPAA', 'Data Protection & HIPAA'),
                    self::legalSection('terms_Working_with_other_plateforms', 'Working with Other Platforms'),
                    self::legalSection('terms_Communication', 'Communication (Including SMS)'),
                    self::legalSection('terms_No_Guarantees', 'No Guarantees'),
                    self::legalSection('terms_Limitation_Liability', 'Limitation of Liability'),
                    self::legalSection('terms_Service_Suspension', 'Service Suspension'),
                    self::legalSection('terms_Privacy_Matters', 'Privacy Matters'),
                    self::legalSection('terms_Need_Assistance', 'Need Assistance?'),
                ]),

        ])->statePath('');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $privacySections = [
            'privacy_hero'                    => 'hero',
            'privacy_DBillers_Privacy_Policy' => 'DBillers_Privacy_ Policy',
            'privacy_Scope_Purpose'           => 'Scope_Purpose',
            'privacy_HIPAA_Compliance'        => 'HIPAA_Compliance',
            'privacy_Our_Services'            => 'Our_Services',
            'privacy_Information_We_Collect'  => 'Information_ We_ Collect',
            'privacy_How_We_Use_Information'  => 'How_We_Use_Information',
            'privacy_Data_Security'           => 'Data_Security',
            'privacy_Contact_Us'              => 'Contact_Us',
        ];

        foreach ($privacySections as $propKey => $dbSection) {
            if (!isset($data[$propKey])) continue;
            $update = array_intersect_key($data[$propKey], array_flip(['title','subtitle','content']));
            if (!empty($update)) PageContent::where('page','privacy')->where('section',$dbSection)->update($update);
        }

        $termsSections = [
            'terms_hero'                          => 'hero',
            'terms_acceptance'                    => 'acceptance',
            'terms_services'                      => 'services',
            'terms_user_obligations'              => 'user_obligations',
            'terms_limitation'                    => 'limitation',
            'terms_governing_law'                 => 'governing_law',
            'terms_Payments_Pricing'              => 'Payments_Pricing',
            'terms_DataProtection_HIPAA'          => 'DataProtection_HIPAA',
            'terms_Working_with_other_plateforms' => 'Working_with_other_plateforms',
            'terms_Communication'                 => 'Communication',
            'terms_No_Guarantees'                 => 'No_Guarantees',
            'terms_Limitation_Liability'          => 'Limitation_Liability',
            'terms_Service_Suspension'            => 'Service_Suspension',
            'terms_Privacy_Matters'               => 'Privacy_Matters',
            'terms_Need_Assistance'               => 'Need_Assistance?',
        ];

        foreach ($termsSections as $propKey => $dbSection) {
            if (!isset($data[$propKey])) continue;
            $update = array_intersect_key($data[$propKey], array_flip(['title','subtitle','content']));
            if (!empty($update)) PageContent::where('page','terms')->where('section',$dbSection)->update($update);
        }

        Notification::make()->title('Privacy & Terms saved successfully')->success()->send();
    }

    protected function getFormActions(): array { return []; }
}
