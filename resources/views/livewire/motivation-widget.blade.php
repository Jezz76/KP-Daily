<div 
    class="p-6 min-h-[340px] flex flex-col justify-between bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-xl shadow-lg relative overflow-hidden"
    x-data="{ refreshed: false }"
    @quote-refreshed.window="refreshed = true; setTimeout(() => refreshed = false, 2000)"
>
    <!-- Subtle Background Elements -->
    <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full opacity-30 -translate-y-16 translate-x-16"></div>
    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full opacity-30 translate-y-12 -translate-x-12"></div>
    
    <div class="relative z-10">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold drop-shadow-lg flex items-center gap-2">
                    Motivasi Harian
                    <span x-show="refreshed" x-transition class="text-sm bg-white/20 px-2 py-1 rounded-full">✨ Baru!</span>
                </h3>
            </div>
            <button 
                wire:click="refreshQuote" 
                class="text-white/80 hover:text-white hover:bg-white/20 p-2 rounded-xl shadow-lg transition-all duration-150"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-50 cursor-not-allowed"
                title="Quote Baru"
                type="button"
            >
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="h-5 w-5 transition-transform duration-300" 
                     wire:loading.class="animate-spin"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                <span wire:loading wire:target="refreshQuote" class="sr-only">Memuat...</span>
            </button>
        </div>
        
        @if($isLoading)
            <div class="flex items-center justify-center py-8">
                <div class="animate-spin rounded-full h-8 w-8 border-2 border-white/30 border-t-white"></div>
                <span class="ml-3 text-white/80">Memuat quote baru...</span>
            </div>
        @else
            <div class="space-y-4">
                <!-- Quote icon -->
                <div class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white/30" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                </div>
                
                <blockquote class="text-center">
                    <p class="text-white text-xl leading-relaxed font-medium italic mb-4 drop-shadow-lg">
                        "{{ $quote ?: 'Tetap semangat dalam menjalani perjalanan KP Anda!' }}"
                    </p>
                    <footer class="text-white/80">
                        <cite class="not-italic font-semibold text-lg drop-shadow-lg">{{ $author ?: 'KP Daily Log' }}</cite>
                    </footer>
                </blockquote>
            </div>
        @endif
    </div>
</div>
