@extends('layouts.app')

@section('meta_title', pageContent('rcm', 'hero', 'metadata.meta_title', 'Revenue Cycle Management Services | RCM Billing | DBillers'))
@section('meta_description', pageContent('rcm', 'hero', 'metadata.meta_description', 'DBillers offers complete end-to-end Revenue Cycle Management (RCM) services — billing, coding, denial management, and AR recovery for US healthcare providers.'))
@section('meta_keywords', pageContent('rcm', 'hero', 'metadata.meta_keywords', 'revenue cycle management, RCM services, medical billing RCM, healthcare RCM, RCM billing company'))
@section('og_title', pageContent('rcm', 'hero', 'metadata.og_title', 'Revenue Cycle Management | DBillers'))
@section('og_description', pageContent('rcm', 'hero', 'metadata.og_description', 'Complete RCM solutions for US healthcare providers. Billing, coding, collections, and denial management.'))
@section('og_url', url()->current())
@section('canonical', url()->current())

@section('schema')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "Revenue Cycle Management",
    "provider": { "@type": "Organization", "name": "DBillers", "url": "https://dbillers.com" },
    "description": "End-to-end Revenue Cycle Management services including medical billing, coding, denial management, and AR recovery for US healthcare providers.",
    "url": "https://dbillers.com/revenue-cycle-management",
    "areaServed": "US"
}
</script>
@endsection

@section('content')

