<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DBillers - Smart Medical Billing for US Healthcare Providers</title>
    <meta name="description" content="DBillers is a top US medical billing firm - applying best practices in revenue cycle management and clinical coding. We help physicians outsource billing to experts.">
    
    <!-- Font Awesome 6 (Free CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    @if(app()->environment('local'))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('build/assets/app-D8Gc21hr.css') }}">
        <script type="module" src="{{ asset('build/assets/app-BdKX2mS3.js') }}"></script>
    @endif
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-sans antialiased bg-white">
    @include('layouts.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('layouts.footer')
</body>
</html>
