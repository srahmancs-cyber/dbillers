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

    /* ── Desktop Nav ── */
    .desk-nav {
        display: flex;
        align-items: center;
        gap: 2rem;
    }
    .desk-nav-link {
        font-size: 0.9375rem;
        font-weight: 500;
        color: #4B5563;
        text-decoration: none;
        position: relative;
        display: flex;
        align-items: center;
        gap: 0.25rem;
        white-space: nowrap;
        transition: color 0.2s;
        padding-bottom: 2px;
    }
    .desk-nav-link::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 0; width: 0; height: 2px;
        background: #1A4F8B;
        transition: width 0.2s;
        border-radius: 2px;
    }
    .desk-nav-link:hover,
    .desk-nav-link.is-active { color: #1A4F8B; }
    .desk-nav-link:hover::after,
    .desk-nav-link.is-active::after { width: 100%; }

    /* ══════════════════════════════════════
       DESKTOP SERVICES DROPDOWN
    ══════════════════════════════════════ */
    .nav-dropdown-wrap { position: relative; }

    .nav-dropdown {
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%) translateY(-4px);
        width: 460px;
        background: #fff;
        border-radius: 0.875rem;
        box-shadow: 0 16px 48px rgba(0,0,0,.13);
        /* padding-top = invisible mouse bridge + visual breathing room */
        padding: 28px 0.875rem 0.875rem;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.18s ease, transform 0.18s ease;
        z-index: 200;
        /* no ::before / ::after decorations */
    }

    .nav-dropdown-wrap:hover .nav-dropdown,
    .nav-dropdown-wrap:focus-within .nav-dropdown {
        opacity: 1;
        pointer-events: auto;
        transform: translateX(-50%) translateY(0);
    }

    /* RCM — same layout as regular items, just bold+blue */
    .nav-dd-featured {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0.625rem;
        border-radius: 0.5rem;
        text-decoration: none;
        margin-bottom: 0.125rem;
        transition: background 0.15s;
        font-size: 0.8125rem;
        font-weight: 700;
        color: #1A4F8B;
    }
    .nav-dd-featured:hover { background: #f0f4f8; }
    .nav-dd-feat-icon {
        width: 1rem;
        text-align: center;
        color: #1A4F8B;
        font-size: 0.8125rem;
        opacity: 0.85;
        flex-shrink: 0;
    }
    .nav-dd-feat-badge {
        margin-left: auto;
        flex-shrink: 0;
        font-size: 0.625rem;
        font-weight: 700;
        color: #1A4F8B;
        background: #dbeafe;
        padding: 0.125rem 0.4rem;
        border-radius: 2rem;
        white-space: nowrap;
    }

    /* thin divider */
    .nav-dd-sep {
        height: 1px;
        background: #f1f5f9;
        margin: 0.5rem 0;
    }

    /* 2-column grid */
    .nav-dd-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.125rem 0.25rem;
    }
    .nav-dd-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0.625rem;
        border-radius: 0.5rem;
        font-size: 0.8125rem;
        font-weight: 500;
        color: #374151;
        text-decoration: none;
        transition: background 0.15s, color 0.15s;
    }
    .nav-dd-item:hover { background: #f0f4f8; color: #1A4F8B; }
    .nav-dd-item i {
        width: 1rem;
        text-align: center;
        color: #1A4F8B;
        font-size: 0.8125rem;
        opacity: 0.7;
        flex-shrink: 0;
    }

    .nav-dd-footer {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.375rem;
        padding: 0.625rem 0 0;
        margin-top: 0.375rem;
        font-size: 0.8125rem;
        font-weight: 600;
        color: #1A4F8B;
        text-decoration: none;
        border-top: 1px solid #f1f5f9;
    }
    .nav-dd-footer:hover { color: #0E3A6B; text-decoration: underline; }

    /* ── Hamburger ── */
    .ham-btn {
        display: none;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 2.25rem; height: 2.25rem;
        background: none; border: none;
        cursor: pointer; padding: 0; gap: 5px;
    }
    .ham-btn span {
        display: block;
        width: 22px; height: 2px;
        background: #1E2A3A;
        border-radius: 2px;
        transition: transform 0.3s ease, opacity 0.3s ease, width 0.3s ease;
        transform-origin: center;
    }
    .ham-btn.is-open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
    .ham-btn.is-open span:nth-child(2) { opacity: 0; width: 0; }
    .ham-btn.is-open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

    /* ── Mobile overlay ── */
    .mob-overlay {
        display: none;
        position: fixed; inset: 0;
        background: rgba(0,0,0,0.45);
        z-index: 200; opacity: 0;
        transition: opacity 0.3s ease;
    }
    .mob-overlay.is-visible { display: block; }
    .mob-overlay.is-open    { opacity: 1; }

    /* ── Mobile bottom sheet ── */
    .mob-sheet {
        position: fixed;
        bottom: 0; left: 0; right: 0;
        z-index: 201;
        background: #fff;
        border-radius: 1.25rem 1.25rem 0 0;
        padding: 0 0 calc(env(safe-area-inset-bottom) + 1.25rem);
        transform: translateY(100%);
        transition: transform 0.35s cubic-bezier(0.32,0.72,0,1);
        box-shadow: 0 -8px 40px rgba(0,0,0,.12);
        max-height: 90vh;
        overflow-y: auto;
    }
    .mob-sheet.is-open { transform: translateY(0); }

    .mob-sheet-handle {
        display: flex; justify-content: center;
        padding: 0.875rem 0 0.5rem;
    }
    .mob-sheet-handle span {
        width: 2.5rem; height: 4px;
        background: #e2e8f0; border-radius: 2px;
    }
    .mob-sheet-header {
        display: flex; align-items: center;
        justify-content: space-between;
        padding: 0 1.25rem 0.75rem;
        border-bottom: 1px solid #f1f5f9;
    }
    .mob-sheet-brand {
        font-size: 1.125rem; font-weight: 700;
        color: #1E2A3A; text-decoration: none;
    }
    .mob-sheet-close {
        width: 2rem; height: 2rem;
        border-radius: 50%; background: #f1f5f9;
        border: none; cursor: pointer;
        display: flex; align-items: center; justify-content: center;
        color: #64748b; font-size: 1rem;
        transition: background 0.2s;
    }
    .mob-sheet-close:hover { background: #e2e8f0; }

    /* ── Mobile nav items ── */
    .mob-nav { padding: 0.5rem 1rem; }
    .mob-nav-item {
        display: flex;
        align-items: center;
        gap: 0.875rem;
        padding: 0.875rem 0.75rem;
        border-radius: 0.625rem;
        font-size: 1rem; font-weight: 500;
        color: #374151; text-decoration: none;
        transition: background 0.18s, color 0.18s;
        border-left: 3px solid transparent;
    }
    .mob-nav-item:hover, .mob-nav-item.active {
        background: #f0f4f8; color: #1A4F8B;
        border-left-color: #1A4F8B;
    }
    .mob-nav-item i.nav-icon {
        width: 1.25rem; text-align: center;
        color: #1A4F8B; font-size: 0.9375rem; opacity: 0.8;
        flex-shrink: 0;
    }

    /* Services accordion row */
    .mob-services-trigger {
        display: flex;
        align-items: center;
        gap: 0.875rem;
        padding: 0.875rem 0.75rem;
        border-radius: 0.625rem;
        font-size: 1rem; font-weight: 500;
        color: #374151;
        cursor: pointer;
        user-select: none;
        border-left: 3px solid transparent;
        transition: background 0.18s, color 0.18s;
    }
    .mob-services-trigger:hover,
    .mob-services-trigger.is-open {
        background: #f0f4f8; color: #1A4F8B;
        border-left-color: #1A4F8B;
    }
    .mob-services-trigger i.nav-icon {
        width: 1.25rem; text-align: center;
        color: #1A4F8B; font-size: 0.9375rem; opacity: 0.8;
        flex-shrink: 0;
    }
    .mob-services-trigger .chev {
        margin-left: auto;
        color: #94a3b8;
        font-size: 0.75rem;
        transition: transform 0.25s ease;
        flex-shrink: 0;
    }
    .mob-services-trigger.is-open .chev { transform: rotate(180deg); }

    /* Sub-menu panel */
    .mob-submenu {
        display: none;
        background: #f8fafc;
        border-radius: 0.625rem;
        margin: 0.25rem 0 0.25rem 2.125rem;
        padding: 0.375rem 0;
        overflow: hidden;
    }
    .mob-submenu.is-open { display: block; }

    .mob-sub-item {
        display: flex;
        align-items: center;
        gap: 0.625rem;
        padding: 0.6875rem 0.875rem;
        font-size: 0.9375rem;
        font-weight: 500;
        color: #374151;
        text-decoration: none;
        transition: background 0.15s, color 0.15s;
        border-left: 2px solid transparent;
    }
    .mob-sub-item:hover {
        background: #e9eff6;
        color: #1A4F8B;
        border-left-color: #1A4F8B;
    }
    .mob-sub-item i {
        width: 1rem; text-align: center;
        color: #1A4F8B; font-size: 0.8125rem; opacity: 0.7;
        flex-shrink: 0;
    }
    /* RCM inside sub-menu */
    .mob-sub-item.is-featured {
        font-weight: 700;
        color: #1A4F8B;
    }
    .mob-sub-item.is-featured i { opacity: 1; }

    .mob-divider { height: 1px; background: #f1f5f9; margin: 0.5rem 1.25rem; }
    .mob-secondary { display: flex; gap: 1.5rem; padding: 0.5rem 1.75rem; }
    .mob-secondary a { font-size: 0.8125rem; color: #94a3b8; text-decoration: none; transition: color 0.2s; }
    .mob-secondary a:hover { color: #1A4F8B; }
    .mob-cta { padding: 0.75rem 1.25rem 0; }
    .mob-cta a {
        display: block; text-align: center;
        background: #1A4F8B; color: #fff;
        padding: 0.875rem; border-radius: 0.75rem;
        font-weight: 600; font-size: 0.9375rem;
        text-decoration: none; transition: background 0.2s;
    }
    .mob-cta a:hover { background: #0E3A6B; }

    @media (max-width: 767px) {
        .ham-btn  { display: flex; }
        .desk-nav { display: none; }
    }
</style>

@php
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
            <nav class="desk-nav">

                <a href="/"      class="desk-nav-link {{ $currentPath === '/'      ? 'is-active' : '' }}">Home</a>
                <a href="/about" class="desk-nav-link {{ $currentPath === '/about' ? 'is-active' : '' }}">About</a>

                <!-- Services + dropdown -->
                <div class="nav-dropdown-wrap">
                    <a href="/services"
                       class="desk-nav-link {{ in_array($currentPath, ['/services','/revenue-cycle-management']) ? 'is-active' : '' }}">
                        Services <i class="fas fa-chevron-down" style="font-size:.5625rem;opacity:.6;margin-left:.125rem;"></i>
                    </a>

                    <div class="nav-dropdown">

                        <!-- RCM featured -->
                        <a href="/revenue-cycle-management" class="nav-dd-featured">
                            <i class="nav-dd-feat-icon fas fa-chart-line"></i>
                            Revenue Cycle Management
                            <span class="nav-dd-feat-badge">Featured</span>
                        </a>

                        <div class="nav-dd-sep"></div>

                        <!-- 2-col grid -->
                        <div class="nav-dd-grid">
                            <a href="/services" class="nav-dd-item"><i class="fas fa-headset"></i> Medical Billing</a>
                            <a href="/services" class="nav-dd-item"><i class="fas fa-code"></i> Medical Coding</a>
                            <a href="/services" class="nav-dd-item"><i class="fas fa-id-card"></i> Provider Credentialing</a>
                            <a href="/services" class="nav-dd-item"><i class="fas fa-file-invoice"></i> Claims Processing</a>
                            <a href="/services" class="nav-dd-item"><i class="fas fa-envelope-open-text"></i> Denial Management</a>
                            <a href="/services" class="nav-dd-item"><i class="fas fa-magnifying-glass-chart"></i> AR Recovery</a>
                        </div>

                        <a href="/services" class="nav-dd-footer">
                            View all services <i class="fas fa-arrow-right" style="font-size:.625rem;"></i>
                        </a>

                    </div>
                </div>

                <a href="/specialities" class="desk-nav-link {{ $currentPath === '/specialities' ? 'is-active' : '' }}">Specialities</a>
                <a href="/contact"      class="desk-nav-link {{ $currentPath === '/contact'      ? 'is-active' : '' }}">Contact</a>

            </nav>

            <!-- Desktop CTA -->
            <div class="hidden md:block">
                <a href="/contact"
                   class="bg-[#1A4F8B] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#0E3A6B] transition shadow-md hover:shadow-lg">
                    Get Quote
                </a>
            </div>

            <!-- Hamburger -->
            <button class="ham-btn" id="hamBtn" aria-label="Open menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>

        </div>
    </div>
</header>

<!-- Overlay -->
<div class="mob-overlay" id="mobOverlay"></div>

<!-- Mobile bottom sheet -->
<div class="mob-sheet" id="mobSheet" role="dialog" aria-modal="true" aria-label="Navigation menu">

    <div class="mob-sheet-handle"><span></span></div>

    <div class="mob-sheet-header">
        <a href="/" class="mob-sheet-brand">{{ setting('company_name', 'DBillers') }}</a>
        <button class="mob-sheet-close" id="mobClose" aria-label="Close menu">
            <i class="fas fa-xmark"></i>
        </button>
    </div>

    <div class="mob-nav">

        <a href="/"             class="mob-nav-item mob-link {{ $currentPath === '/'             ? 'active' : '' }}">
            <i class="fas fa-house nav-icon"></i> Home
        </a>
        <a href="/about"        class="mob-nav-item mob-link {{ $currentPath === '/about'        ? 'active' : '' }}">
            <i class="fas fa-circle-info nav-icon"></i> About
        </a>

        <!-- Services accordion -->
        <div id="mobServicesWrap">
            <div class="mob-services-trigger {{ in_array($currentPath, ['/services','/revenue-cycle-management']) ? 'is-open' : '' }}"
                 id="mobServicesTrigger"
                 role="button" tabindex="0"
                 aria-expanded="{{ in_array($currentPath, ['/services','/revenue-cycle-management']) ? 'true' : 'false' }}"
                 aria-controls="mobServicesMenu">
                <i class="fas fa-briefcase-medical nav-icon"></i>
                Services
                <i class="fas fa-chevron-down chev"></i>
            </div>

            <div class="mob-submenu {{ in_array($currentPath, ['/services','/revenue-cycle-management']) ? 'is-open' : '' }}"
                 id="mobServicesMenu">
                <!-- RCM featured -->
                <a href="/revenue-cycle-management" class="mob-sub-item is-featured mob-link {{ $currentPath === '/revenue-cycle-management' ? 'active' : '' }}">
                    <i class="fas fa-chart-line"></i> Revenue Cycle Management
                </a>
                <a href="/services" class="mob-sub-item mob-link {{ $currentPath === '/services' ? 'active' : '' }}">
                    <i class="fas fa-headset"></i> Medical Billing
                </a>
                <a href="/services" class="mob-sub-item mob-link">
                    <i class="fas fa-code"></i> Medical Coding
                </a>
                <a href="/services" class="mob-sub-item mob-link">
                    <i class="fas fa-id-card"></i> Provider Credentialing
                </a>
                <a href="/services" class="mob-sub-item mob-link">
                    <i class="fas fa-file-invoice"></i> Claims Processing
                </a>
                <a href="/services" class="mob-sub-item mob-link">
                    <i class="fas fa-envelope-open-text"></i> Denial Management
                </a>
                <a href="/services" class="mob-sub-item mob-link">
                    <i class="fas fa-magnifying-glass-chart"></i> AR Recovery
                </a>
            </div>
        </div>

        <a href="/specialities" class="mob-nav-item mob-link {{ $currentPath === '/specialities' ? 'active' : '' }}">
            <i class="fas fa-stethoscope nav-icon"></i> Specialities
        </a>
        <a href="/contact"      class="mob-nav-item mob-link {{ $currentPath === '/contact'      ? 'active' : '' }}">
            <i class="fas fa-envelope nav-icon"></i> Contact
        </a>

    </div>

    <div class="mob-divider"></div>

    <div class="mob-secondary">
        <a href="/privacy-policy">Privacy Policy</a>
        <a href="/terms-of-service">Terms of Service</a>
    </div>

    <div class="mob-cta">
        <a href="/contact" class="mob-link">Free Consultation &rarr;</a>
    </div>

</div>

<script>
(function () {
    /* ── Bottom sheet ── */
    const hamBtn   = document.getElementById('hamBtn');
    const overlay  = document.getElementById('mobOverlay');
    const sheet    = document.getElementById('mobSheet');
    const closeBtn = document.getElementById('mobClose');

    function openMenu() {
        overlay.classList.add('is-visible');
        requestAnimationFrame(function () {
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
        setTimeout(function () { overlay.classList.remove('is-visible'); }, 320);
    }

    hamBtn.addEventListener('click', openMenu);
    closeBtn.addEventListener('click', closeMenu);
    overlay.addEventListener('click', closeMenu);

    /* Close on link tap (but not the accordion trigger) */
    document.querySelectorAll('.mob-link').forEach(function (link) {
        link.addEventListener('click', closeMenu);
    });

    window.addEventListener('resize', function () {
        if (window.innerWidth >= 768) closeMenu();
    });
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeMenu();
    });

    /* ── Services accordion ── */
    const trigger = document.getElementById('mobServicesTrigger');
    const submenu = document.getElementById('mobServicesMenu');

    function toggleServices(e) {
        e.preventDefault();
        var open = submenu.classList.toggle('is-open');
        trigger.classList.toggle('is-open', open);
        trigger.setAttribute('aria-expanded', open ? 'true' : 'false');
    }

    trigger.addEventListener('click', toggleServices);
    trigger.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') toggleServices(e);
    });
})();
</script>
