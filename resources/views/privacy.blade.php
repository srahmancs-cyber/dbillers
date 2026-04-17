@extends('layouts.app')

@section('meta_title', pageContent('privacy', 'hero', 'metadata.meta_title', 'Privacy Policy - DBillers'))
@section('meta_description', pageContent('privacy', 'hero', 'metadata.meta_description', 'Read DBillers privacy policy to understand how we collect, use, and protect your personal information.'))
@section('meta_keywords', pageContent('privacy', 'hero', 'metadata.meta_keywords', 'privacy policy, data protection, medical billing privacy, HIPAA compliance'))
@section('og_title', pageContent('privacy', 'hero', 'metadata.og_title', 'Privacy Policy - DBillers'))
@section('og_description', pageContent('privacy', 'hero', 'metadata.og_description', 'DBillers privacy policy'))
@section('og_url', url()->current())
@section('canonical', url()->current())

@section('content')
<section class="py-20 bg-white" data-aos="fade-up">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @php
            $sections = App\Models\PageContent::where('page', 'privacy')
                        ->where('is_active', true)
                        ->orderBy('order')
                        ->get();
        @endphp
        
        @foreach($sections as $index => $section)
            @if($section->section == 'hero')
                <h1 class="text-4xl font-bold text-[#1A4F8B] mb-4" data-aos="fade-up">{{ $section->title }}</h1>
                @if($section->subtitle)
                    <p class="text-gray-500 mb-8" data-aos="fade-up" data-aos-delay="100">{{ $section->subtitle }}</p>
                @endif
            @else
                <div class="mb-8" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ $section->title }}</h2>
                    <div class="text-gray-600 prose max-w-none">{!! $section->content !!}</div>
                </div>
            @endif
        @endforeach
    </div>
</section>
@endsection
