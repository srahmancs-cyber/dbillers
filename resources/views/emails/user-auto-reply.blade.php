<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<title>We received your request — DBillers</title>
<!--[if mso]>
<style type="text/css">
  body, table, td, p { font-family: Segoe UI, Arial, sans-serif !important; }
</style>
<![endif]-->
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

  * { margin:0; padding:0; box-sizing:border-box; }

  body {
    font-family: Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif;
    background-color: #f0f4f8;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
  }

  /* Responsive */
  @media only screen and (max-width: 620px) {
    .email-wrapper  { width: 100% !important; }
    .email-body     { padding: 1.5rem 1.25rem !important; }
    .header-cell    { padding: 1.75rem 1.25rem 1.5rem !important; }
    .steps-table    { display: block !important; }
    .step-col       { display: block !important; width: 100% !important; padding-bottom: 1rem !important; }
    .trust-table td { display: block !important; text-align: center !important; padding: .375rem 0 !important; }
    .cta-btn        { display: block !important; text-align: center !important; }
    h1              { font-size: 1.375rem !important; }
  }
</style>
</head>
<body style="margin:0;padding:0;background-color:#f0f4f8;">

<!-- Outer wrapper -->
<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%"
       style="background-color:#f0f4f8;padding:2rem 1rem;">
  <tr>
    <td align="center">

      <!-- Email card -->
      <table class="email-wrapper" role="presentation" cellpadding="0" cellspacing="0" border="0"
             width="600" style="max-width:600px;width:100%;border-radius:14px;overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,.10);">

        <!-- ── HEADER ── -->
        <tr>
          <td class="header-cell" align="center"
              style="background:linear-gradient(135deg,#1A4F8B 0%,#0E3A6B 100%);padding:2.25rem 2rem 2rem;">
            <!-- Logo -->
            <div style="font-size:1.625rem;font-weight:800;color:#ffffff;letter-spacing:-.025em;margin-bottom:.375rem;">
              DBillers
            </div>
            <div style="font-size:.75rem;color:rgba(255,255,255,.65);letter-spacing:.08em;text-transform:uppercase;">
              Smart Medical Billing for US Healthcare
            </div>
            <!-- Divider -->
            <div style="width:40px;height:3px;background:rgba(255,255,255,.3);border-radius:2px;margin:1.25rem auto 0;"></div>
          </td>
        </tr>

        <!-- ── MAIN BODY ── -->
        <tr>
          <td class="email-body" style="background:#ffffff;padding:2.25rem 2.5rem;">

            <!-- Greeting -->
            <p style="font-size:1rem;font-weight:700;color:#1E2A3A;margin-bottom:.75rem;">
              Hi {{ $lead->name }},
            </p>

            <p style="font-size:.9375rem;color:#4A5568;line-height:1.7;margin-bottom:1rem;">
              Thank you for reaching out to <strong style="color:#1E2A3A;">DBillers</strong>. We've received your free practice audit request and a billing specialist is already reviewing your information.
            </p>

            <p style="font-size:.9375rem;color:#4A5568;line-height:1.7;margin-bottom:1.75rem;">
              You'll hear from us <strong style="color:#1A4F8B;">within 24 hours</strong> — typically sooner. We'll reach out to the contact details you provided to schedule your free 30-minute audit call.
            </p>

            <!-- ── WHAT HAPPENS NEXT BOX ── -->
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%"
                   style="background:#f8fafc;border-radius:10px;overflow:hidden;margin-bottom:1.75rem;">
              <tr>
                <td style="padding:1.25rem 1.5rem 0;">
                  <p style="font-size:.6875rem;font-weight:700;color:#1A4F8B;text-transform:uppercase;letter-spacing:.07em;margin-bottom:1rem;">
                    What happens next
                  </p>
                </td>
              </tr>

              @foreach([
                ['1', 'Expert Review',       'A billing specialist reviews your practice details and prepares specific insights for your specialty and challenges.'],
                ['2', 'Free 30-Min Audit',   'We walk you through exactly where revenue is being lost — no sales pitch, just clear, actionable value.'],
                ['3', 'Custom Action Plan',  'You receive a tailored billing improvement plan with clear next steps at no cost whatsoever.'],
              ] as $step)
              <tr>
                <td style="padding:.625rem 1.5rem;">
                  <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tr>
                      <td width="36" valign="top" style="padding-top:.125rem;">
                        <div style="width:28px;height:28px;background:#1A4F8B;border-radius:50%;color:#fff;font-size:.75rem;font-weight:700;text-align:center;line-height:28px;">
                          {{ $step[0] }}
                        </div>
                      </td>
                      <td style="padding-left:.625rem;">
                        <p style="font-size:.875rem;font-weight:700;color:#1E2A3A;margin-bottom:.2rem;">{{ $step[1] }}</p>
                        <p style="font-size:.8125rem;color:#64748b;line-height:1.55;margin:0;">{{ $step[2] }}</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              @endforeach

              <tr><td style="padding:.875rem 1.5rem 1.25rem;"></td></tr>
            </table>

            <!-- ── STATS ROW ── -->
            <table class="steps-table" role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%"
                   style="margin-bottom:1.75rem;border:1px solid #e2e8f0;border-radius:10px;overflow:hidden;">
              <tr>
                @foreach([['97.35%','Claim Approval'],['Up to 30%','Revenue Increase'],['1,500+','Providers Served']] as $i => $stat)
                <td class="step-col" align="center" valign="middle"
                    style="padding:1rem;{{ $i < 2 ? 'border-right:1px solid #e2e8f0;' : '' }}">
                  <div style="font-size:1.25rem;font-weight:800;color:#1A4F8B;line-height:1.2;">{{ $stat[0] }}</div>
                  <div style="font-size:.75rem;color:#64748b;margin-top:.25rem;">{{ $stat[1] }}</div>
                </td>
                @endforeach
              </tr>
            </table>

            <!-- CTA -->
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%"
                   style="margin-bottom:1.75rem;">
              <tr>
                <td align="center">
                  <a class="cta-btn" href="{{ url('/revenue-cycle-management') }}"
                     style="display:inline-block;background:#1A4F8B;color:#ffffff;text-decoration:none;font-size:.9375rem;font-weight:700;padding:.875rem 2rem;border-radius:8px;letter-spacing:-.01em;">
                    Explore Our RCM Services &rarr;
                  </a>
                </td>
              </tr>
            </table>

            <!-- Divider -->
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%"
                   style="margin-bottom:1.5rem;">
              <tr><td style="border-top:1px solid #e2e8f0;"></td></tr>
            </table>

            <!-- Submission summary -->
            <p style="font-size:.6875rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.06em;margin-bottom:.625rem;">
              Your submission
            </p>
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
              <tr>
                <td style="background:#f8fafc;border-left:3px solid #1A4F8B;border-radius:0 8px 8px 0;padding:1rem 1.25rem;font-size:.875rem;color:#374151;line-height:1.7;white-space:pre-wrap;">{{ $lead->message }}</td>
              </tr>
            </table>

            <!-- Signature -->
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%"
                   style="margin-top:1.5rem;padding-top:1.25rem;border-top:1px solid #e2e8f0;">
              <tr>
                <td>
                  <!-- Name + title -->
                  <p style="font-size:.9375rem;font-weight:700;color:#1E2A3A;line-height:1.3;margin-bottom:.2rem;">
                    DBillers Support Team
                  </p>
                  <p style="font-size:.8125rem;color:#64748b;margin-bottom:.875rem;">
                    Medical Billing &amp; Revenue Cycle Management
                  </p>

                  <!-- Contact row -->
                  <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                      <td style="padding-right:1.5rem;padding-bottom:.375rem;">
                        <span style="font-size:.6875rem;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;display:block;margin-bottom:.2rem;">Phone</span>
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('company_phone', '+17273502535')) }}"
                           style="font-size:.8125rem;color:#1A4F8B;text-decoration:none;font-weight:500;">
                          {{ setting('company_phone', '+1 (727) 350-2535') }}
                        </a>
                      </td>
                      <td style="padding-right:1.5rem;padding-bottom:.375rem;">
                        <span style="font-size:.6875rem;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;display:block;margin-bottom:.2rem;">Email</span>
                        <a href="mailto:{{ setting('company_email', 'billing@dbillers.com') }}"
                           style="font-size:.8125rem;color:#1A4F8B;text-decoration:none;font-weight:500;">
                          {{ setting('company_email', 'billing@dbillers.com') }}
                        </a>
                      </td>
                      <td style="padding-bottom:.375rem;">
                        <span style="font-size:.6875rem;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;display:block;margin-bottom:.2rem;">Website</span>
                        <a href="{{ url('/') }}"
                           style="font-size:.8125rem;color:#1A4F8B;text-decoration:none;font-weight:500;">
                          dbillers.com
                        </a>
                      </td>
                    </tr>
                  </table>

                  <!-- Thin accent bar -->
                  <div style="width:32px;height:2px;background:#1A4F8B;border-radius:2px;margin-top:1rem;"></div>
                </td>
              </tr>
            </table>

          </td>
        </tr>

        <!-- ── TRUST STRIP ── -->
        <tr>
          <td style="background:#f8fafc;border-top:1px solid #e2e8f0;padding:.875rem 2rem;">
            <table class="trust-table" role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
              <tr>
                <td align="center" style="font-size:.75rem;color:#64748b;padding:.25rem .5rem;">4.8 / 5 &nbsp;&nbsp; 350+ Verified Providers</td>
                <td align="center" style="font-size:.75rem;color:#64748b;padding:.25rem .5rem;">HIPAA Compliant</td>
                <td align="center" style="font-size:.75rem;color:#64748b;padding:.25rem .5rem;">A+ BBB Rated</td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- ── FOOTER ── -->
        <tr>
          <td align="center"
              style="background:#1E2A3A;padding:1.125rem 2rem;border-radius:0 0 14px 14px;">
            <p style="font-size:.75rem;color:rgba(255,255,255,.45);line-height:1.6;margin:0;">
              You received this email because you submitted a contact form on
              <a href="{{ url('/') }}" style="color:rgba(255,255,255,.6);text-decoration:none;">dbillers.com</a>.
              &nbsp;·&nbsp;
              <a href="{{ url('/privacy-policy') }}" style="color:rgba(255,255,255,.6);text-decoration:none;">Privacy Policy</a>
              &nbsp;·&nbsp;
              &copy; {{ date('Y') }} DBillers
            </p>
          </td>
        </tr>

      </table>
      <!-- /Email card -->

    </td>
  </tr>
</table>

</body>
</html>
