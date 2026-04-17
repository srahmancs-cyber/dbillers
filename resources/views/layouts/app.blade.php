<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Dynamic Meta Tags -->
    <title>@yield('meta_title', setting('site_title', 'DBillers - Smart Medical Billing for US Healthcare Providers'))</title>
    <meta name="description" content="@yield('meta_description', setting('site_description', 'DBillers is a top US medical billing firm - applying best practices in revenue cycle management and clinical coding.'))">
    <meta name="keywords" content="@yield('meta_keywords', setting('site_keywords', 'medical billing, revenue cycle management, medical coding, healthcare billing'))">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:title" content="@yield('og_title', setting('site_title', 'DBillers'))">
    <meta property="og:description" content="@yield('og_description', setting('site_description', ''))">
    <meta property="og:image" content="@yield('og_image', setting('og_image', ''))">
    
    <!-- X (formerly Twitter) -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="@yield('og_url', url()->current())">
    <meta name="twitter:title" content="@yield('og_title', setting('site_title', 'DBillers'))">
    <meta name="twitter:description" content="@yield('og_description', setting('site_description', ''))">
    <meta name="twitter:image" content="@yield('og_image', setting('og_image', ''))">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="@yield('canonical', url()->current())">
    
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    
    <!-- Font Awesome 6 (Free CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Always use built assets (works with APP_ENV=local) -->
    @php
        $manifestPath = public_path('build/manifest.json');
        $cssFile = 'assets/app-rk26vugh.css';
        $jsFile = 'assets/app-BdKX2mS3.js';
        
        if (file_exists($manifestPath)) {
            $manifest = json_decode(file_get_contents($manifestPath), true);
            $cssFile = $manifest['resources/css/app.css']['file'] ?? $cssFile;
            $jsFile = $manifest['resources/js/app.js']['file'] ?? $jsFile;
        }
    @endphp
    
    <link rel="stylesheet" href="{{ asset('build/' . $cssFile) }}">
    <script type="module" src="{{ asset('build/' . $jsFile) }}"></script>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
    
    <!-- Schema.org JSON-LD -->
    @yield('schema')
</head>
<body class="font-sans antialiased bg-white">
    @include('layouts.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('layouts.footer')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: false,
            offset: 100
        });
    </script>
</body>
</html>
