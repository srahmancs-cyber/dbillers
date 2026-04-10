@extends('layouts.app')

@section('content')
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        @php
            $hero = $content->where('section', 'hero')->first();
            $services = $content->where('section', 'like', 'service_%')->sortBy('order');
        @endphp

        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $hero->title ?? 'Our Services' }}</h1>
            <p class="text-xl text-gray-600">{{ $hero->subtitle ?? 'Comprehensive medical billing solutions tailored to your practice' }}</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ $service->title }}</h3>
                <p class="text-gray-600">{{ $service->content }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
