@extends('layouts.app')

@section('content')
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        @php
            $hero = $content->where('section', 'hero')->first();
            $mission = $content->where('section', 'mission')->first();
            $vision = $content->where('section', 'vision')->first();
            $why1 = $content->where('section', 'why_choose_1')->first();
            $why2 = $content->where('section', 'why_choose_2')->first();
            $why3 = $content->where('section', 'why_choose_3')->first();
        @endphp

        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $hero->title ?? 'About DBillers' }}</h1>
            <p class="text-xl text-gray-600">{{ $hero->subtitle ?? 'We\'re revolutionizing medical billing with precision, transparency, and technology.' }}</p>
        </div>

        <div class="grid md:grid-cols-2 gap-12 mb-16">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $mission->title ?? 'Our Mission' }}</h2>
                <p class="text-gray-600">{{ $mission->content ?? 'To provide accurate, transparent, and technology-driven medical billing services that maximize revenue for healthcare providers.' }}</p>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $vision->title ?? 'Our Vision' }}</h2>
                <p class="text-gray-600">{{ $vision->content ?? 'To become the most trusted medical billing partner for modern medicine, setting new standards in precision and efficiency.' }}</p>
            </div>
        </div>

        <div>
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-10">Why Choose DBillers?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-xl font-semibold mb-3">{{ $why1->title ?? '99.9% Accuracy' }}</h3>
                    <p class="text-gray-600">{{ $why1->content ?? 'Double-checked claims before submission' }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-xl font-semibold mb-3">{{ $why2->title ?? 'Fast Turnaround' }}</h3>
                    <p class="text-gray-600">{{ $why2->content ?? 'Claims submitted within 24 hours' }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-xl font-semibold mb-3">{{ $why3->title ?? 'HIPAA Compliant' }}</h3>
                    <p class="text-gray-600">{{ $why3->content ?? 'Your data is always secure' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
