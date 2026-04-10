@extends('layouts.app')

@section('content')

<!-- Section 1: Hero -->
<section class="bg-white">
    <div class="container-custom mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">About DBillers</h1>
        <h2 class="text-xl md:text-2xl text-primary font-semibold mb-4">Trusted Medical Billing Partner for Healthcare Providers Across America</h2>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto mb-8">
            We are a US-based medical billing company dedicated to helping physicians, clinics, and hospitals maximize revenue and minimize billing headaches. With over 1,200 certified billing experts and 1,500+ satisfied providers, we know what it takes to get claims paid.
        </p>
        <a href="#team" class="btn-primary">Meet Our Team <i class="fas fa-arrow-right"></i></a>
    </div>
</section>

<!-- Section 2: Our Story -->
<section class="bg-light">
    <div class="container-custom mx-auto">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Story</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    DBillers was founded with a simple mission: help healthcare providers get paid fairly and quickly for the care they deliver. We saw too many doctors struggling with denied claims, aging receivables, and complicated billing software. So we built a better way.
                </p>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    What started as a small team of certified billers has grown into one of the most trusted medical billing firms in the USA. Today, we serve over 75 medical specialties across all 50 states. But our focus remains the same – treat every practice like a partner, not a number.
                </p>
                
                <div class="grid grid-cols-3 gap-4 mt-6">
                    <div class="text-center">
                        <div class="stat-number">2015</div>
                        <p class="text-sm text-gray-500">Founded</p>
                    </div>
                    <div class="text-center">
                        <div class="stat-number">1,200+</div>
                        <p class="text-sm text-gray-500">Billing Experts</p>
                    </div>
                    <div class="text-center">
                        <div class="stat-number">1,500+</div>
                        <p class="text-sm text-gray-500">Providers</p>
                    </div>
                </div>
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=500&h=400&fit=crop" 
                     alt="DBillers team at work" 
                     class="rounded-2xl shadow-xl w-full">
            </div>
        </div>
    </div>
</section>

<!-- Section 3: Our Mission & Values -->
<section class="bg-white">
    <div class="container-custom mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Mission & Values</h2>
            <div class="underline mx-auto"></div>
        </div>
        
        <div style="background-color: #1A4F8B;" class="text-white p-8 md:p-12 rounded-2xl text-center mb-12">
            <i class="fas fa-quote-left text-3xl mb-4 opacity-50"></i>
            <p class="text-xl md:text-2xl font-semibold leading-relaxed">
                To empower healthcare providers with transparent, efficient, and results-driven medical billing so they can focus on what matters most – patient care.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="card text-center">
                <i class="fas fa-shield-alt text-4xl text-primary mb-3"></i>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Integrity</h3>
                <p class="text-gray-500">We bill honestly, communicate clearly, and never hide fees.</p>
            </div>
            <div class="card text-center">
                <i class="fas fa-graduation-cap text-4xl text-primary mb-3"></i>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Expertise</h3>
                <p class="text-gray-500">Continuous training ensures our team knows the latest coding rules and payer policies.</p>
            </div>
            <div class="card text-center">
                <i class="fas fa-chalkboard-user text-4xl text-primary mb-3"></i>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Accountability</h3>
                <p class="text-gray-500">We take ownership of your revenue cycle. If a claim is denied, we fix it.</p>
            </div>
            <div class="card text-center">
                <i class="fas fa-handshake text-4xl text-primary mb-3"></i>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Partnership</h3>
                <p class="text-gray-500">Your success is our success. We grow when you grow.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section 4: Our Team -->
<section id="team" class="bg-light">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2>The Experts Behind Your Billing</h2>
            <div class="underline"></div>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Our team includes certified professionals who live and breathe medical billing. From CPB and CPMA to RHIA and CMRS credentials, every biller is trained to handle specialty-specific challenges.</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="card text-center">
                <div class="stat-number">1,200+</div>
                <p class="text-gray-600 font-semibold">Certified Billers & Coders</p>
            </div>
            <div class="card text-center">
                <div class="stat-number">75+</div>
                <p class="text-gray-600 font-semibold">Specialties Covered</p>
            </div>
            <div class="card text-center">
                <div class="stat-number">24/7</div>
                <p class="text-gray-600 font-semibold">Support Availability</p>
            </div>
            <div class="card text-center">
                <div class="stat-number">98%</div>
                <p class="text-gray-600 font-semibold">Client Retention Rate</p>
            </div>
        </div>
        
        <div class="text-center mt-10">
            <a href="/contact" class="btn-secondary">View Credentials <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</section>

