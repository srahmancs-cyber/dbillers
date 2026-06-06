@extends('layouts.app')

@section('meta_title', pageContent('services', 'hero', 'metadata.meta_title', 'Medical Billing Services - Revenue Cycle Management | DBillers'))
@section('meta_description', pageContent('services', 'hero', 'metadata.meta_description', 'Comprehensive medical billing services including coding, claim submission, denial management, and RCM. Maximize your practice revenue with DBillers.'))
@section('meta_keywords', pageContent('services', 'hero', 'metadata.meta_keywords', 'medical billing services, revenue cycle management, medical coding, claim submission, denial management, RCM services'))
@section('og_title', pageContent('services', 'hero', 'metadata.og_title', pageContent('services', 'hero', 'metadata.meta_title', 'Medical Billing Services')))
@section('og_description', pageContent('services', 'hero', 'metadata.og_description', pageContent('services', 'hero', 'metadata.meta_description', 'Comprehensive medical billing services')))
@section('og_url', url()->current())
@section('canonical', url()->current())

@section('content')
    <!-- Section 1: Hero -->
    <section class="bg-white" data-aos="fade-up">
        <div class="container-custom mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">{{ pageContent('services', 'hero', 'title') }}</h1>
            <h2 class="text-xl md:text-2xl text-primary font-semibold mb-4">{{ pageContent('services', 'hero', 'subtitle') }}</h2>
            <div class="text-lg text-gray-600 max-w-3xl mx-auto mb-8">
                {!! pageContent('services', 'hero', 'content') !!}
            </div>
            <a href="{{ pageContent('services', 'hero', 'metadata.button_link') }}" class="btn-primary">
                {{ pageContent('services', 'hero', 'metadata.button_text') }} <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- Section 2: Core Services Overview -->
    <section class="bg-light" data-aos="fade-up">
        <div class="container-custom mx-auto">
            <div class="section-headline">
                <h2>{{ pageContent('services', 'core_services', 'title') }}</h2>
                <div class="underline"></div>
                <div class="text-gray-600 mt-4 max-w-2xl mx-auto">
                    {!! pageContent('services', 'core_services', 'content') !!}
                </div>
            </div>

            {{-- All services in one grid — RCM gets a subtle premium style --}}
            <div class="grid md:grid-cols-2 gap-8">
                @php $servicesList = pageContent('services', 'core_services', 'metadata.services', []); @endphp
                @foreach ($servicesList as $service)
                    @php $isRcm = ($service['link'] ?? '') === '/revenue-cycle-management'; @endphp

                    @if($isRcm)
                        {{-- RCM card: same structure, slight premium touch --}}
                        <div class="card" style="border-left: 3px solid #1A4F8B;" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="flex items-start justify-between mb-4">
                                <i class="fas {{ $service['icon'] }} text-4xl text-primary"></i>
                                <span style="font-size:.6875rem;font-weight:700;color:#1A4F8B;background:#dbeafe;padding:.2rem .6rem;border-radius:2rem;white-space:nowrap;">Featured</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $service['title'] }}</h3>
                            <p class="text-gray-600 mb-3">{{ $service['description'] }}</p>
                            <a href="{{ $service['link'] }}" class="text-primary font-semibold hover:underline">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    @else
                        <div class="card" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                            <i class="fas {{ $service['icon'] }} text-4xl text-primary mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $service['title'] }}</h3>
                            <p class="text-gray-600 mb-3">{{ $service['description'] }}</p>
                            <a href="{{ $service['link'] }}" class="text-primary font-semibold hover:underline">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section 3: Why Choose DBillers -->
    <section class="bg-white" data-aos="fade-right">
        <div class="container-custom mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">{{ pageContent('services', 'why_different', 'title') }}</h2>
                    <div class="space-y-4">
                        @php $reasons = pageContent('services', 'why_different', 'metadata.reasons', []); @endphp
                        @foreach ($reasons as $reason)
                            <div class="flex items-center gap-3" data-aos="fade-right" data-aos-delay="{{ $loop->index * 50 }}">
                                <i class="fas fa-check-circle text-primary text-xl"></i>
                                <span class="text-gray-700">{!! $reason !!}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div data-aos="fade-left">
                    @php $imageUrl = pageContent('services', 'why_different', 'image_url'); @endphp
                    @if ($imageUrl)
                        <img src="{{ $imageUrl }}" alt="Medical billing team" class="rounded-2xl shadow-xl w-full">
                    @else
                        <div class="bg-gray-100 rounded-2xl shadow-xl w-full h-96 flex items-center justify-center">
                            <i class="fas fa-chart-line text-5xl text-gray-400"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Service Features Grid -->
    <section class="bg-light" data-aos="zoom-in">
        <div class="container-custom mx-auto">
            <div class="section-headline">
                <h2>{{ pageContent('services', 'features', 'title') }}</h2>
                <div class="underline"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php $features = pageContent('services', 'features', 'metadata.features', []); @endphp
                @foreach ($features as $feature)
                    <div class="card text-center" data-aos="flip-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <i class="fas {{ $feature['icon'] }} text-4xl text-primary mb-3"></i>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $feature['title'] }}</h3>
                        <p class="text-gray-500 text-sm">{{ $feature['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section 5: Pricing Overview -->
    <section class="bg-white text-center" data-aos="fade-up">
        <div class="container-custom mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ pageContent('services', 'pricing', 'title') }}</h2>
            <p class="text-lg text-gray-600 mb-6">{{ pageContent('services', 'pricing', 'subtitle') }}</p>
            <div class="max-w-md mx-auto bg-primary text-white p-8 rounded-2xl shadow-xl mb-8" data-aos="flip-up">
                <i class="fas fa-dollar-sign text-4xl mb-3"></i>
                <p class="text-2xl font-bold mb-2">{{ pageContent('services', 'pricing', 'metadata.savings_text') }}</p>
                <p class="text-white/90">{{ pageContent('services', 'pricing', 'metadata.savings_subtext') }}</p>
            </div>
            <a href="{{ pageContent('services', 'pricing', 'metadata.button_link') }}" class="btn-primary">
                {{ pageContent('services', 'pricing', 'metadata.button_text') }} <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- Section 6: Final Call to Action -->
    <section style="background-color: #1A4F8B;" class="text-white text-center" data-aos="zoom-in-up">
        <div class="container-custom mx-auto py-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ pageContent('services', 'final_cta', 'title') }}</h2>
            <p class="text-white/90 text-lg mb-8">{{ pageContent('services', 'final_cta', 'subtitle') }}</p>
            <div class="flex flex-wrap gap-4 justify-center">
                @php $ctaButtons = pageContent('services', 'final_cta', 'metadata.buttons', []); @endphp
                @foreach ($ctaButtons as $index => $button)
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
