<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class KpPeriodSettings extends Component
{
    public $start_date;
    public $end_date;

    public function mount()
    {
        $this->start_date = Cache::get('kp_start_date', now()->toDateString());
        $this->end_date = Cache::get('kp_end_date', now()->addMonth()->toDateString());
    }

    public function save()
    {
        $this->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        Cache::put('kp_start_date', $this->start_date);
        Cache::put('kp_end_date', $this->end_date);
        session()->flash('success', 'Periode KP berhasil disimpan!');
        
        // Redirect ke halaman aktivitas setelah simpan periode
        return redirect()->route('activity.log');
    }

    public function render()
    {
        return view('livewire.kp-period-settings')
            ->layout('layouts.app');
    }
}