<!-- Section 5: Why Providers Choose DBillers -->
<section class="bg-white">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2>Why Over 1,500 Providers Trust Us</h2>
            <div class="underline"></div>
        </div>
        
        <div class="grid md:grid-cols-2 gap-8">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-primary text-xl"></i>
                    <span class="text-gray-700">Pay-for-paid pricing model</span>
                </div>
                <div class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-primary text-xl"></i>
                    <span class="text-gray-700">No long-term contracts</span>
                </div>
                <div class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-primary text-xl"></i>
                    <span class="text-gray-700">Free EHR software included</span>
                </div>
                <div class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-primary text-xl"></i>
                    <span class="text-gray-700">US-based support team</span>
                </div>
            </div>
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-primary text-xl"></i>
                    <span class="text-gray-700">99% clean claim ratio</span>
                </div>
                <div class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-primary text-xl"></i>
                    <span class="text-gray-700">30% average revenue increase</span>
                </div>
                <div class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-primary text-xl"></i>
                    <span class="text-gray-700">Dedicated account manager</span>
                </div>
                <div class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-primary text-xl"></i>
                    <span class="text-gray-700">Transparent monthly reporting</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 6: Our Approach -->
<section class="bg-light">
    <div class="container-custom mx-auto">
        <div class="section-headline">
            <h2>How We Work</h2>
            <div class="underline"></div>
        </div>
        
        <div class="grid md:grid-cols-4 gap-6">
            <div class="card text-center">
                <div class="text-4xl font-bold text-primary mb-3">1</div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Onboarding</h3>
                <p class="text-gray-500 text-sm">We learn your practice workflow, software, and specialty needs.</p>
            </div>
            <div class="card text-center">
                <div class="text-4xl font-bold text-primary mb-3">2</div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Integration</h3>
                <p class="text-gray-500 text-sm">We connect with your EHR or provide our free billing software.</p>
            </div>
            <div class="card text-center">
                <div class="text-4xl font-bold text-primary mb-3">3</div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Execution</h3>
                <p class="text-gray-500 text-sm">Our team handles coding, claims, follow-up, and denials daily.</p>
            </div>
            <div class="card text-center">
                <div class="text-4xl font-bold text-primary mb-3">4</div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Optimization</h3>
                <p class="text-gray-500 text-sm">We review reports monthly and fine-tune for better results.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section 7: Certifications & Accreditations -->
<section class="bg-white">
    <div class="container-custom mx-auto text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Certifications & Industry Recognition</h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
            We maintain the highest standards in medical billing and data security.
        </p>
        
        <div class="flex flex-wrap justify-center gap-3 mb-8">
            <span class="tag"><i class="fas fa-lock text-primary mr-2"></i> HIPAA Compliant</span>
            <span class="tag"><i class="fas fa-award text-primary mr-2"></i> A+ BBB Rated</span>
            <span class="tag"><i class="fas fa-star text-primary mr-2"></i> 4.8/5 Google Rating</span>
            <span class="tag"><i class="fas fa-star text-primary mr-2"></i> 4.8/5 Trustpilot Rating</span>
        </div>
        
        <div class="bg-light p-6 rounded-xl inline-block">
            <p class="text-gray-700 font-semibold">⭐ Rated 4.8 stars by over 350 verified providers across the United States</p>
        </div>
    </div>
</section>

<!-- Section 8: Final Call to Action -->
<section style="background-color: #1A4F8B;" class="text-white text-center">
    <div class="container-custom mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Start Your Journey With DBillers Today</h2>
        <p class="text-white/90 text-lg mb-8">Join hundreds of providers who have improved their revenue cycle and reduced billing stress.</p>
        <div class="flex flex-wrap gap-4 justify-center">
            <a href="/contact" class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">Schedule Free Demo <i class="fas fa-arrow-right"></i></a>
            <a href="/contact" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary transition">Contact Us</a>
        </div>
    </div>
</section>

@endsection
