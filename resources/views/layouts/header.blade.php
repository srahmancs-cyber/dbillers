<header class="bg-white shadow-sm sticky top-0 z-50">
    <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold text-gray-900">DBillers</a>
        
        <div class="hidden md:flex space-x-8">
            <a href="/" class="text-gray-600 hover:text-gray-900 transition">Home</a>
            <a href="/about" class="text-gray-600 hover:text-gray-900 transition">About Us</a>
            <a href="/services" class="text-gray-600 hover:text-gray-900 transition">Services</a>
            <a href="/specialities" class="text-gray-600 hover:text-gray-900 transition">Specialities</a>
            <a href="/contact" class="text-gray-600 hover:text-gray-900 transition">Contact Us</a>
        </div>
        
        <button id="mobile-menu-button" class="md:hidden text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </nav>
    
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
        <div class="flex flex-col space-y-3 px-4 py-3">
            <a href="/" class="text-gray-600 hover:text-gray-900">Home</a>
            <a href="/about" class="text-gray-600 hover:text-gray-900">About Us</a>
            <a href="/services" class="text-gray-600 hover:text-gray-900">Services</a>
            <a href="/specialities" class="text-gray-600 hover:text-gray-900">Specialities</a>
            <a href="/contact" class="text-gray-600 hover:text-gray-900">Contact Us</a>
        </div>
    </div>
</header>

<script>
    document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
