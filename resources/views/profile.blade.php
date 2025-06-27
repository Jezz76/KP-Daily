<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white drop-shadow-lg flex items-center gap-3">
            <div class="w-8 h-8 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-xl flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            {{ __('Pengaturan Akun') }}
        </h2>
    </x-slot>

    <div class="p-6 space-y-6">
        <div class="max-w-4xl mx-auto space-y-6">
            <div class="glass-container shadow-lg p-6">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div class="glass-container shadow-lg p-6">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <div class="glass-container shadow-lg p-6">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
