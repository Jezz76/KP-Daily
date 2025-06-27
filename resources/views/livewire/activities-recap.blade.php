<div>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white drop-shadow-lg flex items-center gap-3">
            <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-amber-500 rounded-lg flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            {{ __('Rekapan Aktivitas KP') }}
        </h2>
    </x-slot>

    <div class="p-6">
        <div class="max-w-7xl mx-auto">
            <!-- Main Container -->
            <div class="backdrop-blur-sm bg-white/10 border border-white/20 rounded-2xl shadow-xl p-6">
                <!-- Success Message -->
                @if($successMsg)
                    <div class="mb-6 p-4 backdrop-blur-sm bg-green-500/20 border border-green-400/30 rounded-xl shadow-xl">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 bg-green-500 rounded-lg flex items-center justify-center text-white text-sm font-bold shadow-lg">✓</div>
                            <span class="text-green-200 font-medium">{{ $successMsg }}</span>
                        </div>
                    </div>
                @endif

                <!-- Header Section -->
                <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-6 mb-6">
                    <div>
                        <h3 class="text-2xl font-bold text-white drop-shadow-lg flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-xl flex items-center justify-center shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            Rekapan Aktivitas
                        </h3>
                        <p class="text-purple-200/90 mt-2">Total {{ $activities->count() }} aktivitas tercatat dalam sistem</p>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('activity.log') }}" 
                            class="px-6 py-3 bg-gradient-to-r from-gray-600 to-gray-700 text-white font-semibold rounded-xl hover:from-gray-700 hover:to-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-400/50 transition-all duration-150 shadow-xl flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Kembali
                        </a>
                        
                        <!-- Export Dropdown -->
                        <div class="relative">
                            <button onclick="toggleExportMenu()" 
                                class="px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-500 text-white font-semibold rounded-xl hover:from-green-600 hover:to-emerald-600 focus:outline-none focus:ring-2 focus:ring-green-400/50 transition-all duration-150 shadow-xl flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Export Excel
                                <svg class="w-4 h-4 transition-transform" id="exportIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            
                            <div id="exportMenu" class="hidden absolute right-0 mt-3 w-80 bg-gray-800/95 border border-gray-600/50 rounded-xl shadow-2xl z-20 overflow-hidden">
                                <div class="p-2">
                                    <button wire:click="exportToExcel" 
                                        class="w-full text-left px-4 py-3 text-white hover:bg-gray-700/70 rounded-lg transition-all duration-150 flex items-center gap-3 group">
                                        <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-lg flex items-center justify-center shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-white">Export Data Standar</div>
                                            <div class="text-xs text-gray-300">Tabel aktivitas tanpa gambar</div>
                                        </div>
                                    </button>
                                    
                                    <button wire:click="exportToExcelWithImages" 
                                        class="w-full text-left px-4 py-3 text-white hover:bg-gray-700/70 rounded-lg transition-all duration-150 flex items-center gap-3 group">
                                        <div class="w-8 h-8 bg-gradient-to-br from-pink-400 to-rose-500 rounded-lg flex items-center justify-center shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-white">Export dengan Gambar</div>
                                            <div class="text-xs text-gray-300">Lengkap dengan bukti gambar</div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Activities Table -->
                @if($activities->count() > 0)
                    <div class="backdrop-blur-sm bg-white/5 border border-white/10 rounded-xl overflow-hidden shadow-xl">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <!-- Table Header -->
                                <thead class="backdrop-blur-sm bg-white/10 border-b border-white/20">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                            <div class="flex items-center gap-2">
                                                <div class="w-4 h-4 bg-gradient-to-br from-purple-400 to-pink-500 rounded-lg"></div>
                                                No
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                            <div class="flex items-center gap-2">
                                                <div class="w-4 h-4 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-lg"></div>
                                                Tanggal
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                            <div class="flex items-center gap-2">
                                                <div class="w-4 h-4 bg-gradient-to-br from-green-400 to-emerald-500 rounded-lg"></div>
                                                Aktivitas
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                            <div class="flex items-center gap-2">
                                                <div class="w-4 h-4 bg-gradient-to-br from-orange-400 to-amber-500 rounded-lg"></div>
                                                Rencana Besok
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                            <div class="flex items-center gap-2">
                                                <div class="w-4 h-4 bg-gradient-to-br from-pink-400 to-rose-500 rounded-lg"></div>
                                                Bukti
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                            <div class="flex items-center gap-2">
                                                <div class="w-4 h-4 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-lg"></div>
                                                Aksi
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                
                                <!-- Table Body -->
                                <tbody class="divide-y divide-white/10">
                                    @foreach($activities as $index => $activity)
                                        <tr class="hover:bg-white/5 transition-all duration-150 group">
                                            <!-- Number -->
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="w-8 h-8 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center text-white font-bold shadow-lg">
                                                    {{ $index + 1 }}
                                                </div>
                                            </td>
                                            
                                            <!-- Date -->
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-6 h-6 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-lg flex items-center justify-center shadow-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                    </div>
                                                    <span class="text-blue-200 font-semibold">{{ $activity->date->format('d M Y') }}</span>
                                                </div>
                                            </td>
                                            
                                            <!-- Activity -->
                                            <td class="px-6 py-4">
                                                @if($editingId === $activity->id)
                                                    <div class="space-y-2">
                                                        <textarea wire:model="editActivity" 
                                                            class="w-full px-4 py-3 backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-purple-400/50 focus:border-transparent transition-all duration-150 shadow-lg resize-none" 
                                                            rows="3" placeholder="Edit aktivitas..."></textarea>
                                                        @error('editActivity') 
                                                            <div class="p-2 bg-red-500/20 border border-red-400/30 rounded-lg">
                                                                <span class="text-red-200 text-xs">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                @else
                                                    <div class="max-w-md text-white leading-relaxed">{{ $activity->activity }}</div>
                                                @endif
                                            </td>
                                            
                                            <!-- Next Plan -->
                                            <td class="px-6 py-4">
                                                @if($editingId === $activity->id)
                                                    <div class="space-y-2">
                                                        <textarea wire:model="editNextPlan" 
                                                            class="w-full px-4 py-3 backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-purple-400/50 focus:border-transparent transition-all duration-150 shadow-lg resize-none" 
                                                            rows="2" placeholder="Edit rencana besok..."></textarea>
                                                        @error('editNextPlan') 
                                                            <div class="p-2 bg-red-500/20 border border-red-400/30 rounded-lg">
                                                                <span class="text-red-200 text-xs">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                @else
                                                    <div class="max-w-md text-white leading-relaxed">
                                                        {{ $activity->next_plan ?? '-' }}
                                                    </div>
                                                @endif
                                            </td>
                                            
                                            <!-- Evidence -->
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($activity->evidence_file)
                                                    <a href="{{ $activity->evidence_url }}" target="_blank" 
                                                        class="inline-flex items-center gap-2 px-3 py-2 bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-lg hover:from-blue-600 hover:to-cyan-600 transition-all duration-150 shadow-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.586-6.586a2 2 0 00-2.828-2.828z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        </svg>
                                                        Lihat
                                                    </a>
                                                @else
                                                    <span class="text-purple-300/90 italic">-</span>
                                                @endif
                                            </td>
                                            
                                            <!-- Actions -->
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($editingId === $activity->id)
                                                    <div class="flex gap-2">
                                                        <button wire:click="updateActivity" 
                                                            class="px-3 py-2 bg-gradient-to-r from-green-500 to-emerald-500 text-white rounded-lg hover:from-green-600 hover:to-emerald-600 focus:outline-none focus:ring-2 focus:ring-green-400/50 transition-all duration-150 shadow-lg flex items-center gap-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                            </svg>
                                                            Simpan
                                                        </button>
                                                        <button wire:click="cancelEdit" 
                                                            class="px-3 py-2 bg-gradient-to-r from-gray-500 to-gray-600 text-white rounded-lg hover:from-gray-600 hover:to-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400/50 transition-all duration-150 shadow-lg flex items-center gap-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                            Batal
                                                        </button>
                                                    </div>
                                                @else
                                                    <div class="flex gap-2">
                                                        <button wire:click="editActivity({{ $activity->id }})" 
                                                            class="px-3 py-2 bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-lg hover:from-blue-600 hover:to-cyan-600 focus:outline-none focus:ring-2 focus:ring-blue-400/50 transition-all duration-150 shadow-lg flex items-center gap-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                            </svg>
                                                            Edit
                                                        </button>
                                                        <button wire:click="deleteActivity({{ $activity->id }})" 
                                                                onclick="return confirm('Yakin ingin menghapus aktivitas ini?')"
                                                                class="px-3 py-2 bg-gradient-to-r from-red-500 to-pink-500 text-white rounded-lg hover:from-red-600 hover:to-pink-600 focus:outline-none focus:ring-2 focus:ring-red-400/50 transition-all duration-150 shadow-lg flex items-center gap-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                            Hapus
                                                        </button>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-20">
                        <div class="w-32 h-32 mx-auto mb-8 bg-gradient-to-br from-purple-400 to-pink-500 rounded-3xl flex items-center justify-center shadow-2xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4 drop-shadow-lg">Belum Ada Aktivitas</h3>
                        <p class="text-purple-200/90 mb-2">Mulai catat aktivitas harian Anda untuk melihat rekapan di sini.</p>
                        <p class="text-purple-300/90 text-sm mb-8">Dokumentasikan setiap progress kerja praktik dengan detail</p>
                        
                        <a href="{{ route('activity.log') }}" 
                            class="inline-flex items-center gap-3 px-6 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-white font-semibold rounded-xl hover:from-blue-600 hover:to-cyan-600 focus:outline-none focus:ring-2 focus:ring-blue-400/50 transition-all duration-150 shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Catat Aktivitas Pertama
                        </a>
                        
                        <!-- Decorative Elements -->
                        <div class="flex justify-center gap-4 mt-12">
                            <div class="w-3 h-3 bg-purple-400/60 rounded-full"></div>
                            <div class="w-3 h-3 bg-pink-400/60 rounded-full"></div>
                            <div class="w-3 h-3 bg-indigo-400/60 rounded-full"></div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Lightweight Custom Styles -->
    <style>
        /* Simplified export menu animations */
        #exportMenu {
            transition: opacity 0.15s ease, transform 0.15s ease;
        }
        
        #exportMenu.hidden {
            opacity: 0;
            transform: translateY(-5px);
        }
        
        #exportMenu:not(.hidden) {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <script>
        function toggleExportMenu() {
            const menu = document.getElementById('exportMenu');
            const icon = document.getElementById('exportIcon');
            
            menu.classList.toggle('hidden');
            
            // Rotate icon
            if (menu.classList.contains('hidden')) {
                icon.style.transform = 'rotate(0deg)';
            } else {
                icon.style.transform = 'rotate(180deg)';
            }
        }

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('exportMenu');
            const button = event.target.closest('button[onclick="toggleExportMenu()"]');
            
            if (!button && !menu.contains(event.target)) {
                menu.classList.add('hidden');
                document.getElementById('exportIcon').style.transform = 'rotate(0deg)';
            }
        });
    </script>
</div>
