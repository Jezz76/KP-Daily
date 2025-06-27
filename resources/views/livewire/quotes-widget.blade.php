<div class="relative bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center space-x-2">
            <div class="w-10 h-10 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900">Motivasi Harian</h3>
        </div>
        <button 
            wire:click="refreshQuote" 
            class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-50 rounded-full transition-colors duration-200"
            wire:loading.attr="disabled"
        >
            <svg xmlns="http://www.w3.org/2000/svg" 
                 class="h-5 w-5 {{ $isLoading ? 'animate-spin' : '' }}" 
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
        </button>
    </div>
    
    <div class="relative">
        @if($isLoading)
            <div class="flex items-center justify-center py-8">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-yellow-500"></div>
            </div>
        @else
            <div class="space-y-4">
                <!-- Quote Icon -->
                <div class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500/30" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                </div>
                
                <!-- Quote Text -->
                <blockquote class="text-center">
                    <p class="text-gray-700 text-lg leading-relaxed font-medium italic mb-4">
                        "{{ $quote }}"
                    </p>
                    <footer class="text-gray-500 text-sm">
                        <cite class="not-italic font-semibold">— {{ $author }}</cite>
                    </footer>
                </blockquote>
            </div>
        @endif
    </div>
    
    <!-- Decorative elements -->
    <div class="absolute top-2 right-2 w-2 h-2 bg-yellow-400 rounded-full opacity-20"></div>
    <div class="absolute bottom-2 left-2 w-1 h-1 bg-orange-400 rounded-full opacity-30"></div>
</div>
