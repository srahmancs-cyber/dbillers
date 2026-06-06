@extends('layouts.app')

@section('meta_title', pageContent('mbc', 'hero', 'metadata.meta_title', 'Medical Billing Consulting Services | Expert RCM Consultants | DBillers'))
@section('meta_description', pageContent('mbc', 'hero', 'metadata.meta_description', 'DBillers offers expert medical billing consulting services to optimize your revenue cycle, reduce denials, and maximize reimbursements.'))
@section('meta_keywords', pageContent('mbc', 'hero', 'metadata.meta_keywords', 'medical billing consulting, billing consultant, RCM consulting'))
@section('og_title', pageContent('mbc', 'hero', 'metadata.og_title', 'Medical Billing Consulting | DBillers'))
@section('og_description', pageContent('mbc', 'hero', 'metadata.og_description', 'Expert medical billing consultants helping healthcare providers reduce denials and maximize revenue.'))
@section('og_url', url()->current())
@section('canonical', url()->current())

@section('schema')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "Medical Billing Consulting",
    "provider": { "@type": "Organization", "name": "DBillers", "url": "https://dbillers.com" },
    "description": "Expert medical billing consulting services to optimize revenue cycle, reduce denials, and maximize reimbursements.",
    "url": "https://dbillers.com/medical-billing-consulting",
    "areaServed": "US"
}
</script>
@endsection

@section('content')