{{-- ══════════════════════════════════════════
     SCOPED STYLES
══════════════════════════════════════════ --}}
<style>
    /* RCM Hero */
    .rcm-hero { padding: 5rem 0 4rem; background: #fff; }
    .rcm-hero h1 {
        font-size: clamp(1.875rem, 4vw, 3rem);
        font-weight: 800;
        color: #1E2A3A;
        line-height: 1.2;
        letter-spacing: -.02em;
        margin-bottom: 1.25rem;
    }
    .rcm-hero .rcm-subtitle {
        font-size: 1.125rem;
        color: #4A5568;
        line-height: 1.75;
        margin-bottom: 2rem;
        max-width: 680px;
    }

    /* Feature cards grid */
    .rcm-features-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }
    .rcm-feature-card {
        background: #fff;
        border-radius: 1rem;
        padding: 1.75rem 1.5rem;
        box-shadow: 0 4px 12px rgba(0,0,0,.06);
        transition: transform .3s, box-shadow .3s;
    }
    .rcm-feature-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 28px rgba(0,0,0,.1);
    }
    .rcm-feature-card .rcm-feature-icon {
        width: 3rem; height: 3rem;
        background: #f0f4f8;
        border-radius: .75rem;
        display: flex; align-items: center; justify-content: center;
        color: #1A4F8B;
        font-size: 1.25rem;
        margin-bottom: 1rem;
    }
    .rcm-feature-card h3 {
        font-size: 1rem;
        font-weight: 700;
        color: #1E2A3A;
        margin-bottom: .625rem;
    }
    .rcm-feature-card ul {
        list-style: none;
        padding: 0; margin: 0;
    }
    .rcm-feature-card ul li {
        font-size: .875rem;
        color: #4A5568;
        padding: .25rem 0;
        display: flex;
        align-items: flex-start;
        gap: .5rem;
    }
    .rcm-feature-card ul li::before {
        content: "✓";
        color: #1A4F8B;
        font-weight: 700;
        flex-shrink: 0;
        margin-top: .05rem;
    }

    /* ROI table */
    .rcm-roi-table { width: 100%; border-collapse: collapse; }
    .rcm-roi-table th {
        background: #1A4F8B;
        color: #fff;
        padding: .875rem 1.25rem;
        text-align: left;
        font-size: .875rem;
        font-weight: 600;
    }
    .rcm-roi-table td {
        padding: .875rem 1.25rem;
        border-bottom: 1px solid #e2e8f0;
        font-size: .875rem;
        color: #374151;
    }
    .rcm-roi-table tr:last-child td { border-bottom: none; }
    .rcm-roi-table tr:nth-child(even) td { background: #f8fafc; }
    .rcm-roi-table td.highlight { color: #16a34a; font-weight: 700; }
    .rcm-roi-table-wrap { overflow-x: auto; -webkit-overflow-scrolling: touch; border-radius: 1rem; box-shadow: 0 4px 12px rgba(0,0,0,.06); }

    /* Solutions table */
    .rcm-solutions-table { width: 100%; border-collapse: collapse; }
    .rcm-solutions-table th {
        background: #1E2A3A;
        color: #fff;
        padding: .875rem 1.25rem;
        text-align: left;
        font-size: .875rem;
        font-weight: 600;
    }
    .rcm-solutions-table th:first-child { width: 35%; }
    .rcm-solutions-table td {
        padding: 1rem 1.25rem;
        border-bottom: 1px solid #e2e8f0;
        font-size: .875rem;
        color: #374151;
        vertical-align: top;
    }
    .rcm-solutions-table tr:last-child td { border-bottom: none; }
    .rcm-solutions-table tr:nth-child(even) td { background: #f8fafc; }
    .rcm-solutions-table td:first-child { font-weight: 600; color: #dc2626; }
    .rcm-solutions-table td:last-child { color: #374151; }
    .rcm-solutions-wrap { overflow-x: auto; -webkit-overflow-scrolling: touch; border-radius: 1rem; box-shadow: 0 4px 12px rgba(0,0,0,.06); }

    /* Reporting cards */
    .rcm-reporting-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }
    .rcm-reporting-card {
        background: #fff;
        border-radius: 1rem;
        padding: 1.75rem;
        box-shadow: 0 4px 12px rgba(0,0,0,.06);
        border-top: 3px solid #1A4F8B;
    }
    .rcm-reporting-card h3 {
        font-size: 1rem;
        font-weight: 700;
        color: #1E2A3A;
        margin-bottom: .625rem;
    }
    .rcm-reporting-card p { font-size: .875rem; color: #4A5568; line-height: 1.6; }

    /* FAQ */
    .rcm-faq-item { border-bottom: 1px solid #e2e8f0; }
    .rcm-faq-question {
        font-weight: 700;
        color: #1E2A3A;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.125rem 0;
        font-size: 1rem;
        gap: 1rem;
    }
    .rcm-faq-question i { color: #1A4F8B; flex-shrink: 0; transition: transform .3s; }
    .rcm-faq-answer { display: none; padding-bottom: 1rem; color: #4A5568; line-height: 1.7; font-size: .9375rem; }
    .rcm-faq-item.active .rcm-faq-answer { display: block; }
    .rcm-faq-item.active .rcm-faq-question i { transform: rotate(45deg); }

    /* Specialties tags */
    .rcm-specialties { display: flex; flex-wrap: wrap; gap: .625rem; justify-content: center; }
    .rcm-spec-tag {
        background: #f0f4f8;
        color: #1A4F8B;
        padding: .5rem 1rem;
        border-radius: 2rem;
        font-size: .875rem;
        font-weight: 500;
        transition: background .2s, color .2s;
    }
    .rcm-spec-tag:hover { background: #1A4F8B; color: #fff; }

    /* Blue CTA band */
    .rcm-band {
        background: #1A4F8B;
        padding: 4rem 0;
        text-align: center;
    }
    .rcm-band h2 { color: #fff; font-size: clamp(1.5rem, 3vw, 2.25rem); margin-bottom: 1rem; }
    .rcm-band p { color: rgba(255,255,255,.85); font-size: 1.0625rem; margin-bottom: 2rem; }

    /* Inline CTA strip */
    .rcm-cta-strip {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        justify-content: center;
        align-items: center;
    }

    /* ── Responsive ── */
    @media (max-width: 1024px) {
        .rcm-features-grid  { grid-template-columns: repeat(2, 1fr); }
        .rcm-reporting-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 767px) {
        .rcm-hero { padding: 2.5rem 0 2rem; }
        .rcm-features-grid  { grid-template-columns: 1fr; gap: 1rem; }
        .rcm-reporting-grid { grid-template-columns: 1fr; gap: 1rem; }
        .rcm-roi-table th, .rcm-roi-table td,
        .rcm-solutions-table th, .rcm-solutions-table td { padding: .625rem .875rem; }
        .rcm-band { padding: 2.5rem 0; }
        .rcm-cta-strip { flex-direction: column; }
        .rcm-cta-strip .btn-primary,
        .rcm-cta-strip .btn-secondary { width: 100%; justify-content: center; }
    }
</style>

{{-- ══════════════════════════════════════════
     SECTION 1: HERO
══════════════════════════════════════════ --}}
<section class="rcm-hero" data-aos="fade-up">
    <div class="container-custom mx-auto">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-primary font-semibold text-sm uppercase tracking-widest mb-3 block">Revenue Cycle Management</span>
                <h1>{{ pageContent('rcm', 'hero', 'title', 'Healthcare Revenue Cycle Management Services') }}</h1>
                <p class="rcm-subtitle">{!! pageContent('rcm', 'hero', 'content', 'DBillers Medical Revenue Service generates and collects payments for the services a provider delivers to their patients. A complete RCM solution managing end-to-end operations: patient registration, insurance verification, coding, billing, and collections.') !!}</p>
                <a href="/contact" class="btn-primary">Request Free RCM Consultancy <i class="fas fa-arrow-right"></i></a>
            </div>
            <div data-aos="fade-left">
                @php $heroImg = pageContent('rcm', 'hero', 'image_url', ''); @endphp
                @if($heroImg)
                    <img src="{{ $heroImg }}" alt="Revenue cycle management services" class="rounded-2xl shadow-2xl w-full h-auto">
                @else
                    <div class="bg-gray-100 rounded-2xl shadow-xl w-full h-80 flex flex-col items-center justify-center border-2 border-dashed border-gray-300">
                        <i class="fas fa-chart-line text-5xl text-primary mb-3 opacity-40"></i>
                        <p class="text-gray-400 text-sm">Upload hero image via Admin</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SECTION 2: WHY CHOOSE
══════════════════════════════════════════ --}}
<section class="bg-light" data-aos="fade-up">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2>{{ pageContent('rcm', 'why_choose', 'title', 'Importance of Choosing DBillers Revenue Cycle Management Service') }}</h2>
            <div class="underline"></div>
        </div>
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="text-gray-600 leading-relaxed space-y-4">
                {!! pageContent('rcm', 'why_choose', 'content', '<p>Managing a medical practice\'s finances is complex. Between evolving regulations, strict insurance policies, and patients with ever-increasing expectations, it is a recipe for revenue leakage, cash flow problems, and operational chaos.</p><p>The medical revenue cycle management (RCM) experts at DBillers can restore your practice to full financial health. Our certified coders ensure accurate billing and coding to stop revenue leakage. Our enrollment specialists secure contracts with top commercial payers to expand your patient pool.</p>') !!}
                <div class="flex flex-wrap gap-3 pt-2">
                    @php $badges = pageContent('rcm', 'why_choose', 'metadata.badges', ['Certified Coders', 'HIPAA Compliant', 'US-Based Team', '99% Clean Claim Rate']); @endphp
                    @foreach($badges as $badge)
                        <span class="inline-flex items-center gap-2 bg-white border border-gray-200 px-3 py-1.5 rounded-full text-sm font-medium text-gray-700 shadow-sm">
                            <i class="fas fa-check-circle text-primary text-xs"></i> {{ $badge }}
                        </span>
                    @endforeach
                </div>
            </div>
            <div data-aos="fade-left">
                @php $img = pageContent('rcm', 'why_choose', 'image_url', ''); @endphp
                @if($img)
                    <img src="{{ $img }}" alt="DBillers RCM team" class="rounded-2xl shadow-xl w-full h-auto">
                @else
                    <div class="bg-white rounded-2xl shadow-xl w-full h-72 flex items-center justify-center border-2 border-dashed border-gray-200">
                        <i class="fas fa-users text-5xl text-gray-300"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SECTION 3: AUDIT CTA BAND
══════════════════════════════════════════ --}}
<section class="rcm-band" data-aos="zoom-in">
    <div class="container-custom mx-auto">
        <h2>{{ pageContent('rcm', 'audit_cta', 'title', 'You are a professional in your field. But are you getting paid like one?') }}</h2>
        <p>{{ pageContent('rcm', 'audit_cta', 'subtitle', 'We help practices achieve record revenue growth of up to 30%. Claim your FREE practice audit to learn more.') }}</p>
        <a href="/contact" class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition inline-flex items-center gap-2">
            Claim Free Revenue Cycle Audit <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SECTION 4: SMARTCLAIM / BILLING CORE
══════════════════════════════════════════ --}}
<section class="bg-white" data-aos="fade-right">
    <div class="container-custom mx-auto">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                @php $img = pageContent('rcm', 'billing_core', 'image_url', ''); @endphp
                @if($img)
                    <img src="{{ $img }}" alt="SmartClaim billing technology" class="rounded-2xl shadow-xl w-full h-auto">
                @else
                    <div class="bg-gray-100 rounded-2xl shadow-xl w-full h-72 flex items-center justify-center border-2 border-dashed border-gray-200">
                        <i class="fas fa-bolt text-5xl text-gray-300"></i>
                    </div>
                @endif
            </div>
            <div data-aos="fade-left">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ pageContent('rcm', 'billing_core', 'title', 'DBillers offers revenue cycle care, with billing at its core') }}</h2>
                <div class="text-gray-600 leading-relaxed mb-6">
                    {!! pageContent('rcm', 'billing_core', 'content', 'Our unique approach to medical billing is how DBillers RCM Service delivers measurable improvements to the revenue cycle process. The SmartClaim system analyzes billing codes and clinical documentation to catch issues before claim submission, achieving first-time acceptance rates upwards of 98%.') !!}
                </div>
                <a href="/contact" class="btn-primary">Book DBillers Medical Billing RCM Service <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SECTION 5: CODING EXCELLENCE
══════════════════════════════════════════ --}}
<section class="bg-light" data-aos="fade-left">
    <div class="container-custom mx-auto">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ pageContent('rcm', 'coding', 'title', 'Achieve revenue cycle success via DBillers coding excellence') }}</h2>
                <div class="text-gray-600 leading-relaxed mb-6">
                    {!! pageContent('rcm', 'coding', 'content', 'DBillers\' medical revenue service boosts revenue cycles through expert medical coding. Our DBCoding technology reviews medical charts and identifies high-value codes. Our CPC-certified coders examine each chart to find revenue escalation opportunities that algorithms miss.') !!}
                </div>
                <a href="/contact" class="btn-primary">Book DBillers Medical Coding RCM Service <i class="fas fa-arrow-right"></i></a>
            </div>
            <div data-aos="fade-left">
                @php $img = pageContent('rcm', 'coding', 'image_url', ''); @endphp
                @if($img)
                    <img src="{{ $img }}" alt="Medical coding excellence" class="rounded-2xl shadow-xl w-full h-auto">
                @else
                    <div class="bg-white rounded-2xl shadow-xl w-full h-72 flex items-center justify-center border-2 border-dashed border-gray-200">
                        <i class="fas fa-code text-5xl text-gray-300"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SECTION 6: AUDIT & INSIGHT
