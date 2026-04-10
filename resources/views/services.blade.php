@extends('layouts.app')

@section('content')

<!-- Section 1: Hero -->
<section class="bg-white">
    <div class="container-custom mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Medical Billing Services</h1>
        <h2 class="text-xl md:text-2xl text-primary font-semibold mb-4">Comprehensive Revenue Cycle Management for Healthcare Providers</h2>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto mb-8">
            We offer end-to-end medical billing and coding solutions for physicians, clinics, and hospitals across the USA. Our certified team handles everything from claim submission to denial management, so you can focus on patient care.
        </p>
        <a href="/contact" class="btn-primary">Book a Free Consultation <i class="fas fa-arrow-right"></i></a>
    </div>
</section>

<!-- Section 2: Core Services Overview -->
<section class="bg-light">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2>What We Do</h2>
            <div class="underline"></div>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Every practice is different. That's why we offer flexible, specialty-specific billing services. Below are the core solutions we provide to help you maximize revenue and reduce administrative burden.</p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Service 1 -->
            <div class="card">
                <i class="fas fa-chart-line text-4xl text-primary mb-4"></i>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Medical Billing Consultation</h3>
                <p class="text-gray-600 mb-3">Our expert billers manage the complete billing cycle for your practice. We handle patient check-in and check-out, claim creation, payment processing, and denial management. You get a dedicated team that works like an extension of your office.</p>
                <a href="/contact" class="text-primary font-semibold hover:underline">Learn More <i class="fas fa-arrow-right"></i></a>
            </div>
            
            <!-- Service 2 -->
            <div class="card">
                <i class="fas fa-code text-4xl text-primary mb-4"></i>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Medical Coding</h3>
                <p class="text-gray-600 mb-3">Certified clinical coders translate patient services into accurate ICD-10 and CPT codes. We generate clean "super-bills" that insurance payers accept quickly. Proper coding means fewer denials and faster payments.</p>
                <a href="/contact" class="text-primary font-semibold hover:underline">Learn More <i class="fas fa-arrow-right"></i></a>
            </div>
            
            <!-- Service 3 -->
            <div class="card">
                <i class="fas fa-id-card text-4xl text-primary mb-4"></i>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Provider Credentialing</h3>
                <p class="text-gray-600 mb-3">Getting enrolled with insurance networks can take months. Our credentialing specialists handle the paperwork and follow-up to get you paneled with desirable payers. We help you secure maximum privileges and in-network reimbursement rates.</p>
                <a href="/contact" class="text-primary font-semibold hover:underline">Learn More <i class="fas fa-arrow-right"></i></a>
            </div>
            
            <!-- Service 4 -->
            <div class="card">
                <i class="fas fa-chart-pie text-4xl text-primary mb-4"></i>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Healthcare Revenue Cycle Management</h3>
                <p class="text-gray-600 mb-3">RCM is the big picture. We assign a dedicated biller to your practice who understands your specialty's unique needs. From patient registration to final payment posting, we optimize every step of your revenue cycle.</p>
                <a href="/contact" class="text-primary font-semibold hover:underline">Learn More <i class="fas fa-arrow-right"></i></a>
            </div>
            
            <!-- Service 5 -->
            <div class="card">
                <i class="fas fa-file-invoice text-4xl text-primary mb-4"></i>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Medical Claims Processing</h3>
                <p class="text-gray-600 mb-3">Claims management is where most practices lose money. We submit clean claims electronically, track them through payment, and fight denials aggressively. Our cloud-based system verifies insurance eligibility instantly and flags issues before submission.</p>
                <a href="/contact" class="text-primary font-semibold hover:underline">Learn More <i class="fas fa-arrow-right"></i></a>
            </div>
            
            <!-- Service 6 -->
            <div class="card">
                <i class="fas fa-envelope-open-text text-4xl text-primary mb-4"></i>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Denial Management & A/R Recovery</h3>
                <p class="text-gray-600 mb-3">Denied claims don't have to mean lost revenue. We analyze why claims were rejected, correct the issues, and resubmit promptly. For aged accounts receivable beyond 90 days, we pursue collections aggressively to recover what you're owed.</p>
                <a href="/contact" class="text-primary font-semibold hover:underline">Learn More <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- Section 3: Why Choose DBillers -->