<style>
    /* ── MBC page scoped styles ── */
    .mbc-hero-section { padding: 5rem 0 4rem; background: #fff; }
    .mbc-hero-section h1 {
        font-size: clamp(1.875rem, 4vw, 3rem);
        font-weight: 800; color: #1E2A3A;
        line-height: 1.2; letter-spacing: -.02em; margin-bottom: 1.25rem;
    }
    .mbc-hero-subtitle { font-size: 1.125rem; color: #4A5568; line-height: 1.75; margin-bottom: 2rem; max-width: 680px; }

    /* Three pillars */
    .mbc-pillars { display: grid; grid-template-columns: repeat(3,1fr); gap: 1.5rem; }
    .mbc-pillar {
        background: #fff; border-radius: 1rem;
        padding: 1.75rem 1.5rem;
        box-shadow: 0 4px 12px rgba(0,0,0,.06);
        transition: transform .3s, box-shadow .3s;
    }
    .mbc-pillar:hover { transform: translateY(-4px); box-shadow: 0 16px 28px rgba(0,0,0,.1); }
    .mbc-pillar-icon {
        width: 3rem; height: 3rem;
        background: #f0f4f8; border-radius: .75rem;
        display: flex; align-items: center; justify-content: center;
        color: #1A4F8B; font-size: 1.25rem; margin-bottom: 1rem;
    }
    .mbc-pillar h3 { font-size: 1.0625rem; font-weight: 700; color: #1E2A3A; margin-bottom: .625rem; }
    .mbc-pillar p  { font-size: .9rem; color: #4A5568; line-height: 1.6; }

    /* Offerings grid */
    .mbc-offerings { display: grid; grid-template-columns: repeat(3,1fr); gap: 1.5rem; }
    .mbc-offering {
        background: #fff; border-radius: 1rem;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0,0,0,.06);
    }
    .mbc-offering-icon {
        width: 2.5rem; height: 2.5rem;
        background: #f0f4f8; border-radius: .625rem;
        display: flex; align-items: center; justify-content: center;
        color: #1A4F8B; font-size: 1rem; margin-bottom: .875rem;
    }
    .mbc-offering h3 { font-size: .9375rem; font-weight: 700; color: #1E2A3A; margin-bottom: .625rem; }
    .mbc-offering ul { list-style: none; padding: 0; margin: 0; }
    .mbc-offering ul li { font-size: .8125rem; color: #4A5568; padding: .25rem 0; display: flex; gap: .5rem; align-items: flex-start; }
    .mbc-offering ul li::before { content:"✓"; color:#1A4F8B; font-weight:700; flex-shrink:0; margin-top:.05rem; }

    /* Smart billing service cards */
    .mbc-smart-grid { display: grid; grid-template-columns: repeat(2,1fr); gap: 1.5rem; }
    .mbc-smart-card {
        background: #fff; border-radius: 1rem;
        padding: 1.5rem; border-left: 3px solid #1A4F8B;
        box-shadow: 0 4px 12px rgba(0,0,0,.05);
    }
    .mbc-smart-card i { color: #1A4F8B; font-size: 1.5rem; margin-bottom: .75rem; display: block; }
    .mbc-smart-card h3 { font-size: 1rem; font-weight: 700; color: #1E2A3A; margin-bottom: .5rem; }
    .mbc-smart-card p  { font-size: .875rem; color: #4A5568; line-height: 1.6; }

    /* Stats */
    .mbc-stats { display: grid; grid-template-columns: repeat(4,1fr); gap: 1.5rem; }
    .mbc-stat { text-align: center; }
    .mbc-stat-val { font-size: 2.25rem; font-weight: 800; color: #1A4F8B; line-height: 1.2; }
    .mbc-stat-lbl { font-size: .875rem; color: #4A5568; margin-top: .25rem; }

    /* Benefits grid */
    .mbc-benefits { display: grid; grid-template-columns: repeat(3,1fr); gap: 1.25rem; }
    .mbc-benefit {
        background: #fff; border-radius: 1rem;
        padding: 1.25rem;
        box-shadow: 0 4px 12px rgba(0,0,0,.06);
        transition: transform .3s;
    }
    .mbc-benefit:hover { transform: translateY(-3px); }
    .mbc-benefit i { color: #1A4F8B; font-size: 1.5rem; margin-bottom: .625rem; display: block; }
    .mbc-benefit h3 { font-size: .9375rem; font-weight: 700; color: #1E2A3A; margin-bottom: .375rem; }
    .mbc-benefit p  { font-size: .8125rem; color: #4A5568; line-height: 1.6; }

    /* Coding features */
    .mbc-coding-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 1.5rem; }
    .mbc-coding-card {
        background: #fff; border-radius: 1rem;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0,0,0,.06);
        text-align: center;
    }
    .mbc-coding-card i { color: #1A4F8B; font-size: 2rem; margin-bottom: .75rem; display: block; }
    .mbc-coding-card h3 { font-size: 1rem; font-weight: 700; color: #1E2A3A; margin-bottom: .5rem; }
    .mbc-coding-card p  { font-size: .875rem; color: #4A5568; line-height: 1.6; }

    /* Partners */
    .mbc-partners-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 1.5rem; }
    .mbc-partner-card {
        background: #fff; border-radius: 1rem;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0,0,0,.06);
    }
    .mbc-partner-card i { color: #1A4F8B; font-size: 1.5rem; margin-bottom: .75rem; display: block; }
    .mbc-partner-card h3 { font-size: 1rem; font-weight: 700; color: #1E2A3A; margin-bottom: .5rem; }
    .mbc-partner-card p  { font-size: .875rem; color: #4A5568; line-height: 1.6; }

    /* Blue band */
    .mbc-band { background: #1A4F8B; padding: 4rem 0; text-align: center; }
    .mbc-band h2 { color: #fff; font-size: clamp(1.5rem,3vw,2.25rem); margin-bottom: 1rem; }
    .mbc-band p  { color: rgba(255,255,255,.85); font-size: 1.0625rem; margin-bottom: 2rem; }

    /* ── Responsive ── */
    @media (max-width: 1024px) {
        .mbc-pillars    { grid-template-columns: repeat(2,1fr); }
        .mbc-offerings  { grid-template-columns: repeat(2,1fr); }
        .mbc-stats      { grid-template-columns: repeat(2,1fr); }
        .mbc-benefits   { grid-template-columns: repeat(2,1fr); }
        .mbc-coding-grid{ grid-template-columns: repeat(2,1fr); }
        .mbc-partners-grid{ grid-template-columns: repeat(2,1fr); }
    }
    @media (max-width: 767px) {
        .mbc-hero-section { padding: 2.5rem 0 2rem; }
        .mbc-pillars, .mbc-offerings, .mbc-smart-grid,
        .mbc-benefits, .mbc-coding-grid, .mbc-partners-grid { grid-template-columns: 1fr; gap: 1rem; }
        .mbc-stats { grid-template-columns: repeat(2,1fr); gap: 1rem; }
        .mbc-band  { padding: 2.5rem 0; }
    }
</style>

{{-- ── SECTION 1: HERO ── --}}
<section class="mbc-hero-section" data-aos="fade-up">
    <div class="container-custom mx-auto">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-primary font-semibold text-sm uppercase tracking-widest mb-3 block">Medical Billing Consulting</span>
                <h1>{{ pageContent('mbc', 'hero', 'title', 'Medical Billing Consulting Service') }}</h1>
                <div class="mbc-hero-subtitle">{!! pageContent('mbc', 'hero', 'content') !!}</div>
                <a href="/contact" class="btn-primary">Schedule Free Consultation <i class="fas fa-arrow-right"></i></a>
            </div>
            <div data-aos="fade-left">
                @php $img = pageContent('mbc','hero','image_url',''); @endphp
                @if($img)
                    <img src="{{ $img }}" alt="Medical billing consulting" class="rounded-2xl shadow-2xl w-full h-auto">
                @else
                    <div class="bg-gray-100 rounded-2xl shadow-xl w-full h-80 flex flex-col items-center justify-center border-2 border-dashed border-gray-300">
                        <i class="fas fa-headset text-5xl text-primary mb-3 opacity-40"></i>
                        <p class="text-gray-400 text-sm">Upload hero image via Admin</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- ── SECTION 2: THREE PILLARS ── --}}
<section class="bg-light" data-aos="fade-up">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2>{{ pageContent('mbc', 'three_pillars', 'title', 'What Our Consulting Delivers') }}</h2>
            <div class="underline"></div>
        </div>
        <div class="mbc-pillars">
            @php $pillars = pageContent('mbc','three_pillars','metadata.pillars',[]); @endphp
            @foreach($pillars as $i => $pillar)
                <div class="mbc-pillar" data-aos="zoom-in" data-aos-delay="{{ $i * 100 }}">
                    <div class="mbc-pillar-icon"><i class="fas {{ $pillar['icon'] }}"></i></div>
                    <h3>{{ $pillar['title'] }}</h3>
                    <p>{{ $pillar['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── SECTION 3: WHY CHOOSE ── --}}
<section class="bg-white" data-aos="fade-right">
    <div class="container-custom mx-auto">
        <div class="grid md:grid-cols-2 gap-12 items-start">
            <div>
                <span class="text-primary font-semibold text-sm uppercase tracking-widest mb-3 block">{{ pageContent('mbc','why_choose','subtitle','Why Choose Us') }}</span>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ pageContent('mbc','why_choose','title') }}</h2>
                <div class="text-gray-600 leading-relaxed mb-6">{!! pageContent('mbc','why_choose','content') !!}</div>
                <a href="/contact" class="btn-primary">Get Free Consultation <i class="fas fa-arrow-right"></i></a>
            </div>
            <div data-aos="fade-left">
                @php $reasons = pageContent('mbc','why_choose','metadata.reasons',[]); @endphp
                <div class="space-y-3">
                    @foreach($reasons as $i => $reason)
                        <div class="flex items-start gap-3" data-aos="fade-left" data-aos-delay="{{ $i * 40 }}">
                            <i class="fas fa-check-circle text-primary text-lg mt-0.5 flex-shrink-0"></i>
                            <span class="text-gray-700 text-sm leading-relaxed">{{ $reason }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── SECTION 4: WHAT WE OFFER ── --}}
<section class="bg-light" data-aos="fade-up">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2>{{ pageContent('mbc','what_we_offer','subtitle','What Do We Offer') }}</h2>
            <div class="underline"></div>
            <p class="text-gray-600 mt-4 max-w-3xl mx-auto">{{ pageContent('mbc','what_we_offer','title') }}</p>
        </div>
        <div class="text-gray-600 text-center max-w-2xl mx-auto mb-10">{!! pageContent('mbc','what_we_offer','content') !!}</div>
        <div class="mbc-offerings">
            @php $offerings = pageContent('mbc','what_we_offer','metadata.offerings',[]); @endphp
            @foreach($offerings as $i => $offering)
                <div class="mbc-offering" data-aos="zoom-in" data-aos-delay="{{ ($i%3)*100 }}">
                    <div class="mbc-offering-icon"><i class="fas {{ $offering['icon'] }}"></i></div>
                    <h3>{{ $offering['title'] }}</h3>
                    <ul>
                        @foreach($offering['items'] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── SECTION 5: SMART BILLING / ADVISORY ── --}}
<section class="bg-white" data-aos="fade-up">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2>{{ pageContent('mbc','smart_billing','title') }}</h2>
            <div class="underline"></div>
        </div>
        <div class="text-gray-600 text-center max-w-2xl mx-auto mb-10">{!! pageContent('mbc','smart_billing','content') !!}</div>
        <div class="mbc-smart-grid">
            @php $services = pageContent('mbc','smart_billing','metadata.services',[]); @endphp
            @foreach($services as $i => $svc)
                <div class="mbc-smart-card" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <i class="fas {{ $svc['icon'] }}"></i>
                    <h3>{{ $svc['title'] }}</h3>
                    <p>{{ $svc['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── SECTION 6: STATS ── --}}
<section style="background-color:#1A4F8B;" data-aos="zoom-in">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2 class="text-white">{{ pageContent('mbc','stats','title') }}</h2>
            <div class="underline" style="background:#fff;"></div>
        </div>
        <div class="mbc-stats">
            @php $stats = pageContent('mbc','stats','metadata.stats',[]); @endphp
            @foreach($stats as $i => $stat)
                <div class="mbc-stat" data-aos="flip-up" data-aos-delay="{{ $i*150 }}">
                    <div class="mbc-stat-val" style="color:#fff;">{{ $stat['value'] }}</div>
                    <div class="mbc-stat-lbl" style="color:rgba(255,255,255,.8);">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── SECTION 7: DEDICATED CONSULTANT CTA ── --}}
<section class="bg-white" data-aos="fade-up">
    <div class="container-custom mx-auto text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ pageContent('mbc','dedicated_consultant','title') }}</h2>
        <div class="text-gray-600 max-w-2xl mx-auto mb-8">{!! pageContent('mbc','dedicated_consultant','content') !!}</div>
        <a href="/contact" class="btn-primary">Let's Talk <i class="fas fa-arrow-right"></i></a>
    </div>
</section>

{{-- ── SECTION 8: BENEFITS ── --}}
<section class="bg-light" data-aos="fade-up">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2>{{ pageContent('mbc','benefits','title') }}</h2>
            <div class="underline"></div>
        </div>
        <div class="mbc-benefits">
            @php $benefits = pageContent('mbc','benefits','metadata.benefits',[]); @endphp
            @foreach($benefits as $i => $b)
                <div class="mbc-benefit" data-aos="zoom-in" data-aos-delay="{{ ($i%3)*80 }}">
                    <i class="fas {{ $b['icon'] }}"></i>
                    <h3>{{ $b['title'] }}</h3>
                    <p>{{ $b['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── SECTION 9: CODING CONSULTANTS ── --}}
<section class="bg-white" data-aos="fade-up">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <span class="text-primary font-semibold text-sm uppercase tracking-widest block mb-2">{{ pageContent('mbc','coding_consultants','subtitle','Get Fairly Paid Every Time') }}</span>
            <h2>{{ pageContent('mbc','coding_consultants','title') }}</h2>
            <div class="underline"></div>
        </div>
        <div class="text-gray-600 text-center max-w-2xl mx-auto mb-10">{!! pageContent('mbc','coding_consultants','content') !!}</div>
        <div class="mbc-coding-grid">
            @php $features = pageContent('mbc','coding_consultants','metadata.features',[]); @endphp
            @foreach($features as $i => $f)
                <div class="mbc-coding-card" data-aos="flip-up" data-aos-delay="{{ $i*100 }}">
                    <i class="fas {{ $f['icon'] }}"></i>
                    <h3>{{ $f['title'] }}</h3>
                    <p>{{ $f['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── SECTION 10: PARTNERS ── --}}
<section class="bg-light" data-aos="fade-up">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2>{{ pageContent('mbc','partners','title') }}</h2>
            <div class="underline"></div>
        </div>
        <div class="text-gray-600 text-center max-w-2xl mx-auto mb-10">{!! pageContent('mbc','partners','content') !!}</div>
        <div class="mbc-partners-grid">
            @php $pfeatures = pageContent('mbc','partners','metadata.features',[]); @endphp
            @foreach($pfeatures as $i => $pf)
                <div class="mbc-partner-card" data-aos="fade-up" data-aos-delay="{{ $i*100 }}">
                    <i class="fas {{ $pf['icon'] }}"></i>
                    <h3>{{ $pf['title'] }}</h3>
                    <p>{{ $pf['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── SECTION 11: FINAL CTA ── --}}
<section class="mbc-band" data-aos="zoom-in-up">
    <div class="container-custom mx-auto">
        <h2>{{ pageContent('mbc','final_cta','title') }}</h2>
        <div class="text-white/85 max-w-2xl mx-auto mb-8">{!! pageContent('mbc','final_cta','content') !!}</div>
        <a href="/contact" class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition inline-flex items-center gap-2">
            Let's Talk <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

@endsection
