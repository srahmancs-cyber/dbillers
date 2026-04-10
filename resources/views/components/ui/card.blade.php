@props(['title' => null, 'icon' => null])

<div {{ $attributes->merge(['class' => 'bg-white rounded-2xl shadow-md hover-lift overflow-hidden transition-all duration-300']) }}>
    @if($icon || $title)
        <div class="p-6 pb-0">
            @if($icon)
                <div class="text-4xl mb-4">{{ $icon }}</div>
            @endif
            @if($title)
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $title }}</h3>
            @endif
        </div>
    @endif
    <div class="p-6 {{ $icon || $title ? 'pt-0' : '' }}">
        {{ $slot }}
    </div>
</div>
