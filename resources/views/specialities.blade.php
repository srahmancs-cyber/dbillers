@extends('layouts.app')

@section('content')

<!-- Section 1: Hero -->
<section class="bg-white">
    <div class="container-custom mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Specialty-Focused Medical Billing</h1>
        <h2 class="text-xl md:text-2xl text-primary font-semibold mb-4">Medical Billing Specialties</h2>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto mb-8">
            We provide specialty-focused medical billing services across more than 75 medical specialties. No matter your practice size or type, our team knows the specific coding rules, payer requirements, and documentation needs for your field.
        </p>
        <a href="/contact" class="btn-primary">Schedule Free Demo <i class="fas fa-arrow-right"></i></a>
    </div>
</section>

<!-- Section 2: Our Popular Specialties -->
<section class="bg-light">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2>Our Popular Specialties</h2>
            <div class="underline"></div>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">From cardiology to urgent care, our billers are trained in specialty-specific revenue cycle management.</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Cardiology -->
            <div class="card text-center">
                <i class="fas fa-heartbeat text-5xl text-primary mb-4"></i>
                <h3 class="text-lg font-bold text-gray-900">Cardiology</h3>
            </div>
            
            <!-- Urology -->
            <div class="card text-center">
                <i class="fas fa-kidneys text-5xl text-primary mb-4"></i>
                <h3 class="text-lg font-bold text-gray-900">Urology</h3>
            </div>
            
            <!-- Orthopedics -->
            <div class="card text-center">
                <i class="fas fa-bone text-5xl text-primary mb-4"></i>
                <h3 class="text-lg font-bold text-gray-900">Orthopedics</h3>
            </div>
            
            <!-- Behavioral Health -->
            <div class="card text-center">
                <i class="fas fa-brain text-5xl text-primary mb-4"></i>
                <h3 class="text-lg font-bold text-gray-900">Behavioral Health</h3>
            </div>
            
            <!-- Laboratory Billing -->
            <div class="card text-center">
                <i class="fas fa-microscope text-5xl text-primary mb-4"></i>
                <h3 class="text-lg font-bold text-gray-900">Laboratory Billing</h3>
            </div>
            
            <!-- Urgent Care -->
            <div class="card text-center">
                <i class="fas fa-truck-medical text-5xl text-primary mb-4"></i>
                <h3 class="text-lg font-bold text-gray-900">Urgent Care</h3>
            </div>
            
            <!-- Primary Care -->
            <div class="card text-center">
                <i class="fas fa-stethoscope text-5xl text-primary mb-4"></i>
                <h3 class="text-lg font-bold text-gray-900">Primary Care</h3>
            </div>
            
            <!-- Pediatrics -->
            <div class="card text-center">
                <i class="fas fa-baby text-5xl text-primary mb-4"></i>
                <h3 class="text-lg font-bold text-gray-900">Pediatrics</h3>
            </div>
            
            <!-- Dermatology -->
            <div class="card text-center">
                <i class="fas fa-allergies text-5xl text-primary mb-4"></i>
                <h3 class="text-lg font-bold text-gray-900">Dermatology</h3>
            </div>
            
            <!-- Gastroenterology -->
            <div class="card text-center">
                <i class="fas fa-stomach text-5xl text-primary mb-4"></i>
                <h3 class="text-lg font-bold text-gray-900">Gastroenterology</h3>
            </div>
            
            <!-- Neurology -->
            <div class="card text-center">
                <i class="fas fa-nerve text-5xl text-primary mb-4"></i>
                <h3 class="text-lg font-bold text-gray-900">Neurology</h3>
            </div>
            
            <!-- Obstetrics/Gynecology -->
            <div class="card text-center">
                <i class="fas fa-female text-5xl text-primary mb-4"></i>
                <h3 class="text-lg font-bold text-gray-900">OB/GYN</h3>
            </div>
        </div>
    </div>
</section>

<!-- Section 3: Specialty Not Listed -->
<section class="bg-white">
    <div class="container-custom mx-auto text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Couldn't Find Your Specialty Here?</h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
            Don't worry. We serve over 75 specialties. Drop your email below and our medical billing manager will contact you shortly.
        </p>
        
        <div class="max-w-md mx-auto">
            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                @csrf
                <input type="email" name="email" placeholder="Email address" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                <input type="text" name="specialty" placeholder="Your specialty name (optional)" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                <input type="hidden" name="name" value="Specialty Inquiry">
                <input type="hidden" name="message" value="Specialty not listed inquiry">
                <button type="submit" class="btn-primary w-full justify-center">Contact Me <i class="fas fa-arrow-right"></i></button>
            </form>
        </div>
    </div>
</section>

<!-- Section 4: Final Call to Action -->
<section class="text-white text-center" style="background-color: #1A4F8B;">
    <div class="container-custom mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Schedule a Free Demo</h2>
        <p class="text-white/90 text-lg mb-8">Sign up and book a free service demo</p>
        <div class="flex flex-wrap gap-4 justify-center">
            <a href="/contact" class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">Free Demo <i class="fas fa-arrow-right"></i></a>
            <a href="/contact" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary transition">See Pricing Packages</a>
        </div>
    </div>
</section>

@endsection
