<header class="bg-white shadow-md sticky top-0 z-50 transition-all duration-300">
    <div class="container-custom mx-auto">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <a href="/" class="text-2xl md:text-3xl font-bold text-gray-900 hover:text-gray-700 transition">
                DBillers
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
                       class="text-gray-600 hover:text-gray-900 font-medium transition relative group">
                        {{ $label }}
                        <span class="absolute bottom-[-4px] left-0 w-0 h-0.5 bg-gray-900 transition-all group-hover:w-full"></span>
                    </a>
                @endforeach
            </nav>
            
            <!-- CTA Button Desktop -->
            <div class="hidden md:block">
                <a href="/contact" 
                   class="bg-gray-900 text-white px-6 py-2 rounded-lg font-semibold hover:bg-gray-800 transition shadow-md hover:shadow-lg">
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
        
        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden pb-4">
            <div class="flex flex-col space-y-3">
                @foreach($navItems as $url => $label)
                    <a href="{{ $url }}" 
                       class="text-gray-600 hover:text-gray-900 font-medium py-2 px-4 hover:bg-gray-50 rounded-lg transition">
                        {{ $label }}
                    </a>
                @endforeach
                <a href="/contact" 
                   class="bg-gray-900 text-white px-6 py-2 rounded-lg font-semibold text-center hover:bg-gray-800 transition">
                    Get Quote
                </a>
            </div>
        </div>
    </div>
</header>

<script>
    document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
    
    // Close mobile menu on window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) {
            document.getElementById('mobile-menu')?.classList.add('hidden');
        }
    });
</script>
