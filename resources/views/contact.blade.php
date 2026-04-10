@extends('layouts.app')

@section('content')

<!-- Section 1: Hero -->
<section class="bg-white">
    <div class="container-custom mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Contact Us</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Get in touch with our billing experts. We're here to answer your questions and help you maximize your revenue cycle.
        </p>
    </div>
</section>

<!-- Section 2: Contact Form & Info -->
<section class="bg-light">
    <div class="container-custom mx-auto">
        @if(session('success'))
            <div class="bg-green-50 border border-green-400 text-green-700 px-6 py-4 rounded-xl mb-8 text-center">
                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Contact Form -->
            <div class="card">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Send Us a Message</h2>
                <form method="POST" action="{{ route('contact.submit') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Full Name <span class="text-primary">*</span></label>
                        <input type="text" name="name" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-primary transition">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Email Address <span class="text-primary">*</span></label>
                        <input type="email" name="email" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-primary transition">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                        <input type="text" name="phone" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-primary transition">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Message <span class="text-primary">*</span></label>
                        <textarea name="message" required rows="5" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-primary transition"></textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full justify-center">
                        Send Message <i class="fas fa-paper-plane ml-2"></i>
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="card">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Get in Touch</h2>
                <div class="space-y-6">
                    @php
                        $phone = setting('company_phone');
                        $email = setting('company_email');
                        $address = setting('company_address');
                    @endphp
                    
                    @if($phone)
                    <div class="flex items-start gap-4">
                        <div class="feature-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Phone</h3>
                            <p class="text-gray-600">{{ $phone }}</p>
                        </div>
                    </div>
                    @endif
                    
                    @if($email)
                    <div class="flex items-start gap-4">
                        <div class="feature-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Email</h3>
                            <p class="text-gray-600">{{ $email }}</p>
                        </div>
                    </div>
                    @endif
                    
                    @if($address)
                    <div class="flex items-start gap-4">
                        <div class="feature-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Address</h3>
                            <p class="text-gray-600">{{ $address }}</p>
                        </div>
                    </div>
                    @endif
                    
                    <div class="flex items-start gap-4">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Business Hours</h3>
                            <p class="text-gray-600">Monday - Friday: 9AM - 6PM EST</p>
                        </div>
                    </div>
                </div>
                
                <!-- Trust Badge -->
                <div class="mt-8 pt-6 border-t border-gray-200 text-center">
                    <div class="flex justify-center gap-1 text-yellow-400 mb-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="text-sm text-gray-500">Rated 4.8/5 by over 350 healthcare providers</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 3: FAQ Preview -->
<section class="bg-white">
    <div class="container-custom mx-auto text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
            Find quick answers to common questions about our billing services.
        </p>
        <a href="/faq" class="btn-secondary">View All FAQs <i class="fas fa-arrow-right"></i></a>
    </div>
</section>

<!-- Section 4: Final CTA -->
<section style="background-color: #1A4F8B;" class="text-white text-center">
    <div class="container-custom mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Improve Your Revenue Cycle?</h2>
        <p class="text-white/90 text-lg mb-8">Schedule a free consultation with our billing experts today.</p>
        <a href="/contact" class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition inline-flex items-center gap-2">
            Book Free Consultation <i class="fas fa-calendar-alt"></i>
        </a>
    </div>
</section>

@endsection
