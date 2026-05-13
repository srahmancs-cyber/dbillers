<header class="bg-white shadow-md sticky top-0 z-50 transition-all duration-300">
    <div class="container-custom mx-auto">
        <div class="flex justify-between items-center py-4">
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
            
            <!-- Desktop Navigation -->
            <nav class="hidden md:flex space-x-8">
                @php
                    $navItems = [
                        '/' => 'Home',
                        '/about' => 'About',
                        '/services' => 'Services',
                        '/specialities' => 'Specialities',
                        '/contact' => 'Contact'
                    ];
                @endphp
                @foreach($navItems as $url => $label)
                    <a href="{{ $url }}" 
                       class="text-gray-600 hover:text-[#1A4F8B] font-medium transition relative group">
                        {{ $label }}
                        <span class="absolute bottom-[-4px] left-0 w-0 h-0.5 bg-[#1A4F8B] transition-all group-hover:w-full"></span>
                    </a>
                @endforeach
            </nav>
            
            <!-- CTA Button Desktop -->
            <div class="hidden md:block">
                <a href="/contact" 
                   class="bg-[#1A4F8B] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#0E3A6B] transition shadow-md hover:shadow-lg">
                    Get Quote
                </a>
            </div>
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="md:hidden text-gray-900 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
    
    <!-- Mobile Slide-out Menu -->
    <div id="mobile-menu-overlay" class="fixed inset-0 bg-black/50 z-50 hidden" style="opacity:0; transition:opacity 0.3s ease;"></div>
    <div id="mobile-menu-panel" class="fixed top-0 right-0 w-full h-full bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 ease-in-out">
        <div class="p-4 pt-12">
            <!-- Close Button -->
            <button id="mobile-menu-close" class="absolute top-4 right-4 w-10 h-10 flex items-center justify-center rounded-full bg-gray-100">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            
            <!-- Menu Items -->
            <div class="flex flex-col space-y-2">
                @foreach($navItems as $url => $label)
                    <a href="{{ $url }}" class="mobile-menu-item text-gray-800 text-lg font-medium py-3 px-4 hover:bg-gray-50 rounded-xl transition block">
                        {{ $label }}
                    </a>
                @endforeach
                <div class="border-t border-gray-100 my-4"></div>
                <a href="/privacy-policy" class="mobile-menu-item text-gray-500 py-2 px-4 text-sm">Privacy Policy</a>
                <a href="/terms-of-service" class="mobile-menu-item text-gray-500 py-2 px-4 text-sm">Terms of Service</a>
                <div class="pt-4 mt-2">
                    <a href="/contact" class="bg-[#1A4F8B] text-white px-4 py-2 rounded-lg text-sm text-center block">
                        Free Consultation
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    const menuBtn = document.getElementById('mobile-menu-button');
    const closeBtn = document.getElementById('mobile-menu-close');
    const overlay = document.getElementById('mobile-menu-overlay');
    const panel = document.getElementById('mobile-menu-panel');
    const menuItems = document.querySelectorAll('.mobile-menu-item');
    
    function openMenu() {
        overlay.classList.remove('hidden');
        panel.classList.remove('translate-x-full');
        setTimeout(() => {
            overlay.style.opacity = '1';
        }, 10);
        document.body.style.overflow = 'hidden';
    }
    
    function closeMenu() {
        panel.classList.add('translate-x-full');
        overlay.style.opacity = '0';
        setTimeout(() => {
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        }, 300);
    }
    
    if (menuBtn) menuBtn.addEventListener('click', openMenu);
    if (closeBtn) closeBtn.addEventListener('click', closeMenu);
    if (overlay) overlay.addEventListener('click', closeMenu);
    menuItems.forEach(item => {
        item.addEventListener('click', closeMenu);
    });
    
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) {
            closeMenu();
        }
    });
</script>
