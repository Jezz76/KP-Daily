<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class HolidayChecker extends Component
{
    public function isWorkingDay($date)
    {
        $carbon = Carbon::parse($date);
        
        // Cek weekend (Sabtu = 6, Minggu = 0)
        if ($carbon->dayOfWeek == 0 || $carbon->dayOfWeek == 6) {
            return false;
        }
        
        // Cek hari libur nasional via API
        try {
            $response = Http::timeout(5)->get('https://api-harilibur.vercel.app/api', [
                'year' => $carbon->year
            ]);
            
            if ($response->ok()) {
                $holidays = collect($response->json());
                $dateString = $carbon->format('Y-m-d');
                
                foreach ($holidays as $holiday) {
                    if ($holiday['holiday_date'] == $dateString) {
                        return false; // Hari libur nasional
                    }
                }
            }
        } catch (\Exception $e) {
            // Jika API gagal, tetap lanjut (anggap hari kerja)
        }
        
        return true; // Hari kerja
    }

    public function getTodayStatus()
    {
        $today = Carbon::today();
        $isWorking = $this->isWorkingDay($today);
        
        if (!$isWorking) {
            if ($today->dayOfWeek == 0) return 'Hari Minggu';
            if ($today->dayOfWeek == 6) return 'Hari Sabtu';
            return 'Hari Libur Nasional';
        }
        
        return 'Hari Kerja';
    }

    public function render()
    {
        return view('livewire.holiday-checker');
    }
}
