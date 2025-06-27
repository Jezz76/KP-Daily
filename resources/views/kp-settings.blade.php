<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white drop-shadow-lg flex items-center gap-3">
            <div class="w-8 h-8 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-lg flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            {{ __('Pengaturan Periode KP') }}
        </h2>
    </x-slot>

    <div class="py-8 px-6">
        <div class="max-w-4xl mx-auto space-y-6">
            <!-- Description Card -->
            <div class="backdrop-blur-sm bg-white/10 border border-white/20 rounded-2xl shadow-xl p-6 text-center">
                <p class="text-purple-200/90 text-lg">Tentukan rentang waktu pelaksanaan kerja praktik Anda</p>
            </div>

            <!-- Main Settings Card -->
            <div class="backdrop-blur-sm bg-white/10 border border-white/20 rounded-2xl shadow-xl p-8">
                <livewire:kp-period-settings />
            </div>
        </div>
    </div>
</x-app-layout>