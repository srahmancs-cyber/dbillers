<style>
    /* ── Cookie Banner ── */
    #cookie-banner {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 9999;
        background: #1E2A3A;
        color: #e2e8f0;
        padding: 1.25rem 1.5rem;
        box-shadow: 0 -4px 24px rgba(0,0,0,.25);
        transform: translateY(100%);
        transition: transform 0.4s cubic-bezier(0.32,0.72,0,1);
    }
    #cookie-banner.is-visible {
        transform: translateY(0);
    }
    .cookie-inner {
        max-width: 1280px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        flex-wrap: wrap;
    }
    .cookie-text {
        flex: 1 1 320px;
        font-size: 0.875rem;
        line-height: 1.6;
        color: #cbd5e1;
    }
    .cookie-text a {
        color: #93c5fd;
        text-decoration: underline;
    }
    .cookie-text a:hover { color: #bfdbfe; }
    .cookie-text strong { color: #f1f5f9; }
    .cookie-actions {
        display: flex;
        gap: 0.75rem;
        flex-shrink: 0;
        flex-wrap: wrap;
    }
    .cookie-btn {
        padding: 0.625rem 1.375rem;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        font-weight: 600;
        cursor: pointer;
        border: none;
        transition: all 0.2s ease;
        white-space: nowrap;
    }
    .cookie-btn-accept {
        background: #1A4F8B;
        color: #fff;
    }
    .cookie-btn-accept:hover { background: #0E3A6B; }
    .cookie-btn-decline {
        background: transparent;
        color: #94a3b8;
        border: 1px solid #334155;
    }
    .cookie-btn-decline:hover {
        background: #334155;
        color: #e2e8f0;
    }

    @media (max-width: 600px) {
        #cookie-banner { padding: 1rem; }
        .cookie-inner { gap: 1rem; }
        .cookie-actions { width: 100%; }
        .cookie-btn { flex: 1; text-align: center; }
    }
</style>

<div id="cookie-banner" role="dialog" aria-live="polite" aria-label="Cookie consent">
    <div class="cookie-inner">
        <p class="cookie-text">
            <strong>We use cookies.</strong>
            We use cookies and similar tracking technologies (including Google Tag Manager) to improve your experience,
            analyse site traffic, and support our marketing. By clicking <strong>Accept</strong>, you consent to our use of cookies.
            You can <strong>Decline</strong> non-essential cookies at any time.
            Read our <a href="/privacy-policy">Privacy Policy</a> for details.
        </p>
        <div class="cookie-actions">
            <button class="cookie-btn cookie-btn-decline" id="cookie-decline">Decline</button>
            <button class="cookie-btn cookie-btn-accept" id="cookie-accept">Accept All</button>
        </div>
    </div>
</div>

<script>
(function () {
    var STORAGE_KEY = 'dbillers_cookie_consent';
    var banner      = document.getElementById('cookie-banner');
    var btnAccept   = document.getElementById('cookie-accept');
    var btnDecline  = document.getElementById('cookie-decline');

    // Push consent signal to GTM dataLayer
    function pushConsent(granted) {
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            event: 'cookie_consent',
            cookie_consent: granted ? 'granted' : 'denied'
        });
    }

    function hideBanner() {
        banner.classList.remove('is-visible');
    }

    function accept() {
        localStorage.setItem(STORAGE_KEY, 'accepted');
        pushConsent(true);
        hideBanner();
    }

    function decline() {
        localStorage.setItem(STORAGE_KEY, 'declined');
        pushConsent(false);
        hideBanner();
    }

    // Check stored preference
    var stored = localStorage.getItem(STORAGE_KEY);

    if (!stored) {
        // No decision yet — show banner after brief delay
        setTimeout(function () {
            banner.classList.add('is-visible');
        }, 800);
    } else {
        // Already decided — push consent signal silently for GTM
        pushConsent(stored === 'accepted');
    }

    btnAccept.addEventListener('click', accept);
    btnDecline.addEventListener('click', decline);
})();
</script>
