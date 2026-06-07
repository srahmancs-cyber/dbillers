<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DBillers — Reply to your enquiry</title>
<style>
  body { margin:0; padding:0; background:#f1f5f9; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; }
  .wrap { max-width:600px; margin:2rem auto; background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,.08); }
  .header { background:#1A4F8B; padding:1.75rem 2rem; }
  .header h1 { color:#fff; font-size:1.25rem; font-weight:700; margin:0; }
  .header p  { color:rgba(255,255,255,.75); font-size:.875rem; margin:.25rem 0 0; }
  .body { padding:2rem; }
  .greeting { font-size:1rem; color:#1E2A3A; margin-bottom:1.25rem; }
  .message-box {
    background:#f8fafc;
    border-left:3px solid #1A4F8B;
    border-radius:0 8px 8px 0;
    padding:1.25rem 1.5rem;
    font-size:.9375rem;
    color:#374151;
    line-height:1.7;
    margin-bottom:1.5rem;
    white-space:pre-wrap;
  }
  .divider { border:none; border-top:1px solid #e2e8f0; margin:1.5rem 0; }
  .original-label { font-size:.75rem; font-weight:700; color:#94a3b8; text-transform:uppercase; letter-spacing:.05em; margin-bottom:.75rem; }
  .original-msg { font-size:.8125rem; color:#64748b; line-height:1.6; white-space:pre-wrap; border-left:2px solid #e2e8f0; padding-left:1rem; }
  .footer { background:#f8fafc; padding:1.25rem 2rem; border-top:1px solid #e2e8f0; }
  .footer p { font-size:.8125rem; color:#94a3b8; margin:0; line-height:1.5; }
  .footer a { color:#1A4F8B; }
  .sig { margin-top:1.25rem; }
  .sig strong { color:#1E2A3A; font-size:.9375rem; }
  .sig p { color:#64748b; font-size:.8125rem; margin:.25rem 0 0; }
</style>
</head>
<body>
<div class="wrap">

  <div class="header">
    <h1>DBillers — Medical Billing Experts</h1>
    <p>Reply to your practice audit enquiry</p>
  </div>

  <div class="body">
    <p class="greeting">Hi {{ $lead->name }},</p>

    <div class="message-box">{{ $reply->body }}</div>

    <div class="sig">
      <strong>DBillers Support Team</strong>
      <p>📞 {{ setting('company_phone', '+1 (727) 350-2535') }}</p>
      <p>📧 {{ setting('company_email', 'billing@dbillers.com') }}</p>
      <p>🌐 <a href="https://dbillers.com">dbillers.com</a></p>
    </div>

    <hr class="divider">

    <div class="original-label">Your original message</div>
    <div class="original-msg">{{ $lead->message }}</div>
  </div>

  <div class="footer">
    <p>You received this email because you submitted a contact form on <a href="https://dbillers.com">dbillers.com</a>. This email is sent from a monitored inbox — you can reply directly to this email.</p>
  </div>

</div>
</body>
</html>
