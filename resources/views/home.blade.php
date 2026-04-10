@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-gray-900 to-gray-700 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            {{ $content->where('section', 'hero')->first()->title ?? 'Precision Billing for Modern Medicine' }}
        </h1>
        <p class="text-xl mb-8">
            {{ $content->where('section', 'hero')->first()->subtitle ?? 'Streamline your medical practice revenue cycle with DBillers' }}
        </p>
        <div class="flex justify-center gap-4">
            <a href="/contact" class="bg-white text-gray-900 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">Get Started</a>
            <a href="/services" class="border border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-gray-900 transition">Our Services</a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @foreach(['stat_1', 'stat_2', 'stat_3', 'stat_4'] as $stat)
                @php $item = $content->where('section', $stat)->first(); @endphp
                @if($item)
                <div class="text-center">
                    <div class="text-4xl font-bold text-gray-900">{{ $item->title }}</div>
                    <div class="text-gray-600">{{ $item->subtitle }}</div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gray-900 text-white text-center">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-4">Ready to improve your revenue cycle?</h2>
        <a href="/contact" class="inline-block bg-white text-gray-900 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">Contact Us Today</a>
    </div>
</section>
@endsection
