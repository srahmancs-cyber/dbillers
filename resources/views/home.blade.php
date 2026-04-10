@extends('layouts.app')

@section('content')
    <!-- Section 1: Hero -->
    <section class="relative overflow-hidden">
        <div class="container-custom mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Left Column -->
                <div class="animate-fade-in-up">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-4">
                        {{ pageContent('home', 'hero', 'title', 'DBillers | Smart Medical Billing for US Healthcare Providers') }}
                    </h1>
                    <p class="text-xl text-primary font-semibold mb-4">
                        {{ pageContent('home', 'hero', 'subtitle', 'The Medical Billing Service Provider for USA Healthcare') }}
                    </p>
                    <div class="text-gray-600 mb-8 leading-relaxed">
                        {!! pageContent('home', 'hero', 'content', 'DBillers is a top US medical billing firm – applying best practices in revenue cycle management and clinical coding. We help physicians outsource billing and coding to an expert third-party agency. Our certified coders and billers also assist healthcare organizations in recovering aged receivables and resolving insurance claim denials.') !!}
                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-wrap gap-4 mb-8">
                        @php $buttons = pageContent('home', 'hero', 'metadata.buttons', []); @endphp
                        @foreach ($buttons as $button)
                            <a href="{{ $button['url'] }}" class="{{ $loop->first ? 'btn-primary' : 'btn-secondary' }}">
                                {{ $button['text'] }} <i class="fas {{ $button['icon'] }}"></i>
                            </a>
                        @endforeach
                    </div>

                    <!-- Trust Badges -->
                    <div class="trust-badges">
                        @php $badges = pageContent('home', 'hero', 'metadata.trust_badges', []); @endphp
                        @foreach ($badges as $badge)
                            <div class="trust-badge">{{ is_array($badge) ? $badge['value'] : $badge }}</div>
                        @endforeach
                    </div>
                </div>

                <!-- Right Column - Image -->
                <div class="relative">
                    @php $imageUrl = pageContent('home', 'hero', 'image_url', ''); @endphp
                    @if ($imageUrl && $imageUrl != '')
                        <img src="{{ $imageUrl }}" alt="Medical billing professionals" class="rounded-2xl shadow-2xl w-full h-auto">
                    @else
                        <div class="bg-gray-100 rounded-2xl shadow-2xl w-full h-96 flex flex-col items-center justify-center border-2 border-dashed border-gray-300">
                            <i class="fas fa-image text-5xl text-gray-400 mb-3"></i>
                            <p class="text-gray-500 text-center px-4">No image uploaded</p>
                            <p class="text-gray-400 text-sm mt-2">Recommended size: 600x500px</p>
                            <p class="text-gray-400 text-xs">Upload via Admin → Page Content → Hero Settings</p>
                        </div>
                    @endif
                    <div class="absolute -bottom-6 -left-6 bg-primary text-white p-4 rounded-xl shadow-lg">
                        @php $floatingIcon = pageContent('home', 'hero', 'metadata.floating_icon', 'fa-chart-line'); @endphp
                        <i class="fas {{ $floatingIcon }} text-3xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Overview of Services -->
    <section>
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
                    <div class="card">
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
    <section>
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
    <section style="background-color: #1A4F8B;">
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
    <section>
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
                    <div class="text-center">
                        <div class="stat-number">{{ $stat['value'] }}</div>
                        <p class="text-gray-600">{{ $stat['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section 6: Tech & Expertise -->
    <section>
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
                    <span class="tag"><i class="fas fa-check-circle text-primary mr-1"></i> {{ $tag }}</span>
                @endforeach
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                @php $cards = pageContent('home', 'tech_expertise', 'metadata.cards', []); @endphp
                @foreach ($cards as $card)
                    <div class="card text-center">
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
    <section>
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
                    <div class="card text-center">
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
    <section>
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
    <section class="bg-alt">
        <div class="container-custom mx-auto">
            <div class="grid md:grid-cols-2 gap-12">
                <div>
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
                <div>
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
    <section>
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
                    <span class="tag"><i class="fas fa-stethoscope text-primary mr-2"></i> {{ $specialty }}</span>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section 11: Nationwide Availability -->
    <section>
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
                        <span class="tag">{{ $location }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Section 12: Affordable Pricing Comparison -->
    <section>
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
                <div>
                    <h3 class="font-bold text-lg mb-4">What's Included:</h3>
                    <div class="grid grid-cols-2 gap-2">
                        @php $included = pageContent('home', 'pricing_comparison', 'metadata.included', []); @endphp
                        @foreach ($included as $item)
                            <div><i class="fas fa-check text-primary mr-2"></i> {{ $item }}</div>
                        @endforeach
                    </div>
                </div>
                <div>
                    <h3 class="font-bold text-lg mb-4">Interactive Pricing Calculator</h3>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Monthly Collections: <span id="collectionsValue" class="font-bold text-primary">$100,000</span></label>
                        <input type="range" id="collectionsSlider" min="50000" max="10000000" step="50000" value="100000" class="w-full">
                    </div>
                </div>
            </div>

            <!-- Comparison Table -->
            <div class="grid md:grid-cols-3 gap-6 mb-8">
                <div class="pricing-table">
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
                <div class="pricing-table">
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
                <div class="savings-box">
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
    <section>
        <div class="container-custom mx-auto">
            <div class="section-headline">
                <h2>{{ pageContent('home', 'testimonials', 'title') }}</h2>
                <div class="underline"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                @php $testimonials = pageContent('home', 'testimonials', 'metadata.testimonials', []); @endphp
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-card">
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
    <section>
        <div class="container-custom mx-auto">
            <div class="section-headline">
                <h2>{{ pageContent('home', 'faq', 'title') }}</h2>
                <div class="underline"></div>
            </div>

            <div class="max-w-3xl mx-auto" id="faqContainer">
                @php $faqs = pageContent('home', 'faq', 'metadata.faqs', []); @endphp
                @foreach ($faqs as $index => $faq)
                    <div class="faq-item">
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
    <section class="bg-primary text-white text-center">
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
