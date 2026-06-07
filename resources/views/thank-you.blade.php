@extends('layouts.app')

@section('meta_title', "Thank You — We'll Be In Touch | DBillers")
@section('meta_description', 'Your free practice audit request has been received. A DBillers billing expert will contact you within 24 hours.')
@section('canonical', url()->current())

{{-- Prevent indexing of thank-you page --}}
@section('schema')
<meta name="robots" content="noindex, nofollow">
@endsection

@section('content')

<style>
    .ty-page {
        min-height: 80vh;
        background: linear-gradient(160deg, #f0f4f8 0%, #fff 60%);
        display: flex;
        align-items: center;
        padding: 5rem 0;
    }

    .ty-card {
        max-width: 680px;
        margin: 0 auto;
        background: #fff;
        border-radius: 1.5rem;
        box-shadow: 0 20px 60px rgba(0,0,0,.1);
        padding: 3rem 2.5rem;
        text-align: center;
    }

    /* Animated checkmark */
    .ty-icon-wrap {
        position: relative;
        width: 5rem;
        height: 5rem;
        margin: 0 auto 1.75rem;
    }
    .ty-icon-ring {
        width: 5rem; height: 5rem;
        border-radius: 50%;
        background: #dcfce7;
        display: flex; align-items: center; justify-content: center;
        animation: ty-pop .4s cubic-bezier(0.34, 1.56, 0.64, 1) both;
    }
    .ty-icon-ring i { font-size: 1.875rem; color: #16a34a; }
    @keyframes ty-pop {
        from { transform: scale(0); opacity: 0; }
        to   { transform: scale(1); opacity: 1; }
    }

    .ty-eyebrow {
        font-size: .8125rem;
        font-weight: 700;
        color: #1A4F8B;
        text-transform: uppercase;
        letter-spacing: .07em;
        margin-bottom: .75rem;
    }

    .ty-heading {
        font-size: clamp(1.625rem, 4vw, 2.125rem);
        font-weight: 800;
        color: #1E2A3A;
        line-height: 1.25;
        margin-bottom: 1rem;
    }

    .ty-subtext {
        font-size: 1rem;
        color: #4A5568;
        line-height: 1.7;
        max-width: 480px;
        margin: 0 auto 2.5rem;
    }

    /* Timeline */
    .ty-timeline {
        background: #f8fafc;
        border-radius: 1rem;
        padding: 1.5rem 1.75rem;
        text-align: left;
        margin-bottom: 2.5rem;
    }
    .ty-timeline-label {
        font-size: .75rem;
        font-weight: 700;
        color: #1A4F8B;
        text-transform: uppercase;
        letter-spacing: .06em;
        margin-bottom: 1.25rem;
    }
    .ty-step {
        display: flex;
        gap: 1rem;
        align-items: flex-start;
        padding: .75rem 0;
        border-bottom: 1px solid #f1f5f9;
    }
    .ty-step:last-child { border-bottom: none; padding-bottom: 0; }
    .ty-step-num {
        width: 2rem; height: 2rem;
        background: #1A4F8B;
        color: #fff;
        border-radius: 50%;
        font-size: .75rem;
        font-weight: 700;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
        margin-top: .125rem;
    }
    .ty-step h4 { font-size: .9375rem; font-weight: 700; color: #1E2A3A; margin-bottom: .25rem; }
    .ty-step p  { font-size: .8125rem; color: #64748b; line-height: 1.55; margin: 0; }

    /* Actions */
    .ty-actions {
        display: flex;
        flex-wrap: wrap;
        gap: .875rem;
        justify-content: center;
        margin-bottom: 2rem;
    }

    /* Trust strip */
    .ty-trust {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 1.25rem;
        padding-top: 1.5rem;
        border-top: 1px solid #f1f5f9;
    }
    .ty-trust-item {
        display: flex;
        align-items: center;
        gap: .375rem;
        font-size: .75rem;
        color: #94a3b8;
    }
    .ty-trust-item i { font-size: .75rem; }

    @media (max-width: 600px) {
        .ty-card { padding: 2rem 1.25rem; }
        .ty-actions { flex-direction: column; }
        .ty-actions a { width: 100%; justify-content: center; }
    }
</style>

<section class="ty-page" data-aos="fade-up">
    <div class="container-custom mx-auto px-4">
        <div class="ty-card">

            {{-- Animated check --}}
            <div class="ty-icon-wrap">
                <div class="ty-icon-ring">
                    <i class="fas fa-check"></i>
                </div>
            </div>

            <div class="ty-eyebrow">Request Received</div>

            <h1 class="ty-heading">
                You're all set — a billing expert<br>will reach out within 24 hours.
            </h1>

            <p class="ty-subtext">
                Thank you for reaching out to DBillers. We've received your free practice audit request and a specialist is already reviewing your information.
            </p>

            {{-- What happens next --}}
            <div class="ty-timeline">
                <div class="ty-timeline-label">What happens next</div>

                <div class="ty-step">
                    <div class="ty-step-num">1</div>
                    <div>
                        <h4>Confirmation email sent</h4>
                        <p>Check your inbox — a confirmation is on its way to the email you provided.</p>
                    </div>
                </div>

                <div class="ty-step">
                    <div class="ty-step-num">2</div>
                    <div>
                        <h4>Expert review</h4>
                        <p>A billing specialist is preparing practice-specific insights based on your specialty and challenges.</p>
                    </div>
                </div>

                <div class="ty-step">
                    <div class="ty-step-num">3</div>
                    <div>
                        <h4>Free 30-min audit call</h4>
                        <p>We walk you through exactly where revenue is being lost and what to do about it. No sales pitch — just value.</p>
                    </div>
                </div>

            </div>

            {{-- Actions --}}
            <div class="ty-actions">
                <a href="/" class="btn-primary">Back to Home <i class="fas fa-house"></i></a>
                <a href="/services" class="btn-secondary">Explore Our Services <i class="fas fa-arrow-right"></i></a>
                <a href="/revenue-cycle-management" class="btn-secondary">Learn About RCM <i class="fas fa-chart-line"></i></a>
            </div>

            {{-- Trust --}}
            <div class="ty-trust">
                <span class="ty-trust-item"><i class="fas fa-shield-halved" style="color:#1A4F8B;"></i> HIPAA Compliant</span>
                <span class="ty-trust-item"><i class="fas fa-star" style="color:#fbbf24;"></i> 4.8/5 from 350+ providers</span>
                <span class="ty-trust-item"><i class="fas fa-lock" style="color:#1A4F8B;"></i> Your data is never shared</span>
            </div>

        </div>
    </div>
</section>

@endsection
