@extends('layouts.app')

@section('meta_title', pageContent('home', 'hero', 'metadata.meta_title', setting('site_title')))
@section('meta_description', pageContent('home', 'hero', 'metadata.meta_description', setting('site_description')))
@section('meta_keywords', pageContent('home', 'hero', 'metadata.meta_keywords', setting('site_keywords')))
@section('og_title', pageContent('home', 'hero', 'metadata.og_title', pageContent('home', 'hero', 'metadata.meta_title', setting('site_title'))))
@section('og_description', pageContent('home', 'hero', 'metadata.og_description', pageContent('home', 'hero', 'metadata.meta_description', setting('site_description'))))
@section('og_url', url()->current())
@section('canonical', url()->current())

@section('content')
    <!-- Section 1: Hero -->
    <style>
        /* ── Hero layout ── */
        .hero-section { overflow: hidden; }

        .hero-inner {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 2.5rem;
        }

        .hero-left  { flex: 1 1 0; min-width: 0; }
        .hero-right { flex: 1 1 0; min-width: 0; position: relative; }

        /* Typography */
        .hero-left h1 {
            font-size: clamp(1.75rem, 4vw, 3.5rem);
            font-weight: 700;
            color: #1E2A3A;
            line-height: 1.2;
            margin-bottom: 1rem;
        }
        .hero-left .hero-subtitle {
            font-size: clamp(1rem, 2vw, 1.25rem);
            font-weight: 600;
            color: #1A4F8B;
            margin-bottom: 1rem;
        }
        .hero-left .hero-body {
            color: #4A5568;
            line-height: 1.7;
            margin-bottom: 1.75rem;
            font-size: 1rem;
        }

        /* Buttons row */
        .hero-btns {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-bottom: 1.75rem;
        }
        .hero-btns a {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 1.75rem;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 0.9375rem;
            text-decoration: none;
            transition: all 0.25s ease;
            white-space: nowrap;
        }
        .hero-btns .btn-hero-primary {
            background: #1A4F8B;
            color: #fff;
            border: 2px solid #1A4F8B;
        }
        .hero-btns .btn-hero-primary:hover { background: #0E3A6B; border-color: #0E3A6B; }
        .hero-btns .btn-hero-secondary {
            background: transparent;
            color: #1A4F8B;
            border: 2px solid #1A4F8B;
        }
        .hero-btns .btn-hero-secondary:hover { background: #1A4F8B; color: #fff; }

        /* Trust badges */
        .hero-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 0.625rem;
        }
        .hero-badge {
            padding: 0.5rem 0.875rem;
            background: #F8F9FA;
            border-radius: 0.5rem;
            font-size: 0.8125rem;
            font-weight: 600;
            color: #1E2A3A;
            white-space: nowrap;
        }

        /* Image side */
        .hero-img-box {
            width: 100%;
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(0,0,0,.25);
            display: block;
            height: auto;
        }
        .hero-placeholder {
            width: 100%;
            min-height: 320px;
            background: #f3f4f6;
            border-radius: 1rem;
            border: 2px dashed #d1d5db;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            color: #9ca3af;
            text-align: center;
            padding: 1.5rem;
        }
        .hero-float-icon {
            position: absolute;
            bottom: -1.25rem;
            left: -1.25rem;
            background: #1A4F8B;
            color: #fff;
            padding: 0.875rem;
            border-radius: 0.75rem;
            box-shadow: 0 8px 20px rgba(0,0,0,.18);
            font-size: 1.75rem;
            line-height: 1;
            z-index: 10;
        }

        /* ── Tablet (≤ 900px) ── */
        @media (max-width: 900px) {
            .hero-inner { gap: 2rem; }
            .hero-left h1 { font-size: clamp(1.625rem, 3.5vw, 2.5rem); }
        }

        /* ── Mobile (≤ 767px) ── */
        @media (max-width: 767px) {
            .hero-inner {
                flex-direction: column;
                gap: 2rem;
            }
            .hero-left, .hero-right {
                width: 100%;
                flex: none;
            }
            .hero-left h1  { font-size: 1.75rem; }
            .hero-left .hero-subtitle { font-size: 1rem; }
            .hero-left .hero-body { font-size: 0.9375rem; margin-bottom: 1.25rem; }

            /* Stack buttons full-width on mobile */
            .hero-btns {
                flex-direction: column;
                gap: 0.625rem;
            }
            .hero-btns a {
                width: 100%;
                justify-content: center;
                padding: 0.875rem 1rem;
            }

            /* Badges scroll horizontally */
            .hero-badges {
                flex-wrap: nowrap;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: none;
                padding-bottom: 0.25rem;
            }
            .hero-badges::-webkit-scrollbar { display: none; }

            /* Float icon stays inside on mobile */
            .hero-float-icon {
                bottom: -0.75rem;
                left: -0.5rem;
                padding: 0.625rem;
                font-size: 1.375rem;
                border-radius: 0.625rem;
            }
            /* Add bottom padding so float icon doesn't overlap content below */
            .hero-right { padding-bottom: 1.25rem; }

            .hero-placeholder { min-height: 220px; }
        }

        /* ── Small mobile (≤ 400px) ── */
        @media (max-width: 400px) {
            .hero-left h1 { font-size: 1.5rem; }
        }
    </style>

    <section class="hero-section" data-aos="fade-up">
        <div class="container-custom mx-auto">
            <div class="hero-inner">

                <!-- Left: Text -->
                <div class="hero-left animate-fade-in-up">
                    <h1>{{ pageContent('home', 'hero', 'title', 'DBillers | Smart Medical Billing for US Healthcare Providers') }}</h1>
                    <p class="hero-subtitle">{{ pageContent('home', 'hero', 'subtitle', 'The Medical Billing Service Provider for USA Healthcare') }}</p>
                    <div class="hero-body">
                        {!! pageContent('home', 'hero', 'content', 'DBillers is a top US medical billing firm – applying best practices in revenue cycle management and clinical coding. We help physicians outsource billing and coding to an expert third-party agency. Our certified coders and billers also assist healthcare organizations in recovering aged receivables and resolving insurance claim denials.') !!}
                    </div>

                    <!-- Buttons -->
                    <div class="hero-btns">
                        @php $buttons = pageContent('home', 'hero', 'metadata.buttons', []); @endphp
                        @foreach ($buttons as $button)
                            <a href="{{ $button['url'] }}" class="{{ $loop->first ? 'btn-hero-primary' : 'btn-hero-secondary' }}">
                                {{ $button['text'] }} <i class="fas {{ $button['icon'] }}"></i>
                            </a>
                        @endforeach
                    </div>

                    <!-- Trust Badges -->
                    <div class="hero-badges">
                        @php $badges = pageContent('home', 'hero', 'metadata.trust_badges', []); @endphp
                        @foreach ($badges as $badge)
                            <span class="hero-badge">{{ is_array($badge) ? $badge['value'] : $badge }}</span>
                        @endforeach
                    </div>
                </div>

                <!-- Right: Image -->
                <div class="hero-right">
                    @php $imageUrl = pageContent('home', 'hero', 'image_url', ''); @endphp
                    @if ($imageUrl && $imageUrl != '')
                        <img src="{{ $imageUrl }}" alt="Medical billing professionals" class="hero-img-box">
                    @else
                        <div class="hero-placeholder">
                            <i class="fas fa-image" style="font-size:2.5rem;"></i>
                            <p style="font-size:.9375rem;color:#6b7280;">No image uploaded</p>
                            <p style="font-size:.8125rem;">Recommended: 600×500px</p>
                        </div>
                    @endif
                    <div class="hero-float-icon">
                        @php $floatingIcon = pageContent('home', 'hero', 'metadata.floating_icon', 'fa-chart-line'); @endphp
                        <i class="fas {{ $floatingIcon }}"></i>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Section 2: Overview of Services -->
    <section data-aos="fade-up" data-aos-delay="100">
        <div class="container-custom mx-auto">
            <div class="section-headline">
                <h2>{{ pageContent('home', 'services_overview', 'title', 'Overview of Medical Billing Services in the USA') }}</h2>
                <div class="underline"></div>
            </div>
            <div class="text-center text-gray-600 max-w-3xl mx-auto mb-12">
                {!! pageContent('home', 'services_overview', 'content', 'Medical billing services provide organized solutions that convert clinical data into billable insurance claims. Through electronic billing and structured workflows, healthcare providers accurately capture diagnoses, procedures, and charges before submitting them to payers. Beyond claim creation, we offer physician accounts management, claim rejection resolution, balance tracking, and financial reporting for better revenue cycle planning.') !!}
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php $services = pageContent('home', 'services_overview', 'metadata.services', []); @endphp
                @foreach ($services as $service)
                    <div class="card" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="feature-icon mb-4">
                            <i class="fas {{ $service['icon'] }} text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">{{ $service['title'] }}</h3>
                        <p class="text-gray-500 text-sm mb-3">{{ $service['description'] }}</p>
                        <a href="{{ $service['link'] }}" class="text-primary font-semibold text-sm hover:underline">Explore More <i class="fas fa-arrow-right"></i></a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section 3: Medical Claims Billing Service -->
    <section data-aos="fade-right">
        <div class="container-custom mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-primary font-semibold text-sm uppercase tracking-wide">Our Expertise</span>
                    <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">{{ pageContent('home', 'medical_claims', 'title', 'We Boost Healthcare Income with Quick, Uncut Reimbursements') }}</h2>
                    <p class="text-primary font-semibold mb-4">{{ pageContent('home', 'medical_claims', 'subtitle', 'The Billing Firm That Does Medical Claims Processing') }}</p>
                    <div class="text-gray-600 mb-6">
                        {!! pageContent('home', 'medical_claims', 'content', 'Claim management can be difficult when you need timely submissions and full payment. Our niche billing services ease the way. We optimize every invoicing phase using clinical knowledge and first-class claims processing. Cloud technology validates patient insurance eligibility instantly and files claims electronically to speed payments. Our billers ensure every claim reaches the insurer for full reimbursement.') !!}
                    </div>

                    <div class="grid sm:grid-cols-2 gap-4 mb-6">
                        @php $features = pageContent('home', 'medical_claims', 'metadata.features', []); @endphp
                        @foreach ($features as $feature)
                            <div class="feature-item">
                                <i class="fas {{ $feature['icon'] }} text-primary text-xl"></i>
                                <div>
                                    <h4 class="font-bold">{{ $feature['title'] }}</h4>
                                    <p class="text-sm text-gray-500">{{ $feature['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @php $buttonText = pageContent('home', 'medical_claims', 'metadata.button_text', 'Book Free Consultation'); @endphp
                    @php $buttonLink = pageContent('home', 'medical_claims', 'metadata.button_link', '/contact'); @endphp
                    <a href="{{ $buttonLink }}" class="btn-primary">{{ $buttonText }} <i class="fas fa-arrow-right"></i></a>
                </div>
                <div>
                    @php $imageUrl = pageContent('home', 'medical_claims', 'image_url', ''); @endphp
                    @if ($imageUrl && $imageUrl != '')
                        <img src="{{ $imageUrl }}" alt="Medical claims processing" class="rounded-2xl shadow-xl w-full">
                    @else
                        <div class="bg-gray-100 rounded-2xl shadow-xl w-full h-96 flex flex-col items-center justify-center border-2 border-dashed border-gray-300">
                            <i class="fas fa-image text-5xl text-gray-400 mb-3"></i>
                            <p class="text-gray-500">No image uploaded</p>
                            <p class="text-gray-400 text-sm">Recommended size: 500x400px</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Specialized Medical Billing Agency -->
    <section style="background-color: #1A4F8B;" data-aos="zoom-in">
        <div class="container-custom mx-auto text-center py-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ pageContent('home', 'specialized_agency', 'title') }}</h2>
            <div class="text-white text-lg max-w-3xl mx-auto mb-8 leading-relaxed">
                {!! pageContent('home', 'specialized_agency', 'content') !!}
            </div>
            <a href="{{ pageContent('home', 'specialized_agency', 'metadata.button_link') }}" class="inline-flex bg-white text-[#1A4F8B] px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg">
                {{ pageContent('home', 'specialized_agency', 'metadata.button_text') }} <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>

    <!-- Section 5: Trust & Ratings -->
    <section data-aos="fade-up">
        <div class="container-custom mx-auto">
            <div class="section-headline">
                <h2>{{ pageContent('home', 'trust_ratings', 'title') }}</h2>
                <div class="underline"></div>
            </div>
            <div class="text-center text-gray-600 max-w-2xl mx-auto mb-12">
                {!! pageContent('home', 'trust_ratings', 'content') !!}
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @php $stats = pageContent('home', 'trust_ratings', 'metadata.stats', []); @endphp
                @foreach ($stats as $stat)
                    <div class="text-center" data-aos="flip-up" data-aos-delay="{{ $loop->index * 150 }}">
                        <div class="stat-number">{{ $stat['value'] }}</div>
                        <p class="text-gray-600">{{ $stat['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section 6: Tech & Expertise -->
    <section data-aos="fade-left">
        <div class="container-custom mx-auto">
            <div class="section-headline">
                <h2>{{ pageContent('home', 'tech_expertise', 'title') }}</h2>
                <div class="underline"></div>
            </div>
            <div class="text-center text-gray-600 max-w-2xl mx-auto mb-12">
                {!! pageContent('home', 'tech_expertise', 'content') !!}
            </div>

            <!-- Service Tags -->
            <div class="flex flex-wrap justify-center gap-3 mb-12">
                @php $tags = pageContent('home', 'tech_expertise', 'metadata.tags', []); @endphp
                @foreach ($tags as $tag)
                    <span class="tag" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}"><i class="fas fa-check-circle text-primary mr-1"></i> {{ $tag }}</span>
                @endforeach
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                @php $cards = pageContent('home', 'tech_expertise', 'metadata.cards', []); @endphp
                @foreach ($cards as $card)
                    <div class="card text-center" data-aos="flip-left" data-aos-delay="{{ $loop->index * 100 }}">
                        <i class="fas {{ $card['icon'] }} text-5xl text-primary mb-4"></i>
                        <div class="stat-number">{{ $card['value'] }}</div>
                        <p class="font-semibold">{{ $card['title'] }}</p>
                        <p class="text-sm text-gray-500">{{ $card['description'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-10">
                <a href="{{ pageContent('home', 'tech_expertise', 'metadata.button_link') }}" class="btn-secondary">
                    {{ pageContent('home', 'tech_expertise', 'metadata.button_text') }} <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Section 7: Pricing Offer -->
    <section data-aos="fade-up">
        <div class="container-custom mx-auto">
            <div class="section-headline">
                <h2>{{ pageContent('home', 'pricing_offer', 'title') }}</h2>
                <div class="underline"></div>
            </div>
            <div class="text-center text-gray-600 mb-12">
                {!! pageContent('home', 'pricing_offer', 'content') !!}
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                @php $features = pageContent('home', 'pricing_offer', 'metadata.features', []); @endphp
                @foreach ($features as $feature)
                    <div class="card text-center" data-aos="zoom-in-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <i class="fas {{ $feature['icon'] }} text-3xl text-primary mb-3"></i>
                        <p class="font-semibold">{{ $feature['text'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="text-center">
                <a href="{{ pageContent('home', 'pricing_offer', 'metadata.button_link') }}" class="btn-primary">
                    {{ pageContent('home', 'pricing_offer', 'metadata.button_text') }} <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Section 8: Dedicated Team -->
    <section data-aos="fade-right">
        <div class="container-custom mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    @php $imageUrl = pageContent('home', 'dedicated_team', 'image_url'); @endphp
                    @if ($imageUrl)
                        <img src="{{ $imageUrl }}" alt="Dedicated team" class="rounded-2xl shadow-xl w-full">
                    @else
                        <div class="bg-gray-100 rounded-2xl shadow-xl w-full h-96 flex items-center justify-center">
                            <i class="fas fa-users text-5xl text-gray-400"></i>
                        </div>
                    @endif
                </div>
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">{{ pageContent('home', 'dedicated_team', 'title') }}</h2>
                    <div class="text-gray-600 mb-6">
                        {!! pageContent('home', 'dedicated_team', 'content') !!}
                    </div>
                    <a href="{{ pageContent('home', 'dedicated_team', 'metadata.button_link') }}" class="btn-primary">
                        {{ pageContent('home', 'dedicated_team', 'metadata.button_text') }} <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 9: Provider Challenges (Form Section) -->
    <section class="bg-alt" data-aos="fade-up">
        <div class="container-custom mx-auto">
            <div class="grid md:grid-cols-2 gap-12">
                <div data-aos="fade-right">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6">{{ pageContent('home', 'provider_challenges', 'title') }}</h2>
                    <div class="space-y-3" id="challengesList">
                        @php $challenges = pageContent('home', 'provider_challenges', 'metadata.challenges', []); @endphp
                        @foreach ($challenges as $index => $challenge)
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" class="challenge-checkbox w-5 h-5 text-primary rounded" data-challenge="{{ $challenge }}">
                                <span>{{ $challenge }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div data-aos="fade-left">
                    <div class="card">
                        <h3 class="text-2xl font-bold mb-4">Free Consultation</h3>
                        <form action="{{ route('contact.submit') }}" method="POST" id="consultationForm">
                            @csrf
                            <div class="mb-4">
                                <input type="text" name="name" placeholder="Full Name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                            </div>
                            <div class="mb-4">
                                <input type="email" name="email" placeholder="Email Address" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                            </div>
                            <div class="mb-4">
                                <input type="tel" name="phone" placeholder="Phone Number" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                            </div>
                            <div class="mb-4">
                                <textarea name="message" placeholder="Tell us about your practice or specific challenges" required rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary"></textarea>
                            </div>
                            <input type="hidden" name="selected_challenges" id="selectedChallenges" value="">
                            <button type="submit" class="btn-primary w-full justify-center">Free Consultation <i class="fas fa-arrow-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('consultationForm').addEventListener('submit', function() {
            let selected = [];
            document.querySelectorAll('.challenge-checkbox:checked').forEach(function(checkbox) {
                selected.push(checkbox.getAttribute('data-challenge'));
            });
            document.getElementById('selectedChallenges').value = selected.join(', ');
        });
    </script>

    <!-- Section 10: Specialty Medical Billing -->
    <section data-aos="zoom-in">
        <div class="container-custom mx-auto">
            <div class="section-headline">
                <h2>{{ pageContent('home', 'specialty_billing', 'title') }}</h2>
                <div class="underline"></div>
            </div>
            <div class="text-center text-gray-600 max-w-2xl mx-auto mb-12">
                {!! pageContent('home', 'specialty_billing', 'content') !!}
            </div>

            <div class="flex flex-wrap justify-center gap-4">
                @php $specialties = pageContent('home', 'specialty_billing', 'metadata.specialties', []); @endphp
                @foreach ($specialties as $specialty)
                    <span class="tag" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}"><i class="fas fa-stethoscope text-primary mr-2"></i> {{ $specialty }}</span>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section 11: Nationwide Availability -->
    <section data-aos="fade-up">
        <div class="container-custom mx-auto">
            <div class="section-headline">
                <h2>{{ pageContent('home', 'nationwide', 'title') }}</h2>
                <div class="underline"></div>
            </div>
            <div class="text-center text-gray-600 max-w-2xl mx-auto mb-8">
                {!! pageContent('home', 'nationwide', 'content') !!}
            </div>

            <div class="text-center">
                <p class="text-gray-500 mb-3">Choose your location</p>
                <div class="flex flex-wrap justify-center gap-3">
                    @php $locations = pageContent('home', 'nationwide', 'metadata.locations', []); @endphp
                    @foreach ($locations as $location)
                        <span class="tag" data-aos="flip-up" data-aos-delay="{{ $loop->index * 30 }}">{{ $location }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Section 12: Affordable Pricing Comparison -->
    <section data-aos="fade-up">
        <div class="container-custom mx-auto">
            <div class="section-headline">
                <h2>{{ pageContent('home', 'pricing_comparison', 'title') }}</h2>
                <div class="underline"></div>
            </div>
            <div class="text-center text-gray-600 max-w-2xl mx-auto mb-12">
                {!! pageContent('home', 'pricing_comparison', 'content') !!}
            </div>

            <!-- Perks List -->
            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <div data-aos="fade-right">
                    <h3 class="font-bold text-lg mb-4">What's Included:</h3>
                    <div class="grid grid-cols-2 gap-2">
                        @php $included = pageContent('home', 'pricing_comparison', 'metadata.included', []); @endphp
                        @foreach ($included as $item)
                            <div><i class="fas fa-check text-primary mr-2"></i> {{ $item }}</div>
                        @endforeach
                    </div>
                </div>
                <div data-aos="fade-left">
                    <h3 class="font-bold text-lg mb-4">Interactive Pricing Calculator</h3>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Monthly Collections: <span id="collectionsValue" class="font-bold text-primary">$100,000</span></label>
                        <input type="range" id="collectionsSlider" min="50000" max="10000000" step="50000" value="100000" class="w-full">
                    </div>
                </div>
            </div>

            <!-- Comparison Table -->
            <div class="grid md:grid-cols-3 gap-6 mb-8 pricing-comparison-grid">
                <div class="pricing-table" data-aos="flip-left" data-aos-delay="0">
                    <table class="w-full">
                        <tr>
                            <th colspan="2">In-House Billing Costs</th>
                        </tr>
                        <tr>
                            <td>Annual Salary</td>
                            <td class="text-right">$54,480</td>
                        </tr>
                        <tr>
                            <td>Overheads</td>
                            <td class="text-right">$15,000</td>
                        </tr>
                        <tr class="font-bold">
                            <td>Total</td>
                            <td class="text-right">$69,480</td>
                        </tr>
                    </table>
                </div>
                <div class="pricing-table" data-aos="flip-left" data-aos-delay="100">
                    <table class="w-full">
                        <tr>
                            <th colspan="2">DBillers Full Service</th>
                        </tr>
                        <tr>
                            <td>Billing Service Rates</td>
                            <td class="text-right">as low as 2.99%</td>
                        </tr>
                        <tr class="font-bold">
                            <td>Total</td>
                            <td class="text-right" id="dbillersTotal">$35,998</td>
                        </tr>
                    </table>
                </div>
                <div class="savings-box" data-aos="flip-left" data-aos-delay="200">
                    <i class="fas fa-dollar-sign text-3xl mb-2"></i>
                    <div class="text-3xl font-bold" id="savingsAmount">$33,482</div>
                    <p>Annual Savings with DBillers</p>
                </div>
            </div>

            <div class="text-center">
                <a href="{{ pageContent('home', 'pricing_comparison', 'metadata.button_link') }}" class="btn-primary">
                    {{ pageContent('home', 'pricing_comparison', 'metadata.button_text') }} <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <script>
        const slider = document.getElementById('collectionsSlider');
        const collectionsValue = document.getElementById('collectionsValue');
        const dbillersTotal = document.getElementById('dbillersTotal');
        const savingsAmount = document.getElementById('savingsAmount');

        if (slider) {
            slider.addEventListener('input', function() {
                let value = parseInt(this.value);
                let formattedValue = '$' + value.toLocaleString();
                collectionsValue.textContent = formattedValue;

                let annualCollections = value * 12;
                let inHouseTotal = 69480;
                let dbillersCost = annualCollections * 0.0299;
                let savings = inHouseTotal - dbillersCost;

                dbillersTotal.textContent = '$' + Math.round(dbillersCost).toLocaleString();
                savingsAmount.textContent = '$' + Math.round(savings).toLocaleString();
            });
        }
    </script>

    <!-- Section 13: Testimonials -->
    <section data-aos="fade-up">
        <div class="container-custom mx-auto">
            <div class="section-headline">
                <h2>{{ pageContent('home', 'testimonials', 'title') }}</h2>
                <div class="underline"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                @php $testimonials = pageContent('home', 'testimonials', 'metadata.testimonials', []); @endphp
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-card" data-aos="flip-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="testimonial-stars">
                            @for ($i = 1; $i <= floor($testimonial['stars']); $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                            @if ($testimonial['stars'] - floor($testimonial['stars']) > 0)
                                <i class="fas fa-star-half-alt"></i>
                            @endif
                        </div>
                        <p class="testimonial-text">"{{ $testimonial['text'] }}"</p>
                        <p class="font-semibold">— {{ $testimonial['author'] }}</p>
                        <p class="text-sm text-gray-500">{{ $testimonial['role'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="text-center">
                <div class="inline-flex items-center gap-2 bg-gray-100 px-6 py-3 rounded-full">
                    <i class="fas fa-check-circle text-primary"></i>
                    <span class="font-semibold">{{ pageContent('home', 'testimonials', 'metadata.trust_badge') }}</span>
                    <span class="text-primary">★★★★★ {{ pageContent('home', 'testimonials', 'metadata.rating') }}</span>
                    <span class="text-gray-500">({{ pageContent('home', 'testimonials', 'metadata.reviews') }} reviews)</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 14: FAQ Accordion -->
    <section data-aos="fade-up">
        <div class="container-custom mx-auto">
            <div class="section-headline">
                <h2>{{ pageContent('home', 'faq', 'title') }}</h2>
                <div class="underline"></div>
            </div>

            <div class="max-w-3xl mx-auto" id="faqContainer">
                @php $faqs = pageContent('home', 'faq', 'metadata.faqs', []); @endphp
                @foreach ($faqs as $index => $faq)
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                        <div class="faq-question">
                            <span>{{ $faq['question'] }}</span>
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="faq-answer">{{ $faq['answer'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const item = question.parentElement;
                const icon = question.querySelector('i');
                item.classList.toggle('active');
                icon.classList.toggle('fa-plus');
                icon.classList.toggle('fa-minus');
            });
        });
    </script>

    <!-- Section 15: Final CTA -->
    <section class="bg-primary text-white text-center" data-aos="zoom-in-up">
        <div class="container-custom mx-auto py-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ pageContent('home', 'final_cta', 'title') }}</h2>
            <p class="text-white/90 text-lg mb-8">{{ pageContent('home', 'final_cta', 'content') }}</p>
            <div class="flex flex-wrap gap-4 justify-center">
                @php $buttons = pageContent('home', 'final_cta', 'metadata.buttons', []); @endphp
                @foreach ($buttons as $index => $button)
                    @if ($index == 0)
                        <a href="{{ $button['link'] }}" class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">{{ $button['text'] }} <i class="fas fa-arrow-right"></i></a>
                    @else
                        <a href="{{ $button['link'] }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary transition">{{ $button['text'] }}</a>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
