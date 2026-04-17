@extends('layouts.app')

@section('meta_title', pageContent('specialities', 'hero', 'metadata.meta_title', 'Medical Specialities Billing - Expert RCM Services | DBillers'))
@section('meta_description', pageContent('specialities', 'hero', 'metadata.meta_description', 'Specialized medical billing services across 50+ specialities including cardiology, orthopedics, dermatology, and more. Revenue cycle management tailored to your practice.'))
@section('meta_keywords', pageContent('specialities', 'hero', 'metadata.meta_keywords', 'medical specialities billing, cardiology billing, orthopedics billing, dermatology billing, RCM services'))
@section('og_title', pageContent('specialities', 'hero', 'metadata.og_title', pageContent('specialities', 'hero', 'metadata.meta_title', 'Medical Specialities Billing')))
@section('og_description', pageContent('specialities', 'hero', 'metadata.og_description', pageContent('specialities', 'hero', 'metadata.meta_description', 'Specialized medical billing services')))
@section('og_url', url()->current())
@section('canonical', url()->current())

@section('content')
    <!-- Section 1: Hero -->
    <section class="bg-white" data-aos="fade-up">
        <div class="container-custom mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">{{ pageContent('specialities', 'hero', 'title') }}</h1>
            <h2 class="text-xl md:text-2xl text-primary font-semibold mb-4">{{ pageContent('specialities', 'hero', 'subtitle') }}</h2>
            <div class="text-lg text-gray-600 max-w-3xl mx-auto mb-8">
                {!! pageContent('specialities', 'hero', 'content') !!}
            </div>
            <a href="{{ pageContent('specialities', 'hero', 'metadata.button_link') }}" class="btn-primary">
                {{ pageContent('specialities', 'hero', 'metadata.button_text') }} <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- Section 2: Our Popular Specialties -->
    <section class="bg-light" data-aos="fade-up">
        <div class="container-custom mx-auto">
            <div class="section-headline">
                <h2>{{ pageContent('specialities', 'popular_specialties', 'title') }}</h2>
                <div class="underline"></div>
                <div class="text-gray-600 mt-4 max-w-2xl mx-auto">
                    {!! pageContent('specialities', 'popular_specialties', 'content') !!}
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @php $specialties = pageContent('specialities', 'popular_specialties', 'metadata.specialties', []); @endphp
                @foreach ($specialties as $specialty)
                    <div class="card text-center" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 50 }}">
                        <i class="fas {{ $specialty['icon'] }} text-5xl text-primary mb-4"></i>
                        <h3 class="text-lg font-bold text-gray-900">{{ $specialty['name'] }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section 3: Specialty Not Listed -->
    <section class="bg-white" data-aos="fade-up">
        <div class="container-custom mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ pageContent('specialities', 'not_listed', 'title') }}</h2>
            <div class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
                {!! pageContent('specialities', 'not_listed', 'content') !!}
            </div>

            <div class="max-w-md mx-auto" data-aos="flip-up">
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4" id="specialtyForm">
                    @csrf
                    <input type="text" name="name" placeholder="Full Name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                    <input type="email" name="email" placeholder="Email address" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                    <input type="tel" name="phone" placeholder="Phone Number (optional)" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                    <input type="text" name="specialty_name" id="specialty_name" placeholder="Your specialty name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                    <textarea name="message" id="message_field" placeholder="Tell us about your practice" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary"></textarea>
                    <button type="submit" class="btn-primary w-full justify-center">
                        {{ pageContent('specialities', 'not_listed', 'metadata.button_text') }} <i class="fas fa-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Section 4: Final Call to Action -->
    <section class="text-white text-center" style="background-color: #1A4F8B;" data-aos="zoom-in-up">
        <div class="container-custom mx-auto py-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ pageContent('specialities', 'final_cta', 'title') }}</h2>
            <p class="text-white/90 text-lg mb-8">{{ pageContent('specialities', 'final_cta', 'subtitle') }}</p>
            <div class="flex flex-wrap gap-4 justify-center">
                @php $ctaButtons = pageContent('specialities', 'final_cta', 'metadata.buttons', []); @endphp
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

    <script>
        document.getElementById('specialtyForm').addEventListener('submit', function(e) {
            let specialty = document.getElementById('specialty_name').value;
            let messageField = document.getElementById('message_field');
            let originalMessage = messageField.value;

            if (specialty) {
                messageField.value = "Specialty: " + specialty + "\n\n" + originalMessage;
            }
        });
    </script>
@endsection
