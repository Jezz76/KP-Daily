<div class="relative overflow-hidden min-h-[340px] flex flex-col justify-between bg-gradient-to-r from-blue-500 to-blue-300 text-white rounded-xl shadow-lg">
    <!-- Subtle Background Elements -->
    <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full opacity-30 -translate-y-16 translate-x-16"></div>
    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full opacity-30 translate-y-12 -translate-x-12"></div>
    
    <div class="relative z-10 p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold drop-shadow-lg">Cuaca Hari Ini</h3>
            </div>
        </div>
        
        <div class="flex items-center gap-6">
            <div class="flex-1">
                <!-- Location -->
                <div class="flex items-center space-x-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white/80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="text-white/90 font-medium">{{ ucfirst($city) }}</span>
                </div>
                
                <div class="text-4xl font-extrabold mb-2 drop-shadow-lg">{{ $temp ? $temp . '°C' : '-' }}</div>
                <div class="text-lg font-semibold mb-3 drop-shadow-lg">{{ $weather }} · {{ $description }}</div>
                
                <div class="bg-white/20 rounded-xl p-3 border border-white/30 shadow-lg">
                    <p class="text-white/90 text-sm font-medium">
                        @if($weather === 'Rain')
                            🌧️ Hari ini hujan, cocok kerja di dalam ruangan
                        @elseif($weather === 'Clear')
                            ☀️ Cerah, semangat kerja di luar ruangan!
                        @elseif($weather === 'Clouds')
                            ☁️ Berawan, tetap produktif ya!
                        @else
                            💪 Cuaca apapun, tetap semangat kerja praktik!
                        @endif
                    </p>
                </div>
            </div>
            
            @if($icon)
                <div class="flex-shrink-0">
                    <img src="https://openweathermap.org/img/wn/{{ $icon }}@4x.png" 
                         alt="Weather icon" 
                         class="w-24 h-24 drop-shadow-lg">
                </div>
            @endif
        </div>
    </div>
</div>
