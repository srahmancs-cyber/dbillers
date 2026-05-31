@extends('layouts.app')

@section('meta_title', pageContent('about', 'hero', 'metadata.meta_title', 'About DBillers - Medical Billing Experts | Revenue Cycle Management'))
@section('meta_description', pageContent('about', 'hero', 'metadata.meta_description', 'Learn about DBillers, a leading medical billing company helping healthcare providers maximize revenue with expert RCM services since 2015.'))
@section('meta_keywords', pageContent('about', 'hero', 'metadata.meta_keywords', 'about DBillers, medical billing company, RCM services, healthcare billing experts'))
@section('og_title', pageContent('about', 'hero', 'metadata.og_title', pageContent('about', 'hero', 'metadata.meta_title', 'About DBillers')))
@section('og_description', pageContent('about', 'hero', 'metadata.og_description', pageContent('about', 'hero', 'metadata.meta_description', 'Learn about DBillers medical billing experts')))
@section('og_url', url()->current())
@section('canonical', url()->current())

@section('content')
    <!-- Section 1: Hero -->
    <section class="bg-white" data-aos="fade-up">
        <div class="container-custom mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">{{ pageContent('about', 'hero', 'title') }}</h1>
            <h2 class="text-xl md:text-2xl text-primary font-semibold mb-4">{{ pageContent('about', 'hero', 'subtitle') }}</h2>
            <div class="text-lg text-gray-600 max-w-3xl mx-auto mb-8">
                {!! pageContent('about', 'hero', 'content') !!}
            </div>
            <a href="{{ pageContent('about', 'hero', 'metadata.button_link') }}" class="btn-primary">
                {{ pageContent('about', 'hero', 'metadata.button_text') }} <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- Section 2: Our Story -->
    <section class="bg-light" data-aos="fade-right">
        <div class="container-custom mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ pageContent('about', 'our_story', 'title') }}</h2>
                    <div class="text-gray-600 mb-6 leading-relaxed">
                        {!! nl2br(pageContent('about', 'our_story', 'content')) !!}
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6">
                        @php $stats = pageContent('about', 'our_story', 'metadata.stats', []); @endphp
                        @foreach ($stats as $stat)
                            <div class="text-center" data-aos="flip-up" data-aos-delay="{{ $loop->index * 100 }}">
                                <div class="stat-number">{{ $stat['value'] }}</div>
                                <p class="text-sm text-gray-500">{{ $stat['label'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div data-aos="fade-left">
                    @php $imageUrl = pageContent('about', 'our_story', 'image_url'); @endphp
                    @if ($imageUrl)
                        <img src="{{ $imageUrl }}" alt="DBillers team at work" class="rounded-2xl shadow-xl w-full">
                    @else
                        <div class="bg-gray-100 rounded-2xl shadow-xl w-full h-96 flex items-center justify-center">
                            <i class="fas fa-users text-5xl text-gray-400"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Our Mission & Values -->
    <section class="bg-white" data-aos="zoom-in">
        <div class="container-custom mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ pageContent('about', 'mission', 'title') }}</h2>
                <div class="underline mx-auto"></div>
            </div>

            <div style="background-color: #1A4F8B;" class="text-white p-8 md:p-12 rounded-2xl text-center mb-12" data-aos="flip-up">
                <i class="fas fa-quote-left text-3xl mb-4 opacity-50"></i>
                <p class="text-xl md:text-2xl font-semibold leading-relaxed">
                    {!! pageContent('about', 'mission', 'content') !!}
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php $values = pageContent('about', 'mission', 'metadata.values', []); @endphp
                @foreach ($values as $value)
                    <div class="card text-center" data-aos="zoom-in-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <i class="fas {{ $value['icon'] }} text-4xl text-primary mb-3"></i>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $value['title'] }}</h3>
                        <p class="text-gray-500">{{ $value['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section 4: Our Team -->
    <section id="team" class="bg-light" data-aos="fade-up">
        <div class="container-custom mx-auto">
            <div class="section-headline">
                <h2>{{ pageContent('about', 'team', 'title') }}</h2>
                <div class="underline"></div>
                <div class="text-gray-600 mt-4 max-w-2xl mx-auto">
                    {!! pageContent('about', 'team', 'content') !!}
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @php $teamStats = pageContent('about', 'team', 'metadata.stats', []); @endphp
                @foreach ($teamStats as $stat)
                    <div class="card text-center" data-aos="flip-left" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="stat-number">{{ $stat['value'] }}</div>
                        <p class="text-gray-600 font-semibold">{{ $stat['label'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-10">
                <a href="{{ pageContent('about', 'team', 'metadata.button_link') }}" class="btn-secondary">
                    {{ pageContent('about', 'team', 'metadata.button_text') }} <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Section 5: Why Providers Choose DBillers -->
    <section class="bg-white" data-aos="fade-up">
        <div class="container-custom mx-auto">
            <div class="section-headline">
                <h2>{{ pageContent('about', 'why_choose', 'title') }}</h2>
                <div class="underline"></div>
            </div>

            @php $reasons = pageContent('about', 'why_choose', 'metadata.reasons', []); @endphp
            @php $half = ceil(count($reasons) / 2); @endphp
            <div class="grid md:grid-cols-2 gap-8">
                <div class="space-y-3">
                    @foreach (array_slice($reasons, 0, $half) as $reason)
                        <div class="flex items-center gap-3" data-aos="fade-right" data-aos-delay="{{ $loop->index * 50 }}">
                            <i class="fas fa-check-circle text-primary text-xl"></i>
                            <span class="text-gray-700">{{ $reason }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="space-y-3">
                    @foreach (array_slice($reasons, $half) as $reason)
                        <div class="flex items-center gap-3" data-aos="fade-left" data-aos-delay="{{ $loop->index * 50 }}">
                            <i class="fas fa-check-circle text-primary text-xl"></i>
                            <span class="text-gray-700">{{ $reason }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Section 6: Our Approach -->
    <section class="bg-light" data-aos="fade-up">
        <div class="container-custom mx-auto">
            <div class="section-headline">
                <h2>{{ pageContent('about', 'approach', 'title') }}</h2>
                <div class="underline"></div>
            </div>

            <div class="grid md:grid-cols-4 gap-6">
                @php $steps = pageContent('about', 'approach', 'metadata.steps', []); @endphp
                @foreach ($steps as $step)
                    <div class="card text-center" data-aos="flip-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="text-4xl font-bold text-primary mb-3">{{ $step['number'] }}</div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $step['title'] }}</h3>
                        <p class="text-gray-500 text-sm">{{ $step['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section 7: Certifications & Accreditations -->
    <section class="bg-white" data-aos="zoom-in">
        <div class="container-custom mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ pageContent('about', 'certifications', 'title') }}</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">{{ pageContent('about', 'certifications', 'subtitle') }}</p>

            <div class="flex flex-wrap justify-center gap-3 mb-8">
                @php $badges = pageContent('about', 'certifications', 'metadata.badges', []); @endphp
                @foreach ($badges as $badge)
                    <span class="tag" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}"><i class="fas fa-check-circle text-primary mr-2"></i> {{ $badge }}</span>
                @endforeach
            </div>

            <div class="bg-light p-6 rounded-xl inline-block" data-aos="flip-up">
                <p class="text-gray-700 font-semibold">{{ pageContent('about', 'certifications', 'metadata.trust_text') }}</p>
            </div>
        </div>
    </section>

    <!-- Section 8: Final Call to Action -->
    <section style="background-color: #1A4F8B;" class="text-white text-center" data-aos="zoom-in-up">
        <div class="container-custom mx-auto py-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ pageContent('about', 'final_cta', 'title') }}</h2>
            <p class="text-white/90 text-lg mb-8">{{ pageContent('about', 'final_cta', 'content') }}</p>
            <div class="flex flex-wrap gap-4 justify-center">
                @php $ctaButtons = pageContent('about', 'final_cta', 'metadata.buttons', []); @endphp
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
