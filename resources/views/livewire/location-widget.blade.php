<div class="relative overflow-hidden min-h-[340px] flex flex-col justify-between bg-gradient-to-r from-green-500 to-teal-400 text-white rounded-xl shadow-lg">
    <!-- Subtle Background Elements -->
    <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full opacity-30 -translate-y-16 translate-x-16"></div>
    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full opacity-30 translate-y-12 -translate-x-12"></div>
    
    <div class="relative z-10 p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold drop-shadow-lg">Lokasi Saat Ini</h3>
            </div>
            <div class="w-3 h-3 bg-white rounded-full shadow-lg"></div>
        </div>
        
        <div class="space-y-4">
            <!-- Location Details -->
            <div class="space-y-3">
                <div>
                    <div class="flex items-center space-x-2 mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white/80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <span class="text-white/80 text-sm font-medium">Kota</span>
                    </div>
                    <p class="text-xl font-bold text-white ml-6 drop-shadow-lg">{{ $city }}</p>
                </div>
                
                <div>
                    <div class="flex items-center space-x-2 mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white/80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-white/80 text-sm font-medium">Wilayah</span>
                    </div>
                    <p class="text-white/90 font-semibold ml-6">{{ $region }}, {{ $country }}</p>
                </div>
            </div>
            
            <!-- Work Status -->
            <div class="bg-white/20 rounded-xl p-3 border border-white/30 shadow-lg">
                <div class="flex items-center space-x-2">
                    <div class="w-2 h-2 bg-white rounded-full"></div>
                    <p class="text-white/90 text-sm font-medium">
                        📍 Lokasi kerja terdeteksi otomatis
                    </p>
                </div>
            </div>
            
            <!-- IP Address -->
            <div class="text-xs text-white/60 text-center pt-2 border-t border-white/20">
                IP: {{ $ip }}
            </div>
        </div>
    </div>
</div>
