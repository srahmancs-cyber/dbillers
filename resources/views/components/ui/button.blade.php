@props(['variant' => 'primary', 'href' => null, 'type' => 'button'])

@php
$baseClasses = 'inline-flex items-center justify-center px-6 py-3 rounded-lg font-semibold transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2';
$variants = [
    'primary' => 'bg-gray-900 text-white hover:bg-gray-800 focus:ring-gray-900 shadow-lg hover:shadow-xl',
    'secondary' => 'border-2 border-gray-900 text-gray-900 hover:bg-gray-900 hover:text-white focus:ring-gray-900',
    'outline' => 'border border-gray-300 text-gray-700 hover:border-gray-900 hover:text-gray-900 focus:ring-gray-500',
];
$classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
