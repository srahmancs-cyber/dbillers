@props(['title', 'subtitle' => null, 'centered' => true])

<div {{ $attributes->merge(['class' => $centered ? 'text-center' : '']) }}>
    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 animate-fade-in">
        {{ $title }}
    </h2>
    @if($subtitle)
        <p class="text-lg md:text-xl text-gray-600 max-w-3xl {{ $centered ? 'mx-auto' : '' }} animate-fade-in-up">
            {{ $subtitle }}
        </p>
    @endif
    @if($centered)
        <div class="w-20 h-1 bg-gray-900 mx-auto mt-6 rounded-full"></div>
    @else
        <div class="w-20 h-1 bg-gray-900 mt-6 rounded-full"></div>
    @endif
</div>
