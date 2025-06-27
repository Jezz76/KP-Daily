<div class="space-y-6">
    <!-- Info Periode KP -->
    <div class="glass-container p-6 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 text-white">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-bold mb-1">Periode Kerja Praktik</h2>
                <p class="text-white/90 text-sm">Monitoring progress KP secara real-time</p>
            </div>
            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
        
        @if($start_date && $end_date)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Tanggal Mulai -->
                <div class="bg-white/10 rounded-lg p-3 border border-white/20">
                    <div class="text-white/70 text-xs font-medium mb-1">Mulai KP</div>
                    <div class="text-lg font-bold">{{ Carbon\Carbon::parse($start_date)->format('d M Y') }}</div>
                    <div class="text-white/60 text-xs mt-1">{{ Carbon\Carbon::parse($start_date)->diffForHumans() }}</div>
                </div>
                
                <!-- Progress -->
                <div class="bg-white/10 rounded-lg p-3 border border-white/20">
                    <div class="text-white/70 text-xs font-medium mb-2">Progress KP</div>
                    <div class="flex items-center space-x-3">
                        <div class="flex-1 bg-white/20 rounded-full h-2">
                            <div class="bg-gradient-to-r from-green-400 to-emerald-500 h-2 rounded-full transition-all duration-300" style="width: {{ $progress_percentage }}%"></div>
                        </div>
                        <span class="text-sm font-bold">{{ $progress_percentage }}%</span>
                    </div>
                    <div class="text-white/60 text-xs mt-1">{{ $days_passed }} dari {{ $total_days }} hari</div>
                </div>
                
                <!-- Tanggal Selesai -->
                <div class="bg-white/10 rounded-lg p-3 border border-white/20">
                    <div class="text-white/70 text-xs font-medium mb-1">Selesai KP</div>
                    <div class="text-lg font-bold">{{ Carbon\Carbon::parse($end_date)->format('d M Y') }}</div>
                    <div class="text-white/60 text-xs mt-1">{{ $days_remaining }} hari lagi</div>
                </div>
            </div>
        @else
            <div class="text-center py-4">
                <p class="text-white/80 mb-3 text-sm">Periode KP belum diatur</p>
                <a href="{{ route('kp.settings') }}" class="inline-flex items-center px-4 py-2 bg-white text-purple-600 rounded-lg font-medium hover:bg-gray-100 transition-colors duration-150">
                    Atur Periode KP
                </a>
            </div>
        @endif
    </div>

    <!-- Widget Informatif -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Widget Motivasi -->
        <div class="lg:col-span-1">
            <livewire:motivation-widget />
        </div>
        
        <!-- Widget Cuaca -->
        <div class="lg:col-span-1">
            <livewire:weather-widget />
        </div>
        
        <!-- Widget Lokasi -->
        <div class="lg:col-span-1">
            <livewire:location-widget />
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <!-- Total Aktivitas -->
        <div class="glass-container p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-xs font-medium">Total Aktivitas</p>
                    <p class="text-lg font-bold text-white">{{ $total_activities }}</p>
                </div>
                <div class="w-8 h-8 bg-blue-500/20 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Status Hari Ini -->
        <div class="glass-container p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-xs font-medium">Hari Ini</p>
                    <p class="text-sm font-bold {{ $today_filled ? 'text-green-300' : 'text-orange-300' }}">
                        {{ $today_filled ? 'Sudah Diisi' : 'Belum Diisi' }}
                    </p>
                </div>
                <div class="w-8 h-8 {{ $today_filled ? 'bg-green-500/20' : 'bg-orange-500/20' }} rounded-lg flex items-center justify-center">
                    @if($today_filled)
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-orange-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    @endif
                </div>
            </div>
        </div>

        <!-- Terakhir Input -->
        <div class="glass-container p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-xs font-medium">Terakhir Input</p>
                    <p class="text-sm font-bold text-white">
                        {{ $last_activity_date ? Carbon\Carbon::parse($last_activity_date)->format('d M') : 'Belum ada' }}
                    </p>
                </div>
                <div class="w-8 h-8 bg-purple-500/20 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Sisa Hari -->
        <div class="glass-container p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-xs font-medium">Sisa Hari</p>
                    <p class="text-lg font-bold text-white">{{ $days_remaining ?? 0 }}</p>
                </div>
                <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="glass-container p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-white">Aktivitas Terbaru</h3>
            <a href="{{ route('activity.log') }}" class="text-blue-300 hover:text-blue-200 font-medium transition-colors duration-150">Lihat Semua</a>
        </div>
        
        @if(count($activities) > 0)
            <div class="space-y-3">
                @foreach($activities as $activity)
                    <div class="flex items-center space-x-3 p-3 bg-white/5 rounded-lg border border-white/10">
                        <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                        <div class="flex-1">
                            <p class="font-medium text-white text-sm">{{ $activity['activity'] }}</p>
                            <p class="text-xs text-white/70">{{ Carbon\Carbon::parse($activity['date'])->format('d M Y') }}</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-500/20 text-blue-300 border border-blue-400/30">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4" />
                                </svg>
                                Tercatat
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-4 text-white/70">
                <p class="mb-2 text-sm">Belum ada aktivitas yang dicatat</p>
                <a href="{{ route('activity.log') }}" class="text-blue-300 hover:text-blue-200 font-medium transition-colors duration-150">Mulai Catat Aktivitas</a>
            </div>
        @endif
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <a href="{{ route('activity.log') }}" class="glass-container p-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white hover:from-blue-600 hover:to-blue-700 transition-colors duration-150">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-sm">Catat Aktivitas</h4>
                    <p class="text-blue-100 text-xs">Input aktivitas hari ini</p>
                </div>
            </div>
        </a>

        <a href="{{ route('kp.settings') }}" class="glass-container p-4 bg-gradient-to-r from-purple-500 to-purple-600 text-white hover:from-purple-600 hover:to-purple-700 transition-colors duration-150">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-sm">Pengaturan</h4>
                    <p class="text-purple-100 text-xs">Atur periode KP</p>
                </div>
            </div>
        </a>
    </div>
</div>