══════════════════════════════════════════ --}}
<section class="bg-white" data-aos="fade-up">
    <div class="container-custom mx-auto">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                @php $img = pageContent('rcm', 'audit_insight', 'image_url', ''); @endphp
                @if($img)
                    <img src="{{ $img }}" alt="Revenue cycle audit" class="rounded-2xl shadow-xl w-full h-auto">
                @else
                    <div class="bg-gray-100 rounded-2xl shadow-xl w-full h-72 flex items-center justify-center border-2 border-dashed border-gray-200">
                        <i class="fas fa-magnifying-glass-chart text-5xl text-gray-300"></i>
                    </div>
                @endif
            </div>
            <div data-aos="fade-left">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ pageContent('rcm', 'audit_insight', 'title', 'Optimize your revenue via DBillers\' audit and insight') }}</h2>
                <div class="text-gray-600 leading-relaxed mb-6">
                    {!! pageContent('rcm', 'audit_insight', 'content', 'Our audit specialists utilize the DBillers Revenue Integrity process to analyze your current revenue cycle, uncovering exactly where coding and billing improvements will have the biggest impact. We treat your revenue cycle as a whole and prescribe the best healthcare RCM remedies.') !!}
                </div>
                <a href="/contact" class="btn-primary">Book DBillers Medical Revenue Service <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SECTION 7: ROI CASE STUDY
