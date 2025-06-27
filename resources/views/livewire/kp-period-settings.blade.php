<div class="space-y-6">
    <!-- Success Message -->
    @if (session()->has('success'))
        <div class="backdrop-blur-sm bg-green-500/20 border border-green-400/30 rounded-xl p-4 shadow-xl">
            <div class="flex items-center gap-3">
                <div class="w-6 h-6 bg-green-500 rounded-lg flex items-center justify-center text-white text-sm font-bold shadow-lg">✓</div>
                <span class="text-green-200 font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- Settings Form Card -->
    <div class="backdrop-blur-sm bg-white/5 border border-white/10 rounded-xl p-6 shadow-xl">
        <form wire:submit.prevent="save" class="space-y-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Start Date -->
                <div class="space-y-3">
                    <label class="block text-sm font-semibold text-white flex items-center gap-3">
                        <div class="w-6 h-6 bg-gradient-to-br from-green-400 to-emerald-500 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        Tanggal Mulai KP
                    </label>
                    <input type="date" wire:model="start_date" 
                        class="w-full px-4 py-3 backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-purple-400/50 focus:border-transparent transition-all duration-150 shadow-lg" />
                    @error('start_date') 
                        <div class="mt-2 p-3 bg-red-500/20 border border-red-400/30 rounded-lg">
                            <span class="text-red-200 text-sm flex items-center gap-2">
                                <div class="w-4 h-4 bg-red-400 rounded-full flex items-center justify-center text-xs">!</div>
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>

                <!-- End Date -->
                <div class="space-y-3">
                    <label class="block text-sm font-semibold text-white flex items-center gap-3">
                        <div class="w-6 h-6 bg-gradient-to-br from-red-400 to-pink-500 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4" />
                            </svg>
                        </div>
                        Tanggal Selesai KP
                    </label>
                    <input type="date" wire:model="end_date" 
                        class="w-full px-4 py-3 backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-purple-400/50 focus:border-transparent transition-all duration-150 shadow-lg" />
                    @error('end_date') 
                        <div class="mt-2 p-3 bg-red-500/20 border border-red-400/30 rounded-lg">
                            <span class="text-red-200 text-sm flex items-center gap-2">
                                <div class="w-4 h-4 bg-red-400 rounded-full flex items-center justify-center text-xs">!</div>
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center pt-4">
                <button type="submit" 
                    class="px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-semibold rounded-xl hover:from-indigo-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-400/50 transition-all duration-150 shadow-xl flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                    </svg>
                    Simpan Periode KP
                </button>
            </div>
        </form>
    </div>

    <!-- Current Period Display Card -->
    <div class="backdrop-blur-sm bg-white/5 border border-white/10 rounded-xl p-6 shadow-xl">
        <div class="flex items-center gap-4">
            <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="flex-1">
                <h4 class="text-lg font-semibold text-white drop-shadow-lg mb-1">Periode Aktif Saat Ini</h4>
                <p class="text-blue-200 font-medium">
                    {{ $start_date ? \Carbon\Carbon::parse($start_date)->format('d M Y') : 'Belum diatur' }} 
                    s/d 
                    {{ $end_date ? \Carbon\Carbon::parse($end_date)->format('d M Y') : 'Belum diatur' }}
                </p>
                @if($start_date && $end_date)
                    <p class="text-purple-300/90 text-sm mt-1">
                        Total durasi: {{ \Carbon\Carbon::parse($start_date)->diffInDays(\Carbon\Carbon::parse($end_date)) + 1 }} hari
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
