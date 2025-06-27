<div>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white drop-shadow-lg flex items-center gap-3">
            <div class="w-8 h-8 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
            </div>
            {{ __('Catatan Aktivitas Harian') }}
        </h2>
    </x-slot>

    <div class="p-6 space-y-6">
        <div class="max-w-4xl mx-auto space-y-6">
            <!-- Holiday Checker -->
            <div class="glass-container shadow-lg">
                <livewire:holiday-checker />
            </div>

            <!-- Main Form Container -->
            <div class="glass-container shadow-lg p-8">
                <!-- Form Header -->
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-white drop-shadow-lg mb-2 flex items-center gap-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center shadow-lg">
                            ✏️
                        </div>
                        Catat Aktivitas Harian
                    </h2>
                    <p class="text-purple-200">Dokumentasikan kegiatan kerja praktik Anda hari ini</p>
                </div>

                <!-- Activity Form -->
                <form wire:submit.prevent="addActivity" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Date Input -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-white mb-2 flex items-center gap-2">
                                <div class="w-5 h-5 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-lg flex items-center justify-center">
                                    📅
                                </div>
                                Tanggal
                            </label>
                            <input type="date" wire:model="date" 
                                class="w-full px-4 py-3 backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent shadow-lg" />
                            @error('date') 
                                <div class="mt-2 p-3 bg-red-500/20 border border-red-400/30 rounded-lg">
                                    <span class="text-red-200 text-sm flex items-center gap-2">
                                        <div class="w-4 h-4 bg-red-400 rounded-full flex items-center justify-center text-xs text-white">!</div>
                                        {{ $message }}
                                    </span>
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Activity Input -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-white mb-2 flex items-center gap-2">
                                <div class="w-5 h-5 bg-gradient-to-br from-green-400 to-emerald-500 rounded-lg flex items-center justify-center">
                                    📝
                                </div>
                                Aktivitas Hari Ini
                            </label>
                            <textarea wire:model="activity" 
                                class="w-full px-4 py-3 backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent shadow-lg resize-none" 
                                rows="4" placeholder="Ceritakan apa yang Anda kerjakan hari ini..."></textarea>
                            @error('activity') 
                                <div class="mt-2 p-3 bg-red-500/20 border border-red-400/30 rounded-lg">
                                    <span class="text-red-200 text-sm flex items-center gap-2">
                                        <div class="w-4 h-4 bg-red-400 rounded-full flex items-center justify-center text-xs text-white">!</div>
                                        {{ $message }}
                                    </span>
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Next Plan Input -->
                        <div class="md:col-span-1">
                            <label class="block text-sm font-medium text-white mb-2 flex items-center gap-2">
                                <div class="w-5 h-5 bg-gradient-to-br from-orange-400 to-amber-500 rounded-lg flex items-center justify-center">
                                    🎯
                                </div>
                                Rencana Besok (opsional)
                            </label>
                            <textarea wire:model="next_plan" 
                                class="w-full px-4 py-3 backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent shadow-lg resize-none" 
                                rows="3" placeholder="Apa yang akan dikerjakan besok?"></textarea>
                            @error('next_plan') 
                                <div class="mt-2 p-3 bg-red-500/20 border border-red-400/30 rounded-lg">
                                    <span class="text-red-200 text-sm flex items-center gap-2">
                                        <div class="w-4 h-4 bg-red-400 rounded-full flex items-center justify-center text-xs text-white">!</div>
                                        {{ $message }}
                                    </span>
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Evidence File Input -->
                        <div class="md:col-span-1">
                            <label class="block text-sm font-medium text-white mb-2 flex items-center gap-2">
                                <div class="w-5 h-5 bg-gradient-to-br from-pink-400 to-rose-500 rounded-lg flex items-center justify-center">
                                    📎
                                </div>
                                Bukti Kerja (opsional)
                            </label>
                            <input type="file" wire:model="evidence_file" 
                                class="w-full px-4 py-3 backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gradient-to-r file:from-purple-500 file:to-pink-500 file:text-white file:cursor-pointer hover:file:from-purple-600 hover:file:to-pink-600 shadow-lg" />
                            <p class="text-xs text-blue-200 mt-2 flex items-center gap-1">
                                <div class="w-3 h-3 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-full"></div>
                                Format: JPG, JPEG, PNG, PDF, DOC, DOCX. Maksimal 2MB
                            </p>
                            @error('evidence_file') 
                                <div class="mt-2 p-3 bg-red-500/20 border border-red-400/30 rounded-lg">
                                    <span class="text-red-200 text-sm flex items-center gap-2">
                                        <div class="w-4 h-4 bg-red-400 rounded-full flex items-center justify-center text-xs text-white">!</div>
                                        {{ $message }}
                                    </span>
                                </div>
                            @enderror
                            @if($evidence_file)
                                <div class="mt-3 p-3 bg-green-500/20 border border-green-400/30 rounded-lg">
                                    <div class="text-green-200 text-sm flex items-center gap-2">
                                        <div class="w-4 h-4 bg-green-400 rounded-full flex items-center justify-center text-xs text-white">✓</div>
                                        File siap diupload: {{ $evidence_file->getClientOriginalName() }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end pt-4">
                        <button type="submit" 
                            class="px-8 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white font-medium rounded-xl hover:from-purple-600 hover:to-pink-600 focus:outline-none focus:ring-2 focus:ring-purple-400 shadow-lg flex items-center gap-3">
                            <span wire:loading.remove class="flex items-center gap-2">
                                <div class="w-5 h-5 bg-white/20 rounded-lg flex items-center justify-center">💾</div>
                                Simpan Aktivitas
                            </span>
                            <span wire:loading class="flex items-center gap-2">
                                <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white"></div>
                                Menyimpan...
                            </span>
                        </button>
                    </div>
                </form>
                <!-- Alert Messages -->
                @if($errorMsg)
                    <div class="mb-6 p-4 bg-red-500/20 border border-red-400/30 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center text-white font-bold">!</div>
                            <span class="text-red-200 font-medium">{{ $errorMsg }}</span>
                        </div>
                    </div>
                @endif
                
                @if($successMsg)
                    <div class="mb-6 p-4 bg-green-500/20 border border-green-400/30 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center text-white font-bold">✓</div>
                            <span class="text-green-200 font-medium">{{ $successMsg }}</span>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Activities List Container -->
            <div class="glass-container shadow-xl p-8">
                <!-- List Header -->
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h3 class="text-xl font-bold text-white drop-shadow-lg flex items-center gap-3">
                            <div class="w-8 h-8 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-xl flex items-center justify-center shadow-lg">
                                📋
                            </div>
                            Daftar Aktivitas
                        </h3>
                        <p class="text-purple-200 mt-1">{{ $activities->count() }} aktivitas tercatat</p>
                    </div>
                    <a href="{{ route('activities.recap') }}" 
                        class="px-6 py-3 bg-gradient-to-r from-emerald-500 to-teal-500 text-white font-medium rounded-xl hover:from-emerald-600 hover:to-teal-600 focus:outline-none focus:ring-2 focus:ring-emerald-400 shadow-lg flex items-center gap-3">
                        <div class="w-5 h-5 bg-white/20 rounded-lg flex items-center justify-center">📊</div>
                        Lihat Rekapan
                    </a>
                </div>
                
                <!-- Activities List -->
                @if($activities->count() > 0)
                    <div class="space-y-4">
                        @foreach($activities as $activity)
                            <div class="backdrop-blur-sm bg-white/5 border border-white/10 rounded-xl p-6 hover:bg-white/10 shadow-lg">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <!-- Date -->
                                        <div class="flex items-center gap-3 mb-4">
                                            <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center shadow-lg">
                                                📅
                                            </div>
                                            <div>
                                                <span class="font-bold text-blue-200 text-lg">{{ $activity->date->format('d M Y') }}</span>
                                                <span class="text-xs text-purple-300 ml-2 px-2 py-1 bg-white/10 rounded-lg">({{ $activity->date->diffForHumans() }})</span>
                                            </div>
                                        </div>
                                        
                                        <!-- Activity Content -->
                                        <div class="space-y-4">
                                            <div class="p-4 backdrop-blur-sm bg-white/5 border border-white/10 rounded-xl">
                                                <div class="flex items-start gap-3">
                                                    <div class="w-6 h-6 bg-gradient-to-br from-green-400 to-emerald-500 rounded-lg flex items-center justify-center text-xs shadow-lg">📝</div>
                                                    <div class="flex-1">
                                                        <strong class="text-green-200 font-medium">Aktivitas:</strong>
                                                        <p class="mt-2 text-white leading-relaxed">{{ $activity->activity }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @if($activity->next_plan)
                                                <div class="p-4 backdrop-blur-sm bg-white/5 border border-white/10 rounded-xl">
                                                    <div class="flex items-start gap-3">
                                                        <div class="w-6 h-6 bg-gradient-to-br from-orange-400 to-amber-500 rounded-lg flex items-center justify-center text-xs shadow-lg">🎯</div>
                                                        <div class="flex-1">
                                                            <strong class="text-orange-200 font-medium">Rencana Besok:</strong>
                                                            <p class="mt-2 text-white leading-relaxed">{{ $activity->next_plan }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            
                                            @if($activity->evidence_file)
                                                <div class="p-4 backdrop-blur-sm bg-white/5 border border-white/10 rounded-xl">
                                                    <div class="flex items-center gap-3">
                                                        <div class="w-6 h-6 bg-gradient-to-br from-pink-400 to-rose-500 rounded-lg flex items-center justify-center text-xs shadow-lg">📎</div>
                                                        <div class="flex-1">
                                                            <strong class="text-pink-200 font-medium">Bukti Kerja:</strong>
                                                            <a href="{{ $activity->evidence_url }}" target="_blank" 
                                                                class="inline-flex items-center gap-2 mt-2 px-4 py-2 bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-lg hover:from-blue-600 hover:to-cyan-600 shadow-lg">
                                                                <div class="w-4 h-4 bg-white/20 rounded-lg flex items-center justify-center">📎</div>
                                                                {{ $activity->evidence_file }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <!-- Delete Button -->
                                    <button wire:click="deleteActivity({{ $activity->id }})" 
                                            onclick="return confirm('Yakin ingin menghapus aktivitas ini?')"
                                            class="ml-6 px-4 py-2 bg-gradient-to-r from-red-500 to-pink-500 text-white rounded-xl hover:from-red-600 hover:to-pink-600 focus:outline-none focus:ring-2 focus:ring-red-400 shadow-lg flex items-center gap-2">
                                        <div class="w-4 h-4 bg-white/20 rounded-lg flex items-center justify-center">🗑️</div>
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-16">
                        <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-purple-400 to-pink-500 rounded-3xl flex items-center justify-center shadow-lg">
                            <div class="text-4xl">📝</div>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3 drop-shadow-lg">Belum Ada Aktivitas</h3>
                        <p class="text-purple-200 text-lg mb-2">Mulai catat aktivitas harian Anda!</p>
                        <p class="text-purple-300 text-sm">Dokumentasikan setiap progress kerja praktik dengan detail</p>
                        
                        <!-- Decorative Elements -->
                        <div class="flex justify-center gap-4 mt-8">
                            <div class="w-3 h-3 bg-purple-400 rounded-full opacity-60"></div>
                            <div class="w-3 h-3 bg-pink-400 rounded-full opacity-60"></div>
                            <div class="w-3 h-3 bg-indigo-400 rounded-full opacity-60"></div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