══════════════════════════════════════════ --}}
<section class="bg-light" data-aos="fade-up">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2>{{ pageContent('rcm', 'roi_case_study', 'title', 'RCM ROI Case Study') }}</h2>
            <div class="underline"></div>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Up To 30% Revenue Increase In Next 12 Months With DBillers' Medical Revenue Service</p>
        </div>

        <div class="rcm-roi-table-wrap mb-8">
            <table class="rcm-roi-table">
                <thead>
                    <tr>
                        <th>Metric</th>
                        <th>In-House Billing</th>
                        <th>DBillers RCM</th>
                        <th>Results</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Monthly Charges (on average)</td>
                        <td>$142,000</td>
                        <td>$142,000</td>
                        <td>—</td>
                    </tr>
                    <tr>
                        <td>Gross Collection Rate (GCR)</td>
                        <td>$60,000 (42%)</td>
                        <td>$77,000 (54%)</td>
                        <td class="highlight">+12% GCR Increase</td>
                    </tr>
                    <tr>
                        <td>Monthly Billing Cost</td>
                        <td>$10,500 <small style="font-weight:400;color:#6b7280;">(2 Billers + 1 Coder)</small></td>
                        <td>$3,080 <small style="font-weight:400;color:#6b7280;">(4% of $77K)</small></td>
                        <td class="highlight">$7,420 Saved/Month</td>
                    </tr>
                    <tr>
                        <td>Annual Billing Cost Savings</td>
                        <td>—</td>
                        <td>—</td>
                        <td class="highlight">$89,040/year</td>
                    </tr>
                    <tr>
                        <td>Overall collection increase</td>
                        <td>—</td>
                        <td>—</td>
                        <td class="highlight">≈ 28% more collected</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="text-xs text-gray-400 text-center mb-8">* Based on DBillers 4% rate for $50K–$100K/month collections tier. Use the calculator below to see your exact numbers.</p>

        <div class="text-center">
            <a href="/contact" class="btn-primary">Get Free ROI Analysis <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SECTION 7b: PRICING CALCULATOR (same logic as homepage)
