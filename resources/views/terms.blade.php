@extends('layouts.app')

@section('meta_title', pageContent('terms', 'hero', 'metadata.meta_title', 'Terms of Service - DBillers'))
@section('meta_description', pageContent('terms', 'hero', 'metadata.meta_description', 'Read DBillers terms of service for using our website and medical billing services.'))
@section('meta_keywords', pageContent('terms', 'hero', 'metadata.meta_keywords', 'terms of service, terms and conditions, medical billing terms, legal agreement'))
@section('og_title', pageContent('terms', 'hero', 'metadata.og_title', 'Terms of Service - DBillers'))
@section('og_description', pageContent('terms', 'hero', 'metadata.og_description', 'DBillers terms of service'))
@section('og_url', url()->current())
@section('canonical', url()->current())

@section('content')
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @php
            $sections = App\Models\PageContent::where('page', 'terms')
                        ->where('is_active', true)
                        ->orderBy('order')
                        ->get();
        @endphp
        
        @foreach($sections as $section)
            @if($section->section == 'hero')
                <h1 class="text-4xl font-bold text-[#1A4F8B] mb-4">{{ $section->title }}</h1>
                @if($section->subtitle)
                    <p class="text-gray-500 mb-8">{{ $section->subtitle }}</p>
                @endif
            @else
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ $section->title }}</h2>
                    <div class="text-gray-600 prose max-w-none">{!! $section->content !!}</div>
                </div>
            @endif
        @endforeach
    </div>
</section>
@endsection
