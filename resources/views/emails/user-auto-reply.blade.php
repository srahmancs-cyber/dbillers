<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>We received your request — DBillers</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body { background: #f1f5f9; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif; }
  .wrap { max-width: 600px; margin: 2rem auto; }

  /* Header */
  .header {
    background: linear-gradient(135deg, #1A4F8B 0%, #0E3A6B 100%);
    border-radius: 12px 12px 0 0;
    padding: 2rem 2.5rem 1.75rem;
    text-align: center;
  }
  .header-logo {
    font-size: 1.5rem;
    font-weight: 800;
    color: #fff;
    letter-spacing: -.02em;
    margin-bottom: .375rem;
  }
  .header-tagline {
    font-size: .8125rem;
    color: rgba(255,255,255,.7);
    letter-spacing: .04em;
    text-transform: uppercase;
  }

  /* Body */
  .body {
    background: #fff;
    padding: 2.25rem 2.5rem;
  }
  .greeting {
    font-size: 1.125rem;
    font-weight: 700;
    color: #1E2A3A;
    margin-bottom: .875rem;
  }
  .body p {
    font-size: .9375rem;
    color: #4A5568;
    line-height: 1.7;
    margin-bottom: 1rem;
  }

  /* What happens next */
  .next-box {
    background: #f8fafc;
    border-radius: 10px;
    padding: 1.25rem 1.5rem;
    margin: 1.5rem 0;
  }
  .next-box-title {
    font-size: .75rem;
    font-weight: 700;
    color: #1A4F8B;
    text-transform: uppercase;
    letter-spacing: .06em;
    margin-bottom: 1rem;
  }
  .next-step {
    display: flex;
    gap: .875rem;
    align-items: flex-start;
    margin-bottom: .875rem;
  }
  .next-step:last-child { margin-bottom: 0; }
  .step-num {
    width: 1.75rem;
    height: 1.75rem;
    background: #1A4F8B;
    color: #fff;
    border-radius: 50%;
    font-size: .75rem;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    margin-top: .0625rem;
  }
  .step-body h4 { font-size: .875rem; font-weight: 700; color: #1E2A3A; margin-bottom: .2rem; }
  .step-body p  { font-size: .8125rem; color: #64748b; line-height: 1.5; margin: 0; }

  /* CTA button */
  .cta-wrap { text-align: center; margin: 1.75rem 0 1rem; }
  .cta-btn {
    display: inline-block;
    background: #1A4F8B;
    color: #fff;
    text-decoration: none;
    padding: .875rem 2rem;
    border-radius: 8px;
    font-size: .9375rem;
    font-weight: 700;
    letter-spacing: -.01em;
  }

  /* Divider */
  hr { border: none; border-top: 1px solid #e2e8f0; margin: 1.5rem 0; }

  /* Submission summary */
  .summary-title {
    font-size: .75rem;
    font-weight: 700;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: .05em;
    margin-bottom: .75rem;
  }
  .summary-box {
    background: #f8fafc;
    border-left: 3px solid #e2e8f0;
    border-radius: 0 8px 8px 0;
    padding: 1rem 1.25rem;
    font-size: .875rem;
    color: #374151;
    line-height: 1.7;
    white-space: pre-wrap;
  }

  /* Signature */
  .sig {
    margin-top: 1.5rem;
    padding-top: 1.25rem;
    border-top: 1px solid #f1f5f9;
  }
  .sig-name  { font-size: .9375rem; font-weight: 700; color: #1E2A3A; }
  .sig-title { font-size: .8125rem; color: #64748b; margin-top: .125rem; }
  .sig-contact { margin-top: .625rem; }
  .sig-contact a {
    font-size: .8125rem;
    color: #1A4F8B;
    text-decoration: none;
    display: block;
    margin-bottom: .2rem;
  }

  /* Trust badges */
  .trust {
    background: #f8fafc;
    border-top: 1px solid #e2e8f0;
    padding: 1rem 2.5rem;
    display: flex;
    justify-content: center;
    gap: 1.5rem;
    flex-wrap: wrap;
  }
  .trust-item {
    font-size: .75rem;
    color: #94a3b8;
    display: flex;
    align-items: center;
    gap: .3rem;
  }

  /* Footer */
  .footer {
    background: #1E2A3A;
    border-radius: 0 0 12px 12px;
    padding: 1.25rem 2.5rem;
    text-align: center;
  }
  .footer p { font-size: .75rem; color: rgba(255,255,255,.45); line-height: 1.6; }
  .footer a  { color: rgba(255,255,255,.6); text-decoration: none; }
</style>
</head>
<body>
<div class="wrap">

  {{-- ── HEADER ── --}}
  <div class="header">
    <div class="header-logo">DBillers</div>
    <div class="header-tagline">Smart Medical Billing for US Healthcare</div>
  </div>

  {{-- ── BODY ── --}}
  <div class="body">

    <div class="greeting">Hi {{ $lead->name }},</div>

    <p>
      Thank you for reaching out to <strong>DBillers</strong>. We've received your free practice audit request and a billing specialist is already reviewing your information.
    </p>

    <p>
      You'll hear from us <strong>within 24 hours</strong> — typically sooner. We'll reach out to the email address or phone number you provided to schedule your free 30-minute audit call.
    </p>

    {{-- What happens next --}}
    <div class="next-box">
      <div class="next-box-title">What happens next</div>

      <div class="next-step">
        <div class="step-num">1</div>
        <div class="step-body">
          <h4>Expert review</h4>
          <p>A billing specialist reviews your practice details and prepares specific insights for your specialty.</p>
        </div>
      </div>

      <div class="next-step">
        <div class="step-num">2</div>
        <div class="step-body">
          <h4>Free 30-min audit call</h4>
          <p>We walk you through exactly where revenue is being lost and what to do about it — no pitch, just value.</p>
        </div>
      </div>

      <div class="next-step">
        <div class="step-num">3</div>
        <div class="step-body">
          <h4>Custom action plan</h4>
          <p>You receive a tailored billing improvement plan with clear next steps, at no cost.</p>
        </div>
      </div>
    </div>

    <p style="font-size:.875rem;color:#64748b;">
      In the meantime, feel free to explore how DBillers has helped providers like you:
    </p>

    <div class="cta-wrap">
      <a href="{{ url('/revenue-cycle-management') }}" class="cta-btn">Explore Our RCM Services &rarr;</a>
    </div>

    <hr>

    {{-- Submission summary --}}
    <div class="summary-title">Your submission</div>
    <div class="summary-box">{{ $lead->message }}</div>

    {{-- Signature --}}
    <div class="sig">
      <div class="sig-name">DBillers Support Team</div>
      <div class="sig-title">Medical Billing &amp; Revenue Cycle Experts</div>
      <div class="sig-contact">
        <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('company_phone', '+17273502535')) }}">📞 {{ setting('company_phone', '+1 (727) 350-2535') }}</a>
        <a href="mailto:{{ setting('company_email', 'billing@dbillers.com') }}">✉️ {{ setting('company_email', 'billing@dbillers.com') }}</a>
        <a href="{{ url('/') }}">🌐 dbillers.com</a>
      </div>
    </div>

  </div>

  {{-- ── TRUST STRIP ── --}}
  <div class="trust">
    <span class="trust-item">⭐ 4.8/5 from 350+ providers</span>
    <span class="trust-item">🔒 HIPAA Compliant</span>
    <span class="trust-item">✅ A+ BBB Rated</span>
  </div>

  {{-- ── FOOTER ── --}}
  <div class="footer">
    <p>
      You received this email because you submitted a contact form on
      <a href="{{ url('/') }}">dbillers.com</a>.<br>
      © {{ date('Y') }} DBillers. All rights reserved. &nbsp;·&nbsp;
      <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>
    </p>
  </div>

</div>
</body>
</html>
