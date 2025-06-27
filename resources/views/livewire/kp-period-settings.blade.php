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

            <!-- Company Name -->
            <div class="space-y-3">
                <label class="block text-sm font-semibold text-white flex items-center gap-3">
                    <div class="w-6 h-6 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    Nama Perusahaan/Instansi
                </label>
                <input type="text" wire:model="company_name" placeholder="Masukkan nama perusahaan/instansi"
                    class="w-full px-4 py-3 backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-purple-400/50 focus:border-transparent transition-all duration-150 shadow-lg" />
                @error('company_name') 
                    <div class="mt-2 p-3 bg-red-500/20 border border-red-400/30 rounded-lg">
                        <span class="text-red-200 text-sm flex items-center gap-2">
                            <div class="w-4 h-4 bg-red-400 rounded-full flex items-center justify-center text-xs">!</div>
                            {{ $message }}
                        </span>
                    </div>
                @enderror
            </div>

            <!-- Supervisor Name -->
            <div class="space-y-3">
                <label class="block text-sm font-semibold text-white flex items-center gap-3">
                    <div class="w-6 h-6 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    Nama Pembimbing
                </label>
                <input type="text" wire:model="supervisor_name" placeholder="Masukkan nama pembimbing"
                    class="w-full px-4 py-3 backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-purple-400/50 focus:border-transparent transition-all duration-150 shadow-lg" />
                @error('supervisor_name') 
                    <div class="mt-2 p-3 bg-red-500/20 border border-red-400/30 rounded-lg">
                        <span class="text-red-200 text-sm flex items-center gap-2">
                            <div class="w-4 h-4 bg-red-400 rounded-full flex items-center justify-center text-xs">!</div>
                            {{ $message }}
                        </span>
                    </div>
                @enderror
            </div>

            <!-- Description -->
            <div class="space-y-3">
                <label class="block text-sm font-semibold text-white flex items-center gap-3">
                    <div class="w-6 h-6 bg-gradient-to-br from-purple-400 to-pink-500 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    Deskripsi KP <span class="text-white/60">(Opsional)</span>
                </label>
                <textarea wire:model="description" rows="3" placeholder="Deskripsi singkat tentang kegiatan KP"
                    class="w-full px-4 py-3 backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-purple-400/50 focus:border-transparent transition-all duration-150 shadow-lg resize-none"></textarea>
                @error('description') 
                    <div class="mt-2 p-3 bg-red-500/20 border border-red-400/30 rounded-lg">
                        <span class="text-red-200 text-sm flex items-center gap-2">
                            <div class="w-4 h-4 bg-red-400 rounded-full flex items-center justify-center text-xs">!</div>
                            {{ $message }}
                        </span>
                    </div>
                @enderror
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
        <div class="flex items-center gap-4 mb-4">
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

        @if($company_name || $supervisor_name || $description)
            <div class="border-t border-white/10 pt-4 space-y-3">
                @if($company_name)
                    <div class="flex items-center gap-3">
                        <div class="w-6 h-6 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-white/80 text-sm">Perusahaan/Instansi</p>
                            <p class="text-white font-medium">{{ $company_name }}</p>
                        </div>
                    </div>
                @endif

                @if($supervisor_name)
                    <div class="flex items-center gap-3">
                        <div class="w-6 h-6 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-white/80 text-sm">Pembimbing</p>
                            <p class="text-white font-medium">{{ $supervisor_name }}</p>
                        </div>
                    </div>
                @endif

                @if($description)
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 bg-purple-500/20 rounded-lg flex items-center justify-center mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-white/80 text-sm">Deskripsi</p>
                            <p class="text-white font-medium">{{ $description }}</p>
                        </div>
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>
