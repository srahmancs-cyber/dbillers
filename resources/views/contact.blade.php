@extends('layouts.app')

@section('meta_title', pageContent('contact', 'hero', 'metadata.meta_title', 'Get a Free Practice Audit | DBillers Medical Billing Experts'))
@section('meta_description', pageContent('contact', 'hero', 'metadata.meta_description', 'Schedule your free medical billing audit with DBillers. Find out exactly how much revenue your practice is losing and how to get it back.'))
@section('meta_keywords', pageContent('contact', 'hero', 'metadata.meta_keywords', 'free medical billing consultation, practice audit, RCM consultation, medical billing help'))
@section('og_title', pageContent('contact', 'hero', 'metadata.og_title', 'Get a Free Practice Audit | DBillers'))
@section('og_description', pageContent('contact', 'hero', 'metadata.og_description', 'Schedule your free medical billing audit with DBillers.'))
@section('og_url', url()->current())
@section('canonical', url()->current())

@section('content')

<style>
/* ── Contact page scoped styles ── */

/* Hero */
.ct-hero {
    background: linear-gradient(135deg, #1A4F8B 0%, #0E3A6B 100%);
    padding: 4rem 0 5rem;
    position: relative;
    overflow: hidden;
}
.ct-hero::after {
    content: '';
    position: absolute;
    bottom: -2px; left: 0; right: 0;
    height: 60px;
    background: #f8f9fa;
    clip-path: ellipse(55% 100% at 50% 100%);
}
.ct-hero h1 {
    font-size: clamp(1.875rem, 4vw, 2.75rem);
    font-weight: 800;
    color: #fff;
    line-height: 1.2;
    margin-bottom: 1rem;
}
.ct-hero p { color: rgba(255,255,255,.85); font-size: 1.0625rem; line-height: 1.7; }
.ct-hero-badge {
    display: inline-flex;
    align-items: center;
    gap: .5rem;
    background: rgba(255,255,255,.15);
    color: #fff;
    font-size: .8125rem;
    font-weight: 600;
    padding: .375rem .875rem;
    border-radius: 2rem;
    margin-bottom: 1.25rem;
}

/* Trust row */
.ct-trust-row {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-top: 1.75rem;
}
.ct-trust-item {
    display: flex;
    align-items: center;
    gap: .5rem;
    color: rgba(255,255,255,.9);
    font-size: .875rem;
    font-weight: 500;
}
.ct-trust-item i { color: #fbbf24; font-size: .875rem; }

/* Form card */
.ct-form-card {
    background: #fff;
    border-radius: 1.25rem;
    box-shadow: 0 20px 60px rgba(0,0,0,.12);
    padding: 2rem;
    margin-top: -2.5rem;
    position: relative;
    z-index: 10;
}

/* Step indicator */
.ct-steps {
    display: flex;
    align-items: center;
    gap: 0;
    margin-bottom: 1.75rem;
}
.ct-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    flex: 1;
    position: relative;
}
.ct-step:not(:last-child)::after {
    content: '';
    position: absolute;
    top: 16px;
    left: 50%;
    width: 100%;
    height: 2px;
    background: #e2e8f0;
    z-index: 0;
}
.ct-step.is-done:not(:last-child)::after { background: #1A4F8B; }
.ct-step-num {
    width: 32px; height: 32px;
    border-radius: 50%;
    background: #e2e8f0;
    color: #94a3b8;
    font-size: .8125rem;
    font-weight: 700;
    display: flex; align-items: center; justify-content: center;
    position: relative; z-index: 1;
    transition: all .3s;
}
.ct-step.is-active .ct-step-num  { background: #1A4F8B; color: #fff; }
.ct-step.is-done   .ct-step-num  { background: #1A4F8B; color: #fff; }
.ct-step-label {
    font-size: .6875rem;
    font-weight: 600;
    color: #94a3b8;
    margin-top: .375rem;
    text-align: center;
    white-space: nowrap;
}
.ct-step.is-active .ct-step-label { color: #1A4F8B; }
.ct-step.is-done   .ct-step-label { color: #1A4F8B; }

/* Form sections */
.ct-step-section { display: none; }
.ct-step-section.is-active { display: block; }

/* Form labels */
.ct-label {
    display: block;
    font-size: .875rem;
    font-weight: 600;
    color: #374151;
    margin-bottom: .5rem;
}
.ct-label span { color: #1A4F8B; }

/* Inputs */
.ct-input {
    width: 100%;
    border: 1.5px solid #e2e8f0;
    border-radius: .625rem;
    padding: .75rem 1rem;
    font-size: .9375rem;
    color: #1E2A3A;
    transition: border-color .2s, box-shadow .2s;
    background: #fff;
}
.ct-input:focus {
    outline: none;
    border-color: #1A4F8B;
    box-shadow: 0 0 0 3px rgba(26,79,139,.1);
}

/* Select */
.ct-select {
    width: 100%;
    border: 1.5px solid #e2e8f0;
    border-radius: .625rem;
    padding: .75rem 2.5rem .75rem 1rem;
    font-size: .9375rem;
    color: #1E2A3A;
    background: #fff url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e") no-repeat right .75rem center / 1.25rem;
    -webkit-appearance: none;
    transition: border-color .2s, box-shadow .2s;
}
.ct-select:focus {
    outline: none;
    border-color: #1A4F8B;
    box-shadow: 0 0 0 3px rgba(26,79,139,.1);
}

/* Checkbox grid */
.ct-checkbox-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: .5rem;
}
.ct-checkbox-item {
    display: flex;
    align-items: center;
    gap: .625rem;
    padding: .625rem .75rem;
    border: 1.5px solid #e2e8f0;
    border-radius: .5rem;
    cursor: pointer;
    transition: border-color .2s, background .2s;
    font-size: .8125rem;
    font-weight: 500;
    color: #374151;
}
.ct-checkbox-item:hover { border-color: #1A4F8B; background: #f0f4f8; }
.ct-checkbox-item input { display: none; }
.ct-checkbox-item.is-checked { border-color: #1A4F8B; background: #f0f4f8; color: #1A4F8B; }
.ct-checkbox-item .ct-check-icon {
    width: 16px; height: 16px;
    border: 2px solid #d1d5db;
    border-radius: 4px;
    flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
    transition: all .2s;
}
.ct-checkbox-item.is-checked .ct-check-icon {
    background: #1A4F8B;
    border-color: #1A4F8B;
    color: #fff;
    font-size: .625rem;
}

/* Nav buttons */
.ct-btn-next {
    width: 100%;
    background: #1A4F8B;
    color: #fff;
    padding: .875rem;
    border-radius: .625rem;
    font-weight: 600;
    font-size: .9375rem;
    border: none;
    cursor: pointer;
    transition: background .2s, transform .2s;
    display: flex; align-items: center; justify-content: center; gap: .5rem;
}
.ct-btn-next:hover { background: #0E3A6B; transform: translateY(-1px); }
.ct-btn-back {
    background: transparent;
    color: #64748b;
    font-size: .875rem;
    font-weight: 500;
    border: none;
    cursor: pointer;
    display: flex; align-items: center; gap: .375rem;
    padding: 0;
    margin-bottom: 1rem;
    transition: color .2s;
}
.ct-btn-back:hover { color: #1A4F8B; }

/* Privacy note */
.ct-privacy {
    display: flex;
    align-items: flex-start;
    gap: .5rem;
    font-size: .75rem;
    color: #94a3b8;
    margin-top: 1rem;
    line-height: 1.5;
}
.ct-privacy i { margin-top: .125rem; flex-shrink: 0; }

/* Right panel */
.ct-right { display: flex; flex-direction: column; gap: 1.5rem; padding-top: .5rem; }

/* What happens next */
.ct-next-steps { }
.ct-next-step {
    display: flex;
    gap: 1rem;
    padding: 1rem 0;
    border-bottom: 1px solid #f1f5f9;
}
.ct-next-step:last-child { border-bottom: none; }
.ct-next-step-num {
    width: 2rem; height: 2rem;
    background: #1A4F8B;
    color: #fff;
    border-radius: 50%;
    font-size: .8125rem;
    font-weight: 700;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    margin-top: .125rem;
}
.ct-next-step-body h4 { font-size: .9375rem; font-weight: 700; color: #1E2A3A; margin-bottom: .25rem; }
.ct-next-step-body p  { font-size: .8125rem; color: #64748b; line-height: 1.5; }

/* Testimonial */
.ct-testimonial {
    background: #f8fafc;
    border-radius: 1rem;
    padding: 1.25rem;
    border-left: 3px solid #1A4F8B;
}
.ct-testimonial-stars { color: #fbbf24; font-size: .75rem; margin-bottom: .625rem; }
.ct-testimonial-text  { font-style: italic; font-size: .875rem; color: #374151; margin-bottom: .75rem; line-height: 1.6; }
.ct-testimonial-author { font-size: .8125rem; font-weight: 700; color: #1E2A3A; }
.ct-testimonial-role   { font-size: .75rem; color: #64748b; }

/* Contact details */
.ct-detail {
    display: flex;
    align-items: center;
    gap: .875rem;
}
.ct-detail-icon {
    width: 2.5rem; height: 2.5rem;
    background: #f0f4f8;
    border-radius: .625rem;
    display: flex; align-items: center; justify-content: center;
    color: #1A4F8B;
    font-size: .9375rem;
    flex-shrink: 0;
}
.ct-detail-body h4 { font-size: .8125rem; font-weight: 700; color: #1E2A3A; }
.ct-detail-body a, .ct-detail-body p { font-size: .8125rem; color: #64748b; text-decoration: none; transition: color .2s; }
.ct-detail-body a:hover { color: #1A4F8B; }

/* Success state */
.ct-success { display: none; text-align: center; padding: 2rem 1rem; }
.ct-success-icon {
    width: 4rem; height: 4rem;
    background: #dcfce7;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    color: #16a34a;
    font-size: 1.5rem;
    margin: 0 auto 1.25rem;
}

/* ── Responsive ── */
@media (max-width: 767px) {
    .ct-hero { padding: 2.5rem 0 4rem; }
    .ct-form-card { padding: 1.25rem; margin-top: -1.5rem; }
    .ct-checkbox-grid { grid-template-columns: 1fr; }
    .ct-trust-row { gap: .625rem; }
}
</style>

{{-- ── HERO ── --}}
<section class="ct-hero" data-aos="fade-up">
    <div class="container-custom mx-auto">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <div class="ct-hero-badge">
                    <i class="fas fa-star text-yellow-300"></i>
                    Free Practice Audit — No Obligation
                </div>
                <h1>Find Out How Much Revenue Your Practice Is Leaving Behind</h1>
                <p>Our billing experts analyse your current revenue cycle in a free 30-minute call and show you exactly where money is being lost — and how to get it back.</p>

                <div class="ct-trust-row">
                    <span class="ct-trust-item"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i> 4.8/5 from 350+ providers</span>
                    <span class="ct-trust-item"><i class="fas fa-shield-halved"></i> HIPAA Compliant</span>
                    <span class="ct-trust-item"><i class="fas fa-check-circle"></i> Response within 24h</span>
                </div>
            </div>
            <div class="hidden md:block">
                {{-- decorative stats --}}
                <div class="grid grid-cols-2 gap-4">
                    @foreach([['97.35%','Claim Approval Rate'],['Up to 30%','Revenue Increase'],['99%','Clean Claim Ratio'],['24/7','Expert Support']] as $stat)
                    <div style="background:rgba(255,255,255,.12);border-radius:.875rem;padding:1.25rem;text-align:center;">
                        <div style="font-size:1.625rem;font-weight:800;color:#fff;line-height:1.2;">{{ $stat[0] }}</div>
                        <div style="font-size:.75rem;color:rgba(255,255,255,.75);margin-top:.25rem;">{{ $stat[1] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── MAIN CONTENT ── --}}
<section class="bg-gray-50" style="padding-bottom:5rem;">
    <div class="container-custom mx-auto">

        <div class="grid md:grid-cols-5 gap-8 items-start">

            {{-- ── FORM (3/5) ── --}}
            <div class="md:col-span-3">
                <div class="ct-form-card">

                    {{-- Step indicator --}}
                    <div class="ct-steps" id="ctSteps">
                        <div class="ct-step is-active" data-step="1">
                            <div class="ct-step-num">1</div>
                            <div class="ct-step-label">Your Practice</div>
                        </div>
                        <div class="ct-step" data-step="2">
                            <div class="ct-step-num">2</div>
                            <div class="ct-step-label">Your Challenges</div>
                        </div>
                        <div class="ct-step" data-step="3">
                            <div class="ct-step-num">3</div>
                            <div class="ct-step-label">Contact Info</div>
                        </div>
                    </div>

                    <form id="contact-form" method="POST" action="{{ route('contact.submit') }}">
                        @csrf
                        {{-- Hidden fields that aggregate all steps --}}
                        <input type="hidden" name="name"    id="hidName">
                        <input type="hidden" name="email"   id="hidEmail">
                        <input type="hidden" name="phone"   id="hidPhone">
                        <input type="hidden" name="message" id="hidMessage">

                        {{-- ── STEP 1: Practice Info ── --}}
                        <div class="ct-step-section is-active" id="step1">
                            <h3 style="font-size:1.125rem;font-weight:700;color:#1E2A3A;margin-bottom:1.25rem;">Tell us about your practice</h3>

                            <div class="mb-4">
                                <label class="ct-label">Practice / Clinic Name <span>*</span></label>
                                <input type="text" id="s1PracticeName" class="ct-input" placeholder="e.g. Sunrise Family Medicine" required>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="ct-label">Specialty <span>*</span></label>
                                    <select id="s1Specialty" class="ct-select" required>
                                        <option value="">Select specialty</option>
                                        <option>Cardiology</option>
                                        <option>Dermatology</option>
                                        <option>Family Medicine</option>
                                        <option>Gastroenterology</option>
                                        <option>Internal Medicine</option>
                                        <option>Neurology</option>
                                        <option>OB/GYN</option>
                                        <option>Oncology</option>
                                        <option>Orthopedics</option>
                                        <option>Pediatrics</option>
                                        <option>Psychiatry / Behavioral Health</option>
                                        <option>Pulmonology</option>
                                        <option>Radiology</option>
                                        <option>Surgery</option>
                                        <option>Urgent Care</option>
                                        <option>Urology</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="ct-label">Monthly Collections</label>
                                    <select id="s1Collections" class="ct-select">
                                        <option value="">Select range</option>
                                        <option>Under $10,000</option>
                                        <option>$10,000 – $50,000</option>
                                        <option>$50,000 – $100,000</option>
                                        <option>$100,000 – $300,000</option>
                                        <option>$300,000 – $500,000</option>
                                        <option>$500,000 – $1,000,000</option>
                                        <option>Over $1,000,000</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label class="ct-label">Current billing setup</label>
                                <select id="s1BillingSetup" class="ct-select">
                                    <option value="">Select one</option>
                                    <option>In-house billing team</option>
                                    <option>Using a billing software only</option>
                                    <option>Currently with another billing company</option>
                                    <option>New practice — not yet set up</option>
                                    <option>Physician billing themselves</option>
                                </select>
                            </div>

                            <button type="button" class="ct-btn-next" onclick="ctNextStep(2)">
                                Continue <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>

                        {{-- ── STEP 2: Pain Points ── --}}
                        <div class="ct-step-section" id="step2">
                            <button type="button" class="ct-btn-back" onclick="ctNextStep(1)">
                                <i class="fas fa-arrow-left"></i> Back
                            </button>
                            <h3 style="font-size:1.125rem;font-weight:700;color:#1E2A3A;margin-bottom:.375rem;">What challenges are you facing?</h3>
                            <p style="font-size:.875rem;color:#64748b;margin-bottom:1.25rem;">Select all that apply — this helps us prepare a relevant audit for you.</p>

                            <div class="ct-checkbox-grid mb-5" id="ctChallenges">
                                @foreach([
                                    ['fa-times-circle','High claim denial rate'],
                                    ['fa-clock','Slow / delayed payments'],
                                    ['fa-dollar-sign','High in-house billing costs'],
                                    ['fa-chart-line','Revenue declining over time'],
                                    ['fa-file-alt','Coding errors & compliance risk'],
                                    ['fa-users','Losing patients due to billing issues'],
                                    ['fa-eye-slash','No visibility into billing performance'],
                                    ['fa-question-circle','Just exploring options'],
                                ] as $challenge)
                                <label class="ct-checkbox-item">
                                    <input type="checkbox" value="{{ $challenge[1] }}">
                                    <span class="ct-check-icon"><i class="fas fa-check" style="display:none;"></i></span>
                                    <i class="fas {{ $challenge[0] }}" style="color:#1A4F8B;font-size:.875rem;flex-shrink:0;"></i>
                                    <span>{{ $challenge[1] }}</span>
                                </label>
                                @endforeach
                            </div>

                            <div class="mb-5">
                                <label class="ct-label">Anything else you'd like us to know? <span style="font-weight:400;color:#94a3b8;">(optional)</span></label>
                                <textarea id="s2Notes" class="ct-input" rows="3" placeholder="Describe your situation in a few words..."></textarea>
                            </div>

                            <button type="button" class="ct-btn-next" onclick="ctNextStep(3)">
                                Continue <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>

                        {{-- ── STEP 3: Contact Info ── --}}
                        <div class="ct-step-section" id="step3">
                            <button type="button" class="ct-btn-back" onclick="ctNextStep(2)">
                                <i class="fas fa-arrow-left"></i> Back
                            </button>
                            <h3 style="font-size:1.125rem;font-weight:700;color:#1E2A3A;margin-bottom:.375rem;">How should we reach you?</h3>
                            <p style="font-size:.875rem;color:#64748b;margin-bottom:1.25rem;">We'll send a confirmation immediately and contact you within 24 hours.</p>

                            <div class="mb-4">
                                <label class="ct-label">Your Full Name <span>*</span></label>
                                <input type="text" id="s3Name" class="ct-input" placeholder="Dr. Jane Smith" required>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="ct-label">Email Address <span>*</span></label>
                                    <input type="email" id="s3Email" class="ct-input" placeholder="jane@clinic.com" required>
                                </div>
                                <div>
                                    <label class="ct-label">Phone Number</label>
                                    <input type="tel" id="s3Phone" class="ct-input" placeholder="+1 (555) 000-0000">
                                </div>
                            </div>
                            <div class="mb-5">
                                <label class="ct-label">Best time to call</label>
                                <select id="s3CallTime" class="ct-select">
                                    <option value="">No preference</option>
                                    <option>Morning (9 AM – 12 PM EST)</option>
                                    <option>Afternoon (12 PM – 3 PM EST)</option>
                                    <option>Late Afternoon (3 PM – 6 PM EST)</option>
                                </select>
                            </div>

                            <button type="submit" class="ct-btn-next" id="ctSubmitBtn" onclick="ctBuildMessage()">
                                <i class="fas fa-paper-plane"></i> Get My Free Audit
                            </button>

                            <div class="ct-privacy">
                                <i class="fas fa-lock"></i>
                                Your information is 100% confidential. We are HIPAA compliant and will never share your data with third parties.
                            </div>
                        </div>

                    </form>

                </div>
            </div>

            {{-- ── RIGHT PANEL (2/5) ── --}}
            <div class="md:col-span-2 ct-right" style="padding-top: 1rem;">

                {{-- What happens next --}}
                <div class="bg-white rounded-2xl shadow-sm p-6">
                    <h3 style="font-size:1rem;font-weight:700;color:#1E2A3A;margin-bottom:.25rem;">What happens next?</h3>
                    <p style="font-size:.8125rem;color:#64748b;margin-bottom:1rem;">Here's exactly what to expect after you submit.</p>
                    <div class="ct-next-steps">
                        <div class="ct-next-step">
                            <div class="ct-next-step-num">1</div>
                            <div class="ct-next-step-body">
                                <h4>Instant Confirmation</h4>
                                <p>You'll receive a confirmation email immediately after submitting.</p>
                            </div>
                        </div>
                        <div class="ct-next-step">
                            <div class="ct-next-step-num">2</div>
                            <div class="ct-next-step-body">
                                <h4>Expert Review</h4>
                                <p>A billing specialist reviews your information and prepares practice-specific insights.</p>
                            </div>
                        </div>
                        <div class="ct-next-step">
                            <div class="ct-next-step-num">3</div>
                            <div class="ct-next-step-body">
                                <h4>Free 30-Min Audit Call</h4>
                                <p>We walk you through exactly where revenue is being lost and what to do about it. No pitch, just value.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Testimonial --}}
                <div class="ct-testimonial">
                    <div class="ct-testimonial-stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="ct-testimonial-text">"DBillers found $18,000 in uncollected revenue in our first audit call. We had no idea how much we were leaving on the table."</p>
                    <div class="ct-testimonial-author">Dr. Mike Lan***</div>
                    <div class="ct-testimonial-role">Internal Medicine Specialist</div>
                </div>

                {{-- Contact details --}}
                <div class="bg-white rounded-2xl shadow-sm p-5 space-y-4">
                    @php
                        $phone   = setting('company_phone');
                        $email   = setting('company_email');
                        $address = setting('company_address');
                    @endphp
                    @if($phone)
                    <div class="ct-detail">
                        <div class="ct-detail-icon"><i class="fas fa-phone-alt"></i></div>
                        <div class="ct-detail-body">
                            <h4>Call Us</h4>
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}">{{ $phone }}</a>
                        </div>
                    </div>
                    @endif
                    @if($email)
                    <div class="ct-detail">
                        <div class="ct-detail-icon"><i class="fas fa-envelope"></i></div>
                        <div class="ct-detail-body">
                            <h4>Email Us</h4>
                            <a href="mailto:{{ $email }}">{{ $email }}</a>
                        </div>
                    </div>
                    @endif
                    <div class="ct-detail">
                        <div class="ct-detail-icon"><i class="fas fa-clock"></i></div>
                        <div class="ct-detail-body">
                            <h4>Business Hours</h4>
                            <p>Mon – Fri, 9AM – 6PM EST</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- ── FINAL CTA ── --}}
<section style="background-color:#1A4F8B;" class="text-white text-center" data-aos="zoom-in-up">
    <div class="container-custom mx-auto py-14">
        <h2 class="text-3xl font-bold text-white mb-3">Still have questions?</h2>
        <p class="text-white/85 text-lg mb-2">Browse our frequently asked questions or read how we've helped practices like yours.</p>
        <div class="flex flex-wrap gap-4 justify-center mt-6">
            <a href="/#faqContainer" class="bg-white text-primary px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition inline-flex items-center gap-2">
                View FAQs <i class="fas fa-question-circle"></i>
            </a>
            <a href="/revenue-cycle-management" class="border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary transition inline-flex items-center gap-2">
                Learn About RCM <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<script>
(function () {
    var currentStep = 1;

    // Checkbox toggle
    document.querySelectorAll('.ct-checkbox-item').forEach(function (item) {
        item.addEventListener('click', function () {
            var cb   = item.querySelector('input[type="checkbox"]');
            var icon = item.querySelector('.ct-check-icon i');
            cb.checked = !cb.checked;
            item.classList.toggle('is-checked', cb.checked);
            icon.style.display = cb.checked ? 'block' : 'none';
        });
    });

    window.ctNextStep = function (step) {
        // Basic validation on step 1
        if (step === 2) {
            var pname = document.getElementById('s1PracticeName').value.trim();
            var spec  = document.getElementById('s1Specialty').value;
            if (!pname || !spec) {
                document.getElementById('s1PracticeName').focus();
                return;
            }
        }

        // Update UI
        document.getElementById('step' + currentStep).classList.remove('is-active');
        document.getElementById('step' + step).classList.add('is-active');

        // Update step indicators
        document.querySelectorAll('.ct-step').forEach(function (el) {
            var s = parseInt(el.dataset.step);
            el.classList.remove('is-active', 'is-done');
            if (s === step)  el.classList.add('is-active');
            if (s < step)    el.classList.add('is-done');
        });

        currentStep = step;
        // Scroll form into view on mobile
        document.querySelector('.ct-form-card').scrollIntoView({ behavior: 'smooth', block: 'start' });
    };

    window.ctBuildMessage = function () {
        // Collect practice info
        var practice    = document.getElementById('s1PracticeName').value;
        var specialty   = document.getElementById('s1Specialty').value;
        var collections = document.getElementById('s1Collections').value;
        var setup       = document.getElementById('s1BillingSetup').value;

        // Collect challenges
        var challenges = [];
        document.querySelectorAll('#ctChallenges input[type="checkbox"]:checked').forEach(function (cb) {
            challenges.push(cb.value);
        });

        var notes    = document.getElementById('s2Notes').value;
        var callTime = document.getElementById('s3CallTime').value;

        // Build message
        var msg = '';
        msg += 'Practice: ' + practice + '\n';
        msg += 'Specialty: ' + specialty + '\n';
        if (collections) msg += 'Monthly Collections: ' + collections + '\n';
        if (setup)        msg += 'Current Billing Setup: ' + setup + '\n';
        if (challenges.length) msg += 'Challenges: ' + challenges.join(', ') + '\n';
        if (callTime)    msg += 'Best Time to Call: ' + callTime + '\n';
        if (notes)       msg += 'Additional Notes: ' + notes;

        // Push to hidden fields
        document.getElementById('hidName').value    = document.getElementById('s3Name').value;
        document.getElementById('hidEmail').value   = document.getElementById('s3Email').value;
        document.getElementById('hidPhone').value   = document.getElementById('s3Phone').value;
        document.getElementById('hidMessage').value = msg.trim();
    };
})();
</script>

@endsection