<section class="bg-white">
    <div class="container-custom mx-auto">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">What Makes Our Billing Services Different</h2>
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-primary text-xl"></i>
                        <span class="text-gray-700"><strong>Pay-for-paid model</strong> – We only get paid when you get paid</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-primary text-xl"></i>
                        <span class="text-gray-700"><strong>No long-term contracts</strong> – Month-to-month flexibility</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-primary text-xl"></i>
                        <span class="text-gray-700"><strong>Free EHR software</strong> – Included with our billing services</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-primary text-xl"></i>
                        <span class="text-gray-700"><strong>24/7 claim monitoring</strong> – We work round the clock</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-primary text-xl"></i>
                        <span class="text-gray-700"><strong>US-based team</strong> – Local support, no offshore handoffs</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-primary text-xl"></i>
                        <span class="text-gray-700"><strong>Transparent reporting</strong> – Real-time dashboard access</span>
                    </div>
                </div>
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=500&h=400&fit=crop" 
                     alt="Medical billing team" 
                     class="rounded-2xl shadow-xl w-full">
            </div>
        </div>
    </div>
</section>

<!-- Section 4: Service Features Grid -->
<section class="bg-light">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2>What's Included With Every Service</h2>
            <div class="underline"></div>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="card text-center">
                <i class="fas fa-shield-alt text-4xl text-primary mb-3"></i>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Secure Data Transmission</h3>
                <p class="text-gray-500 text-sm">Safest digital encryption protects sensitive patient information (HIPAA compliant).</p>
            </div>
            <div class="card text-center">
                <i class="fas fa-bolt text-4xl text-primary mb-3"></i>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Instant Claim Submission</h3>
                <p class="text-gray-500 text-sm">Electronic billing files claims within hours, not days.</p>
            </div>
            <div class="card text-center">
                <i class="fas fa-clock text-4xl text-primary mb-3"></i>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Claim Follow-Up & Resolution</h3>
                <p class="text-gray-500 text-sm">Denied claims are appealed and reprocessed successfully.</p>
            </div>
            <div class="card text-center">
                <i class="fas fa-headset text-4xl text-primary mb-3"></i>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Dedicated Account Manager</h3>
                <p class="text-gray-500 text-sm">One point of contact who knows your practice inside out.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section 5: Pricing Overview -->
<section class="bg-white text-center">
    <div class="container-custom mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Simple, Transparent Pricing</h2>
        <p class="text-lg text-gray-600 mb-6">Our rates start as low as 2.49% of collections. No hidden fees. No surprise charges.</p>
        <div class="max-w-md mx-auto bg-primary text-white p-8 rounded-2xl shadow-xl mb-8">
            <i class="fas fa-dollar-sign text-4xl mb-3"></i>
            <p class="text-2xl font-bold mb-2">Save 30-40%</p>
            <p class="text-white/90">compared to in-house billing</p>
        </div>
        <a href="/contact" class="btn-primary">Get Instant Pricing Quote <i class="fas fa-arrow-right"></i></a>
    </div>
</section>

<!-- Section 6: Final Call to Action -->
<section style="background-color: #1A4F8B;" class="text-white text-center">
    <div class="container-custom mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Improve Your Revenue Cycle?</h2>
        <p class="text-white/90 text-lg mb-8">Join over 1,500 providers who trust DBillers with their medical billing.</p>
        <div class="flex flex-wrap gap-4 justify-center">
            <a href="/contact" class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">Schedule Free Demo <i class="fas fa-arrow-right"></i></a>
            <a href="/contact" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary transition">Contact Sales</a>
        </div>
    </div>
</section>

@endsection
