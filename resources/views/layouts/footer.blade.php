<footer class="bg-gray-900 text-gray-300 pt-12 pb-6 mt-auto">
    <div class="container-custom mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <!-- Company Info -->
            <div>
                <h3 class="text-2xl font-bold text-white mb-4">{{ setting('company_name') ?? 'DBillers' }}</h3>
                <p class="text-gray-400 text-sm mb-4 leading-relaxed">
                    Precision Medical Billing for Healthcare Providers Across America.
                </p>
                <div class="flex space-x-4">
                    @if(setting('facebook_url'))
                        <a href="{{ setting('facebook_url') }}" target="_blank" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-facebook-f text-lg"></i>
                        </a>
                    @endif
                    @if(setting('twitter_url'))
                        <a href="{{ setting('twitter_url') }}" target="_blank" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-twitter text-lg"></i>
                        </a>
                    @endif
                    @if(setting('linkedin_url'))
                        <a href="{{ setting('linkedin_url') }}" target="_blank" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-linkedin-in text-lg"></i>
                        </a>
                    @endif
                </div>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h4 class="font-semibold text-white text-lg mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="/about" class="text-gray-400 hover:text-white transition text-sm">About Us</a></li>
                    <li><a href="/services" class="text-gray-400 hover:text-white transition text-sm">Services</a></li>
                    <li><a href="/specialities" class="text-gray-400 hover:text-white transition text-sm">Specialities</a></li>
                    <li><a href="/contact" class="text-gray-400 hover:text-white transition text-sm">Contact</a></li>
                </ul>
            </div>
            
            <!-- Services -->
            <div>
                <h4 class="font-semibold text-white text-lg mb-4">Our Services</h4>
                <ul class="space-y-2">
                    <li><a href="/services" class="text-gray-400 hover:text-white transition text-sm">Medical Billing</a></li>
                    <li><a href="/services" class="text-gray-400 hover:text-white transition text-sm">Medical Coding</a></li>
                    <li><a href="/services" class="text-gray-400 hover:text-white transition text-sm">Provider Credentialing</a></li>
                    <li><a href="/services" class="text-gray-400 hover:text-white transition text-sm">Revenue Cycle Management</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div>
                <h4 class="font-semibold text-white text-lg mb-4">Contact</h4>
                <ul class="space-y-2 text-gray-400 text-sm">
                    @if(setting('company_phone'))
                        <li class="flex items-center gap-2">
                            <i class="fas fa-phone-alt w-4 text-gray-500"></i>
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('company_phone')) }}" class="hover:text-white transition">
                                {{ setting('company_phone') }}
                            </a>
                        </li>
                    @endif
                    @if(setting('company_email'))
                        <li class="flex items-center gap-2">
                            <i class="fas fa-envelope w-4 text-gray-500"></i>
                            <a href="mailto:{{ setting('company_email') }}" class="hover:text-white transition">
                                {{ setting('company_email') }}
                            </a>
                        </li>
                    @endif
                    @if(setting('company_address'))
                        <li class="flex items-start gap-2">
                            <i class="fas fa-map-marker-alt w-4 text-gray-500 mt-0.5"></i>
                            <a href="https://maps.google.com/?q={{ urlencode(setting('company_address')) }}" target="_blank" class="hover:text-white transition">
                                {{ setting('company_address') }}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        
        <!-- Bottom Bar -->
        <div class="border-t border-gray-800 pt-6 text-center text-gray-500 text-sm">
            <p>&copy; {{ date('Y') }} {{ setting('company_name') ?? 'DBillers' }}. All rights reserved.</p>
            <div class="flex justify-center gap-4 mt-2">
                <a href="/privacy-policy" class="text-gray-500 hover:text-gray-300 transition">Privacy Policy</a>
                <a href="/terms-of-service" class="text-gray-500 hover:text-gray-300 transition">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
