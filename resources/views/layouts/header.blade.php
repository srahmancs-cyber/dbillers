<style>
    /* ── Sticky header ── */
    .site-header {
        background: #fff;
        box-shadow: 0 1px 3px rgba(0,0,0,.08);
        position: sticky;
        top: 0;
        z-index: 100;
    }
    .site-header .header-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.875rem 0;
    }

    /* ── Hamburger button ── */
    .ham-btn {
        display: none;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 2.25rem;
        height: 2.25rem;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
        gap: 5px;
    }
    .ham-btn span {
        display: block;
        width: 22px;
        height: 2px;
        background: #1E2A3A;
        border-radius: 2px;
        transition: transform 0.3s ease, opacity 0.3s ease, width 0.3s ease;
        transform-origin: center;
    }
    /* Animate to X */
    .ham-btn.is-open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
    .ham-btn.is-open span:nth-child(2) { opacity: 0; width: 0; }
    .ham-btn.is-open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

    /* ── Bottom sheet overlay ── */
    .mob-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.45);
        z-index: 200;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .mob-overlay.is-visible {
        display: block;
    }
    .mob-overlay.is-open {
        opacity: 1;
    }

    /* ── Bottom sheet panel ── */
    .mob-sheet {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 201;
        background: #fff;
        border-radius: 1.25rem 1.25rem 0 0;
        padding: 0 0 calc(env(safe-area-inset-bottom) + 1.25rem);
        transform: translateY(100%);
        transition: transform 0.35s cubic-bezier(0.32, 0.72, 0, 1);
        box-shadow: 0 -8px 40px rgba(0,0,0,.12);
        max-height: 85vh;
        overflow-y: auto;
    }
    .mob-sheet.is-open {
        transform: translateY(0);
    }

    /* Drag handle */
    .mob-sheet-handle {
        display: flex;
        justify-content: center;
        padding: 0.875rem 0 0.5rem;
    }
    .mob-sheet-handle span {
        width: 2.5rem;
        height: 4px;
        background: #e2e8f0;
        border-radius: 2px;
    }

    /* Sheet header row */
    .mob-sheet-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1.25rem 0.75rem;
        border-bottom: 1px solid #f1f5f9;
    }
    .mob-sheet-brand {
        font-size: 1.125rem;
        font-weight: 700;
        color: #1E2A3A;
        text-decoration: none;
    }
    .mob-sheet-close {
        width: 2rem;
        height: 2rem;
        border-radius: 50%;
        background: #f1f5f9;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #64748b;
        font-size: 1rem;
        transition: background 0.2s;
    }
    .mob-sheet-close:hover { background: #e2e8f0; }

    /* Nav links */
    .mob-nav {
        padding: 0.5rem 1rem;
    }
    .mob-nav a {
        display: flex;
        align-items: center;
        gap: 0.875rem;
        padding: 0.875rem 0.75rem;
        border-radius: 0.625rem;
        font-size: 1rem;
        font-weight: 500;
        color: #374151;
        text-decoration: none;
        transition: background 0.18s, color 0.18s;
        border-left: 3px solid transparent;
    }
    .mob-nav a:hover,
    .mob-nav a.active {
        background: #f0f4f8;
        color: #1A4F8B;
        border-left-color: #1A4F8B;
    }
    .mob-nav a i {
        width: 1.25rem;
        text-align: center;
        color: #1A4F8B;
        font-size: 0.9375rem;
        opacity: 0.8;
    }

    /* Divider */
    .mob-divider {
        height: 1px;
        background: #f1f5f9;
        margin: 0.5rem 1.25rem;
    }

    /* Secondary links */
    .mob-secondary {
        display: flex;
        gap: 1.5rem;
        padding: 0.5rem 1.75rem;
    }
    .mob-secondary a {
        font-size: 0.8125rem;
        color: #94a3b8;
        text-decoration: none;
        transition: color 0.2s;
    }
    .mob-secondary a:hover { color: #1A4F8B; }

    /* CTA */
    .mob-cta {
        padding: 0.75rem 1.25rem 0;
    }
    .mob-cta a {
        display: block;
        text-align: center;
        background: #1A4F8B;
        color: #fff;
        padding: 0.875rem;
        border-radius: 0.75rem;
        font-weight: 600;
        font-size: 0.9375rem;
        text-decoration: none;
        transition: background 0.2s;
    }
    .mob-cta a:hover { background: #0E3A6B; }

    /* Show hamburger only on mobile */
    @media (max-width: 767px) {
        .ham-btn { display: flex; }
    }
</style>

@php
    $navItems = [
        '/'             => ['label' => 'Home',         'icon' => 'fa-house'],
        '/about'        => ['label' => 'About',        'icon' => 'fa-circle-info'],
        '/services'     => ['label' => 'Services',     'icon' => 'fa-briefcase-medical'],
        '/specialities' => ['label' => 'Specialities', 'icon' => 'fa-stethoscope'],
        '/contact'      => ['label' => 'Contact',      'icon' => 'fa-envelope'],
    ];
    $currentPath = request()->getPathInfo();
@endphp

<header class="site-header">
    <div class="container-custom mx-auto">
        <div class="header-inner">

            <!-- Logo -->
            @php $logo = setting('logo'); @endphp
            <a href="/" class="flex items-center">
                @if($logo && $logo != 'null' && $logo != '')
                    <img src="{{ $logo }}" alt="{{ setting('company_name', 'DBillers') }}" class="h-8 md:h-10 w-auto object-contain">
                @else
                    <span class="text-2xl md:text-3xl font-bold text-gray-900 hover:text-gray-700 transition">
                        {{ setting('company_name', 'DBillers') }}
                    </span>
                @endif
            </a>

            <!-- Desktop nav -->
            <nav class="hidden md:flex space-x-8">
                @foreach($navItems as $url => $item)
                    <a href="{{ $url }}"
                       class="text-gray-600 hover:text-[#1A4F8B] font-medium transition relative group {{ $currentPath === $url ? 'text-[#1A4F8B]' : '' }}">
                        {{ $item['label'] }}
                        <span class="absolute bottom-[-4px] left-0 h-0.5 bg-[#1A4F8B] transition-all group-hover:w-full {{ $currentPath === $url ? 'w-full' : 'w-0' }}"></span>
                    </a>
                @endforeach
            </nav>

            <!-- Desktop CTA -->
            <div class="hidden md:block">
                <a href="/contact"
                   class="bg-[#1A4F8B] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#0E3A6B] transition shadow-md hover:shadow-lg">
                    Get Quote
                </a>
            </div>

            <!-- Hamburger (mobile only) -->
            <button class="ham-btn" id="hamBtn" aria-label="Open menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div>
    </div>
</header>

<!-- Overlay -->
<div class="mob-overlay" id="mobOverlay"></div>

<!-- Bottom sheet -->
<div class="mob-sheet" id="mobSheet" role="dialog" aria-modal="true" aria-label="Navigation menu">

    <!-- Drag handle -->
    <div class="mob-sheet-handle"><span></span></div>

    <!-- Sheet header -->
    <div class="mob-sheet-header">
        <a href="/" class="mob-sheet-brand">{{ setting('company_name', 'DBillers') }}</a>
        <button class="mob-sheet-close" id="mobClose" aria-label="Close menu">
            <i class="fas fa-xmark"></i>
        </button>
    </div>

    <!-- Nav links -->
    <nav class="mob-nav">
        @foreach($navItems as $url => $item)
            <a href="{{ $url }}" class="mob-link {{ $currentPath === $url ? 'active' : '' }}">
                <i class="fas {{ $item['icon'] }}"></i>
                {{ $item['label'] }}
            </a>
        @endforeach
    </nav>

    <div class="mob-divider"></div>

    <!-- Secondary links -->
    <div class="mob-secondary">
        <a href="/privacy-policy">Privacy Policy</a>
        <a href="/terms-of-service">Terms of Service</a>
    </div>

    <!-- CTA -->
    <div class="mob-cta">
        <a href="/contact" class="mob-link">Free Consultation &rarr;</a>
    </div>

</div>

<script>
(function () {
    const hamBtn   = document.getElementById('hamBtn');
    const overlay  = document.getElementById('mobOverlay');
    const sheet    = document.getElementById('mobSheet');
    const closeBtn = document.getElementById('mobClose');

    function openMenu() {
        overlay.classList.add('is-visible');
        requestAnimationFrame(() => {
            overlay.classList.add('is-open');
            sheet.classList.add('is-open');
        });
        hamBtn.classList.add('is-open');
        hamBtn.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
        overlay.classList.remove('is-open');
        sheet.classList.remove('is-open');
        hamBtn.classList.remove('is-open');
        hamBtn.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
        setTimeout(() => overlay.classList.remove('is-visible'), 320);
    }

    hamBtn.addEventListener('click', openMenu);
    closeBtn.addEventListener('click', closeMenu);
    overlay.addEventListener('click', closeMenu);

    // Close on any nav link tap
    document.querySelectorAll('.mob-link').forEach(function(link) {
        link.addEventListener('click', closeMenu);
    });

    // Close on resize to desktop
    window.addEventListener('resize', function () {
        if (window.innerWidth >= 768) closeMenu();
    });

    // Keyboard: close on Escape
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeMenu();
    });
})();
</script>
