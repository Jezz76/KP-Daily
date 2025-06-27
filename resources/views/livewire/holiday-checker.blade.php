<div class="p-6 backdrop-blur-sm bg-gradient-to-r from-purple-500/80 to-pink-400/80 border border-white/20 text-white rounded-xl shadow-lg">
    <div class="flex items-center gap-3">
        <div class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </div>
        <span class="font-bold text-lg drop-shadow-lg">Status Hari Ini: {{ $this->getTodayStatus() }}</span>
    </div>
    @if($this->getTodayStatus() !== 'Hari Kerja')
        <div class="mt-3 p-3 bg-white/10 rounded-xl border border-white/20">
            <div class="text-sm text-white/90 flex items-center gap-2">
                <div class="w-5 h-5 bg-yellow-400 rounded-lg flex items-center justify-center text-xs">😊</div>
                Tidak wajib mengisi aktivitas hari ini
            </div>
        </div>
    @endif
</div>
