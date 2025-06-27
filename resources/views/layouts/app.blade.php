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
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-purple-900 via-blue-900 to-indigo-900 overflow-x-hidden">
        <div class="min-h-screen flex relative">
            <!-- Subtle Background Elements -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-10 left-10 w-64 h-64 bg-purple-500 rounded-full opacity-20 blur-3xl"></div>
                <div class="absolute bottom-10 right-10 w-64 h-64 bg-pink-500 rounded-full opacity-20 blur-3xl"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-blue-500 rounded-full opacity-10 blur-3xl"></div>
            </div>
            
            <!-- Fixed Sidebar -->
            <aside class="fixed left-0 top-0 w-72 h-screen backdrop-blur-sm bg-white/10 border-r border-white/20 shadow-xl hidden md:block z-40 overflow-y-auto">
                <!-- Logo Section -->
                <div class="h-16 flex items-center justify-center border-b border-white/20 bg-white/5">
                    <div class="text-center">
                        <h1 class="text-xl font-bold text-white drop-shadow-lg">KP Daily Log</h1>
                        <p class="text-xs text-purple-200">Kerja Praktik Manager</p>
                    </div>
                </div>
                
                <!-- User Info Section -->
                <div class="p-4 border-b border-white/20 bg-white/5">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full flex items-center justify-center text-white font-semibold text-sm shadow-lg">
                            {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-white font-medium">{{ auth()->user()->name ?? 'User' }}</p>
                            <p class="text-purple-200 text-sm">{{ auth()->user()->email ?? 'user@example.com' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 px-3 py-4 space-y-1">
                    <a href="{{ route('dashboard') }}" class="group flex items-center px-3 py-2 rounded-xl text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-purple-500 to-pink-500 text-white shadow-lg' : 'text-purple-100 hover:bg-white/10 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v14H8V5z" />
                        </svg>
                        Dashboard
                    </a>
                    
                    <a href="{{ route('activity.log') }}" class="group flex items-center px-3 py-2 rounded-xl text-sm font-medium {{ request()->routeIs('activity.log') ? 'bg-gradient-to-r from-green-500 to-emerald-500 text-white shadow-lg' : 'text-purple-100 hover:bg-white/10 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        Aktivitas Harian
                    </a>
                    
                    <a href="{{ route('activities.recap') }}" class="group flex items-center px-3 py-2 rounded-xl text-sm font-medium {{ request()->routeIs('activities.recap') ? 'bg-gradient-to-r from-orange-500 to-amber-500 text-white shadow-lg' : 'text-purple-100 hover:bg-white/10 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Rekap Aktivitas
                    </a>
                    
                    <a href="{{ route('kp.settings') }}" class="group flex items-center px-3 py-2 rounded-xl text-sm font-medium {{ request()->routeIs('kp.settings') ? 'bg-gradient-to-r from-indigo-500 to-purple-500 text-white shadow-lg' : 'text-purple-100 hover:bg-white/10 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Periode KP
                    </a>
                    
                    <a href="{{ route('profile') }}" class="group flex items-center px-3 py-2 rounded-xl text-sm font-medium {{ request()->routeIs('profile') ? 'bg-gradient-to-r from-gray-500 to-gray-600 text-white shadow-lg' : 'text-purple-100 hover:bg-white/10 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Pengaturan Akun
                    </a>
                </nav>
                
                <!-- Logout Section -->
                <div class="px-3 pb-4">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                       class="flex items-center px-3 py-2 rounded-xl text-purple-100 hover:bg-red-500/80 hover:text-white text-sm font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                </div>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 md:ml-72 min-h-screen relative z-10">
                <!-- Top Navbar -->
                <header class="backdrop-blur-sm bg-white/10 border-b border-white/20 sticky top-0 z-30 shadow-lg">
                    <div class="px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                @if (isset($header))
                                    <div class="text-white font-semibold drop-shadow-lg">{{ $header }}</div>
                                @endif
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="text-sm text-purple-200">{{ now()->format('l, d F Y') }}</div>
                                <div class="w-8 h-8 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full flex items-center justify-center shadow-lg">
                                    <div class="w-2 h-2 bg-white rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                
                <!-- Page Content -->
                <main class="relative">
                    {{ $slot }}
                </main>
            </div>
        </div>

        <!-- Modern Glass Theme CSS -->
        <style>
            /* Disable heavy animations for performance */
            *, *::before, *::after {
                animation-duration: 0s !important;
                animation-delay: 0s !important;
                transition-duration: 0.15s !important;
            }
            
            /* Sidebar fixed layout */
            aside {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                height: 100vh !important;
                width: 18rem !important;
                z-index: 40 !important;
                overflow-y: auto !important;
                display: flex !important;
                flex-direction: column !important;
            }
            
            /* Main content layout */
            @media (min-width: 768px) {
                .md\:ml-72 {
                    margin-left: 18rem !important;
                }
            }
            
            /* Smooth scrolling */
            html {
                scroll-behavior: auto !important;
            }
            
            body {
                overflow-x: hidden !important;
            }
            
            /* Hover effects */
            .hover\:bg-white\/10:hover {
                background-color: rgba(255, 255, 255, 0.1) !important;
                transition: background-color 0.15s ease !important;
            }
            
            .hover\:bg-red-500\/80:hover {
                background-color: rgba(239, 68, 68, 0.8) !important;
                transition: background-color 0.15s ease !important;
            }
            
            .hover\:text-white:hover {
                color: #ffffff !important;
            }
            
            /* Remove heavy transitions */
            .transition-all,
            .transition-transform,
            .transition-colors {
                transition: opacity 0.15s ease, background-color 0.15s ease, color 0.15s ease !important;
            }
            
            /* Hide sidebar on mobile */
            @media (max-width: 767px) {
                aside {
                    display: none !important;
                }
                .md\:ml-72 {
                    margin-left: 0 !important;
                }
            }
            
            /* Light backdrop blur for glass effect */
            .backdrop-blur-sm {
                backdrop-filter: blur(4px) !important;
                -webkit-backdrop-filter: blur(4px) !important;
            }
            
            /* Shadow effects */
            .shadow-lg {
                box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -2px rgb(0 0 0 / 0.05) !important;
            }
            
            .shadow-xl {
                box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 10px 10px -5px rgb(0 0 0 / 0.04) !important;
            }
            
            /* Drop shadow for text */
            .drop-shadow-lg {
                filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1)) !important;
            }
            
            /* Force hardware acceleration only where needed */
            .sticky {
                will-change: transform !important;
            }
            
            /* Glass morphism containers */
            .glass-container {
                backdrop-filter: blur(8px) !important;
                -webkit-backdrop-filter: blur(8px) !important;
                background: rgba(255, 255, 255, 0.1) !important;
                border: 1px solid rgba(255, 255, 255, 0.2) !important;
                border-radius: 1rem !important;
            }
        </style>
        
        @livewireScripts
    </body>
</html>
