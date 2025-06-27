<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white leading-tight drop-shadow-lg flex items-center">
            <svg class="w-8 h-8 mr-3 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
            </svg>
            {{ __('Dashboard Overview') }}
        </h2>
    </x-slot>

    <div class="p-6 space-y-6">
        <div class="max-w-4xl mx-auto space-y-6">
            <!-- Welcome Section -->
            <div class="glass-container shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-xl font-bold text-white mb-2 drop-shadow-lg">
                            Selamat datang, {{ auth()->user()->name }}! 👋
                        </h1>
                        <p class="text-purple-200">
                            Mari lihat perkembangan aktivitas KP Anda hari ini
                        </p>
                    </div>
                    <div class="hidden lg:block">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dashboard Components -->
            <div class="glass-container shadow-lg p-6">
                <livewire:dashboard-overview />
            </div>
        </div>
    </div>
</x-app-layout>