══════════════════════════════════════════ --}}
<section class="bg-white" data-aos="fade-up">
    <div class="container-custom mx-auto">

        <div class="section-headline">
            <h2>Calculate Your Savings with DBillers RCM</h2>
            <div class="underline"></div>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                Enter your monthly collections and see exactly how much your practice saves compared to an in-house billing team.
            </p>
        </div>

        {{-- Reuse the same calc-wrap styles already loaded from home page if on home,
             but since this is a standalone page we inline the needed styles here --}}
        <style>
            .rcm-calc-wrap {
                background: #fff;
                border-radius: 1.25rem;
                box-shadow: 0 8px 32px rgba(0,0,0,.08);
                overflow: clip;
                max-width: 56rem;
                margin: 0 auto;
            }
            .rcm-calc-input-panel {
                padding: 2rem 2rem 1.5rem;
                border-bottom: 1px solid #f1f5f9;
            }
            .rcm-calc-input-panel h3 {
                font-size: 1.0625rem; font-weight: 700; color: #1E2A3A; margin-bottom: 1.25rem;
            }
            .rcm-calc-input-row { display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem; }
            .rcm-calc-dollar { font-size: 1.375rem; font-weight: 700; color: #1A4F8B; flex-shrink: 0; }
            .rcm-calc-number-input {
                flex: 1; font-size: 1.625rem; font-weight: 700; color: #1E2A3A;
                border: 2px solid #e2e8f0; border-radius: 0.625rem;
                padding: 0.5rem 0.875rem; outline: none;
                transition: border-color 0.2s; width: 100%; min-width: 0;
            }
            .rcm-calc-number-input:focus { border-color: #1A4F8B; }
            .rcm-calc-slider {
                -webkit-appearance: none; width: 100%; height: 6px;
                border-radius: 3px;
                background: linear-gradient(to right, #1A4F8B 0%, #1A4F8B var(--pct,10%), #e2e8f0 var(--pct,10%), #e2e8f0 100%);
                outline: none; border: none; cursor: pointer; margin-bottom: 0.5rem;
            }
            .rcm-calc-slider::-webkit-slider-thumb {
                -webkit-appearance: none; width: 22px; height: 22px;
                border-radius: 50%; background: #1A4F8B;
                border: 3px solid #fff; box-shadow: 0 2px 6px rgba(26,79,139,.4); cursor: pointer;
            }
            .rcm-calc-slider::-moz-range-thumb {
                width: 22px; height: 22px; border-radius: 50%; background: #1A4F8B;
                border: 3px solid #fff; cursor: pointer;
            }
            .rcm-calc-slider-labels { display: flex; justify-content: space-between; font-size: 0.75rem; color: #94a3b8; }
            .rcm-calc-tier-badge {
                display: inline-flex; align-items: center; gap: 0.5rem;
                background: #f0f4f8; color: #1A4F8B; font-size: 0.8125rem; font-weight: 600;
                padding: 0.375rem 0.875rem; border-radius: 2rem; margin-top: 0.875rem;
            }
            .rcm-calc-results {
                display: grid; grid-template-columns: repeat(4,1fr); gap: 0;
            }
            .rcm-calc-cell {
                padding: 1.5rem 1.25rem; text-align: center;
                border-right: 1px solid #f1f5f9; border-bottom: 1px solid #f1f5f9;
            }
            .rcm-calc-cell:nth-child(4n) { border-right: none; }
            .rcm-calc-cell:nth-last-child(-n+4) { border-bottom: none; }
            .rcm-calc-label { font-size: 0.75rem; font-weight: 600; color: #94a3b8; text-transform: uppercase; letter-spacing: .05em; margin-bottom: 0.5rem; }
            .rcm-calc-value { font-size: 1.375rem; font-weight: 800; color: #1E2A3A; line-height: 1.2; }
            .rcm-calc-sub   { font-size: 0.75rem; color: #94a3b8; margin-top: 0.25rem; }
            .rcm-calc-cell.is-savings .rcm-calc-value { color: #16a34a; }
            .rcm-calc-cell.is-savings .rcm-calc-label { color: #16a34a; }
            .rcm-calc-message {
                background: #f8fafc; border-top: 1px solid #f1f5f9;
                padding: 1.25rem 2rem; font-size: 0.9375rem; color: #64748b;
                font-style: italic; text-align: center; line-height: 1.6;
            }
            .rcm-calc-cta { padding: 1.5rem 2rem; text-align: center; border-top: 1px solid #f1f5f9; }
            .rcm-calc-cta a {
                display: inline-flex; align-items: center; gap: 0.5rem;
                background: #1A4F8B; color: #fff; padding: 0.875rem 2rem;
                border-radius: 0.625rem; font-weight: 600; font-size: 0.9375rem;
                text-decoration: none; transition: background 0.2s, transform 0.2s;
            }
            .rcm-calc-cta a:hover { background: #0E3A6B; transform: translateY(-2px); }

            @media (max-width: 900px) {
                .rcm-calc-results { grid-template-columns: repeat(2,1fr); }
                .rcm-calc-cell:nth-child(4n)  { border-right: 1px solid #f1f5f9; }
                .rcm-calc-cell:nth-child(2n)  { border-right: none; }
                .rcm-calc-cell:nth-last-child(-n+4) { border-bottom: 1px solid #f1f5f9; }
                .rcm-calc-cell:nth-last-child(-n+2) { border-bottom: none; }
            }
            @media (max-width: 600px) {
                .rcm-calc-input-panel { padding: 1.25rem 1rem 1rem; }
                .rcm-calc-number-input { font-size: 1.25rem; }
                .rcm-calc-results { grid-template-columns: repeat(2,1fr); }
                .rcm-calc-cell { padding: 1.125rem 0.75rem; }
                .rcm-calc-value { font-size: 1.125rem; }
                .rcm-calc-message { padding: 1rem; font-size: 0.875rem; }
                .rcm-calc-cta { padding: 1.125rem 1rem; }
                .rcm-calc-cta a { width: 100%; justify-content: center; }
            }
        </style>

        <div class="rcm-calc-wrap">

            <div class="rcm-calc-input-panel">
                <h3>Enter Your Monthly Collections</h3>
                <div class="rcm-calc-input-row">
                    <span class="rcm-calc-dollar">$</span>
                    <input type="number" id="rcmCalcInput" class="rcm-calc-number-input"
                           value="25000" min="1000" max="1200000" step="500"
                           inputmode="numeric" placeholder="e.g. 25000">
                </div>
                <input type="range" id="rcmCalcSlider" class="rcm-calc-slider"
                       min="1000" max="1200000" step="500" value="25000">
                <div class="rcm-calc-slider-labels">
                    <span>$1,000</span><span>$100K</span><span>$500K</span><span>$1M+</span>
                </div>
                <div class="rcm-calc-tier-badge" id="rcmCalcTierBadge">
                    <i class="fas fa-layer-group"></i>
                    <span id="rcmCalcTierText">Loading...</span>
                </div>
            </div>

            <div class="rcm-calc-results">
                <div class="rcm-calc-cell">
                    <div class="rcm-calc-label">DBillers Fee</div>
                    <div class="rcm-calc-value" id="rcmDbillersFee">—</div>
                    <div class="rcm-calc-sub"  id="rcmDbillersRate">per month</div>
                </div>
                <div class="rcm-calc-cell">
                    <div class="rcm-calc-label">In-House Cost</div>
                    <div class="rcm-calc-value" id="rcmInhouse">—</div>
                    <div class="rcm-calc-sub"  id="rcmInhouseStaff">per month</div>
                </div>
                <div class="rcm-calc-cell is-savings">
                    <div class="rcm-calc-label">Monthly Savings</div>
                    <div class="rcm-calc-value" id="rcmMonthlySavings">—</div>
                    <div class="rcm-calc-sub"  id="rcmSavingsPct">vs. in-house</div>
                </div>
                <div class="rcm-calc-cell is-savings">
                    <div class="rcm-calc-label">Annual Savings</div>
                    <div class="rcm-calc-value" id="rcmAnnualSavings">—</div>
                    <div class="rcm-calc-sub">per year</div>
                </div>
            </div>

            <div class="rcm-calc-message">
                "Why pay for a full in-house billing team when you can achieve the same results at a fraction of the cost?
                Compare your expenses and discover how much your practice can save with DBillers."
            </div>

            <div class="rcm-calc-cta">
                <a href="/contact">Schedule a Free RCM Consultation <i class="fas fa-arrow-right"></i></a>
            </div>

        </div>
    </div>
</section>

<script>
(function () {
    // ── Exact same tiers as home page calculator ──────────────────
    var TIERS = [
        { max:    3000, rate: 0.10,   flat: null, inhouse:  3500, staff: '1 Biller' },
        { max:    7500, rate: 0.08,   flat: null, inhouse:  3500, staff: '1 Biller' },
        { max:   10000, rate: null,   flat:  600, inhouse:  3500, staff: '1 Biller' },
        { max:   20000, rate: 0.06,   flat: null, inhouse:  3500, staff: '1 Biller' },
        { max:   50000, rate: 0.05,   flat: null, inhouse:  7000, staff: '2 Billers' },
        { max:  100000, rate: 0.04,   flat: null, inhouse: 10500, staff: '2 Billers + 1 Coder' },
        { max:  300000, rate: 0.0299, flat: null, inhouse: 14000, staff: '3 Billers + 1 Coder' },
        { max:  500000, rate: 0.0299, flat: null, inhouse: 21000, staff: '4 Billers + 2 Coders' },
        { max: 1000000, rate: 0.02,   flat: null, inhouse: 24500, staff: '5 Billers + 2 Coders' },
        { max: Infinity, rate: 0.0175, flat: null, inhouse: 35000, staff: '7 Billers + 3 Coders' },
    ];

    function getTier(m)  { return TIERS.find(function(t){ return m <= t.max; }); }
    function calcFee(m, t){ return t.flat !== null ? t.flat : m * t.rate; }
    function fmt(n)      { return '$' + Math.round(n).toLocaleString('en-US'); }
    function fmtRate(t)  {
        return t.flat !== null
            ? 'Flat $' + t.flat.toLocaleString() + '/mo'
            : (t.rate * 100).toFixed(t.rate < 0.05 ? 2 : 0) + '% of collections';
    }

    function update(monthly) {
        monthly = Math.max(1000, parseInt(monthly) || 1000);
        var tier        = getTier(monthly);
        var fee         = calcFee(monthly, tier);
        var inhouse     = tier.inhouse;
        var monthlySave = inhouse - fee;
        var annualSave  = monthlySave * 12;
        var pct         = ((monthlySave / inhouse) * 100).toFixed(0);

        document.getElementById('rcmDbillersFee').textContent    = fmt(fee);
        document.getElementById('rcmDbillersRate').textContent   = fmtRate(tier);
        document.getElementById('rcmInhouse').textContent        = fmt(inhouse);
        document.getElementById('rcmInhouseStaff').textContent   = tier.staff;
        document.getElementById('rcmMonthlySavings').textContent = fmt(monthlySave);
        document.getElementById('rcmSavingsPct').textContent     = pct + '% savings';
        document.getElementById('rcmAnnualSavings').textContent  = fmt(annualSave);
        document.getElementById('rcmCalcTierText').textContent   =
            'Tier: ' + fmtRate(tier) + '  ·  Staffing: ' + tier.staff;

        var cells = document.querySelectorAll('.rcm-calc-cell.is-savings .rcm-calc-value');
        cells.forEach(function(el){
            el.style.color = monthlySave >= 0 ? '#16a34a' : '#dc2626';
        });

        var slider = document.getElementById('rcmCalcSlider');
        var pctFill = ((monthly - slider.min) / (slider.max - slider.min) * 100).toFixed(1);
        slider.style.setProperty('--pct', pctFill + '%');
    }

    var input  = document.getElementById('rcmCalcInput');
    var slider = document.getElementById('rcmCalcSlider');

    slider.addEventListener('input', function(){
        input.value = this.value;
        update(this.value);
    });
    input.addEventListener('input', function(){
        var v = parseInt(this.value) || 1000;
        slider.value = Math.min(Math.max(v, slider.min), slider.max);
        update(v);
    });

    // Initial render
    update(25000);
    slider.value = 25000;
    var initPct = ((25000 - slider.min) / (slider.max - slider.min) * 100).toFixed(1);
    slider.style.setProperty('--pct', initPct + '%');
})();
</script>

{{-- ══════════════════════════════════════════
     SECTION 8: END-TO-END FEATURES
══════════════════════════════════════════ --}}
<section class="bg-white" data-aos="fade-up">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2>{{ pageContent('rcm', 'features', 'title', 'End-to-End RCM Service Features by DBillers') }}</h2>
            <div class="underline"></div>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">{{ pageContent('rcm', 'features', 'subtitle', 'You have nothing to lose and everything to gain with DBillers Medical Revenue Cycle Management features.') }}</p>
        </div>

        <div class="rcm-features-grid">
            @php
                $features = pageContent('rcm', 'features', 'metadata.features', [
                    ['icon'=>'fa-file-invoice','title'=>'Charge Entry','items'=>['Claim creation, validation, and transmission','Entering valid super-bill information','Claim approval confirmation','Claim status tracking']],
                    ['icon'=>'fa-money-bill-transfer','title'=>'Remittance Processing','items'=>['Processing payments from payers','Processing adjustments and denials','Reconciling payments to provider claims']],
                    ['icon'=>'fa-phone','title'=>'Insurance Follow-Up','items'=>['Following up for unpaid claims','Following up for underpaid claims','Contacting payers on provider\'s behalf','Negotiating claim disputes']],
                    ['icon'=>'fa-chart-bar','title'=>'KPI Reporting & Analytics','items'=>['Monitors key performance indicators','Analyzes days in accounts receivable','Analyzes claim denial and collection rate','Advanced data visualization tools']],
                    ['icon'=>'fa-users','title'=>'Patient Collections','items'=>['Collecting patient payments','Managing initial statement and final notice','Sending clean bills and reminders','Convenient payment options']],
                    ['icon'=>'fa-clock-rotate-left','title'=>'A/R Management','items'=>['Reduces aging of outstanding A/R','A/R workflow optimization','Collecting A/R from payers and patients']],
                    ['icon'=>'fa-code','title'=>'Coding & Documentation','items'=>['Coding provider services compliantly','Using latest coding standards','Capturing relevant claim details','Performing medical bill audits']],
                    ['icon'=>'fa-circle-dollar-to-slot','title'=>'Charge Capture','items'=>['Capturing and validating service charges','Leveraging charge sheets and EHRs','Ensuring charges match coding','Reconciling charges with payer agreements']],
                    ['icon'=>'fa-file-contract','title'=>'Contract Management','items'=>['Managing payer contractual agreements','Reviewing and negotiating contracts','Monitoring contract compliance','Analyzing contract performance metrics']],
                ]);
            @endphp
            @foreach($features as $i => $feature)
                <div class="rcm-feature-card" data-aos="zoom-in" data-aos-delay="{{ ($i % 3) * 100 }}">
                    <div class="rcm-feature-icon">
                        <i class="fas {{ $feature['icon'] }}"></i>
                    </div>
                    <h3>{{ $feature['title'] }}</h3>
                    <ul>
                        @foreach($feature['items'] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SECTION 9: SEAL CRACKS CTA STRIP
══════════════════════════════════════════ --}}
<section class="bg-light" data-aos="fade-up">
    <div class="container-custom mx-auto text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ pageContent('rcm', 'seal_cracks', 'title', 'Let DBillers RCM Service seal cracks in your revenue cycle') }}</h2>
        <p class="text-gray-600 mb-8 max-w-2xl mx-auto">{{ pageContent('rcm', 'seal_cracks', 'content', 'We identify opportunities to boost your revenue through enhanced billing, coding, denial management, and more.') }}</p>
        <div class="rcm-cta-strip">
            <a href="/contact" class="btn-primary">Schedule Consultation <i class="fas fa-calendar-alt"></i></a>
            <a href="/contact" class="btn-secondary">Claims Management <i class="fas fa-arrow-right"></i></a>
            <a href="/contact" class="btn-secondary">Denial Prevention <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SECTION 10: PROBLEMS & SOLUTIONS TABLE
══════════════════════════════════════════ --}}
<section class="bg-white" data-aos="fade-up">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2>{{ pageContent('rcm', 'solutions', 'title', 'DBillers RCM Has Got The Solutions For Providers\' Revenue Growth') }}</h2>
            <div class="underline"></div>
        </div>

        <div class="rcm-solutions-wrap">
            <table class="rcm-solutions-table">
                <thead>
                    <tr>
                        <th>Problem</th>
                        <th>DBillers Solution</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $solutions = pageContent('rcm', 'solutions', 'metadata.solutions', [
                            ['problem'=>'Poor Cash Flow','solution'=>'DBillers reduces bad debt and underpayments by ensuring accurate and timely claim submission and follow-up.'],
                            ['problem'=>'Mishandled A/R','solution'=>'Our healthcare RCM solution provides visibility into A/R performance: days in A/R, A/R aging, and A/R turnover.'],
                            ['problem'=>'Misaligned Payer Compatibility','solution'=>'Our flexible and scalable RCM platform adapts to changing payer requirements and maximizes provider reimbursements.'],
                            ['problem'=>'High Denial Rates','solution'=>'Our proactive and preventive approach resolves root causes of denials to boost denial recovery rates and revenue integrity.'],
                            ['problem'=>'More Admin Workload','solution'=>'Our RCM experts and EHR platform automate manual work and perform claim submission with utmost accuracy.'],
                            ['problem'=>'Unsatisfied Patients','solution'=>'Our RCM service offers a patient-centric platform to improve the patient-payer relationship via telehealth features.'],
                            ['problem'=>'Complicated Patient Management','solution'=>'Our medical billing platform automatically estimates and communicates the patient\'s out-of-pocket costs before the service.'],
                        ]);
                    @endphp
                    @foreach($solutions as $row)
                        <tr>
                            <td>{{ $row['problem'] }}</td>
                            <td>{{ $row['solution'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SECTION 11: REPORTING FEATURES
══════════════════════════════════════════ --}}
<section class="bg-light" data-aos="fade-up">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2>{{ pageContent('rcm', 'reporting', 'title', 'Choose DBillers RCM Billing Company For Complete RCM Reporting') }}</h2>
            <div class="underline"></div>
        </div>

        <div class="rcm-reporting-grid">
            @php
                $reports = pageContent('rcm', 'reporting', 'metadata.features', [
                    ['icon'=>'fa-chart-pie','title'=>'Data Insights','desc'=>'See key metrics and trends of the revenue billing process in a comprehensive and interactive analytics dashboard. Compare your performance with industry benchmarks.'],
                    ['icon'=>'fa-comments','title'=>'Quick Feedback','desc'=>'Communicate with our RCM experts, patients, and insurance payers instantly through an integrated chat system. Resolve issues in real time.'],
                    ['icon'=>'fa-file-lines','title'=>'Detailed Reports','desc'=>'Drill down into the details of your revenue cycle with customizable and granular reports. Filter, sort, and export billing data according to your needs.'],
                    ['icon'=>'fa-hospital','title'=>'Multi-Specialty Support','desc'=>'Manage multiple facilities and locations with our RCM reporting dashboard. View and compare data from different sites in one place.'],
                    ['icon'=>'fa-shield-halved','title'=>'Data Security','desc'=>'We use the latest encryption and authentication technologies to protect your data from unauthorized access and breaches.'],
                    ['icon'=>'fa-plug','title'=>'Data Integration','desc'=>'Integrate your data with other systems and platforms using DBillers\' RCM reporting dashboard. We support various formats for seamless data exchange.'],
                ]);
            @endphp
            @foreach($reports as $i => $r)
                <div class="rcm-reporting-card" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 100 }}">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="rcm-feature-icon" style="margin:0;flex-shrink:0;">
                            <i class="fas {{ $r['icon'] }}"></i>
                        </div>
                        <h3 style="margin:0;">{{ $r['title'] }}</h3>
                    </div>
                    <p>{{ $r['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SECTION 12: TESTIMONIALS
══════════════════════════════════════════ --}}
<section class="bg-white" data-aos="fade-up">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2>{{ pageContent('rcm', 'testimonials', 'title', 'What Healthcare Providers Say About Us') }}</h2>
            <div class="underline"></div>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @php
                $testimonials = pageContent('rcm', 'testimonials', 'metadata.testimonials', [
                    ['stars'=>5,'text'=>'I would like to send out a heartfelt appreciation for all of your hard work in helping my health counseling clinic take care of our billing and credentialing needs. You have made my job as a practice owner much easier.','author'=>'Dr. Julia Will','role'=>'Licensed Professional Counselor'],
                    ['stars'=>5,'text'=>'We are more than satisfied with DBillers and would highly recommend them to anyone searching for an efficient billing company. Working with DBillers has felt effortless.','author'=>'Dr. Gennaya Matt***','role'=>'Plastic Surgeon'],
                    ['stars'=>5,'text'=>'DBillers has been a phenomenal asset to our company. Assisting with billing, credentialing and enrollment, DBillers has been consistently reliable from the first day of our relationship.','author'=>'Dr. Mike Lan***','role'=>'Internal Medicine Specialist'],
                ]);
            @endphp
            @foreach($testimonials as $i => $t)
                <div class="testimonial-card" data-aos="flip-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="testimonial-stars">
                        @for($s = 0; $s < $t['stars']; $s++) <i class="fas fa-star"></i> @endfor
                    </div>
                    <p class="testimonial-text">"{{ $t['text'] }}"</p>
                    <p class="font-semibold text-gray-900">— {{ $t['author'] }}</p>
                    <p class="text-sm text-gray-500">{{ $t['role'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SECTION 13: SPECIALTIES
══════════════════════════════════════════ --}}
<section class="bg-light" data-aos="fade-up">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2>{{ pageContent('rcm', 'specialties', 'title', 'Specialties We Serve') }}</h2>
            <div class="underline"></div>
        </div>
        <div class="rcm-specialties">
            @php
                $specs = pageContent('rcm', 'specialties', 'metadata.specialties', [
                    'Cardiology','Dermatology','Family Medicine','Hematology','Nephrology',
                    'Neurology','Gynecology','Ophthalmology','Orthopedics','Pediatrics',
                    'Psychiatry','Pulmonology','Radiology','Surgery','Urology',
                ]);
            @endphp
            @foreach($specs as $i => $spec)
                <span class="rcm-spec-tag" data-aos="fade-up" data-aos-delay="{{ $i * 30 }}">
                    <i class="fas fa-stethoscope mr-1 text-xs"></i> {{ $spec }}
                </span>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SECTION 14: FAQ
══════════════════════════════════════════ --}}
<section class="bg-white" data-aos="fade-up">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2>{{ pageContent('rcm', 'faq', 'title', 'Frequently Asked Questions') }}</h2>
            <div class="underline"></div>
        </div>

        <div class="max-w-3xl mx-auto" id="rcmFaq">
            @php
                $faqs = pageContent('rcm', 'faq', 'metadata.faqs', [
                    ['q'=>'What is revenue cycle management (RCM)?','a'=>'Revenue cycle management is the process of managing the financial aspects of a healthcare provider\'s operations. It involves billing, coding, collecting, and reconciling payments from patients and insurance companies.'],
                    ['q'=>'Why do I need RCM services?','a'=>'Without a robust RCM process, practices lose revenue to claim denials, coding errors, slow collections, and underpayments. DBillers RCM services ensure every dollar earned is collected efficiently.'],
                    ['q'=>'How do you handle claim denials and appeals?','a'=>'Our denial management team identifies root causes, corrects errors, and resubmits claims promptly. We also file formal appeals with detailed supporting documentation to maximize recovery.'],
                    ['q'=>'How do you charge for your RCM services?','a'=>'We work on a pay-for-paid model — a percentage of collections starting as low as 2% depending on your monthly collections volume. No flat fees, no hidden charges.'],
                    ['q'=>'How do you ensure the security and privacy of my data?','a'=>'We sign HIPAA-compliant Business Associate Agreements (BAA) with all clients and use industry-standard encryption and access controls to protect all protected health information (PHI).'],
                    ['q'=>'How do you measure and improve your RCM performance?','a'=>'We provide real-time KPI dashboards tracking clean claim rate, days in A/R, denial rate, and collection rate. Monthly reviews identify areas for further optimization.'],
                    ['q'=>'How can your medical billing company help me with RCM?','a'=>'DBillers is a full-service medical billing company that handles every aspect of your billing process — from coding and claims to payment and follow-up — across any specialty.'],
                ]);
            @endphp
            @foreach($faqs as $i => $faq)
                <div class="rcm-faq-item" data-aos="fade-up" data-aos-delay="{{ $i * 40 }}">
                    <div class="rcm-faq-question">
                        <span>{{ $faq['q'] }}</span>
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="rcm-faq-answer">{{ $faq['a'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SECTION 15: FINAL CTA
══════════════════════════════════════════ --}}
<section class="rcm-band" data-aos="zoom-in-up">
    <div class="container-custom mx-auto">
        <h2>You've Won a Free Audit!</h2>
        <p>Claim your prize now and boost your revenue cycle. DBillers handles every aspect of your billing process — from coding and claims to payment and follow-up.</p>
        <a href="/contact" class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition inline-flex items-center gap-2">
            Claim Free Audit <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<script>
document.querySelectorAll('.rcm-faq-question').forEach(function(q) {
    q.addEventListener('click', function() {
        var item = this.parentElement;
        item.classList.toggle('active');
    });
});
</script>

@endsection
