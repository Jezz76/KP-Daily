<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Livewire Scripts -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased overflow-hidden">
        {{ $slot }}
        
        @livewireScripts
        
        <!-- Login Redirect Script -->
        <script>
            // Listen for successful login/register
            document.addEventListener('livewire:navigated', function() {
                // Check if user is authenticated and redirect if needed
                if (window.location.pathname === '/login' || window.location.pathname === '/register') {
                    setTimeout(function() {
                        if (document.querySelector('[wire\\:loading]') && !document.querySelector('[wire\\:loading]').style.display) {
                            window.location.href = '/dashboard';
                        }
                    }, 100);
                }
            });
            
            // Additional fallback for auth success
            window.addEventListener('auth-success', function() {
                window.location.href = '/dashboard';
            });
        </script>
    </body>
</html>
