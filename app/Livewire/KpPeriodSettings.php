<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\KpPeriod;
use Illuminate\Support\Facades\Auth;

class KpPeriodSettings extends Component
{
    public $start_date;
    public $end_date;
    public $company_name;
    public $supervisor_name;
    public $description;

    public function mount()
    {
        // Ambil periode KP aktif untuk user saat ini
        $kpPeriod = Auth::user()->currentKpPeriod();
        
        if ($kpPeriod) {
            $this->start_date = $kpPeriod->start_date->format('Y-m-d');
            $this->end_date = $kpPeriod->end_date->format('Y-m-d');
            $this->company_name = $kpPeriod->company_name;
            $this->supervisor_name = $kpPeriod->supervisor_name;
            $this->description = $kpPeriod->description;
        } else {
            $this->start_date = now()->toDateString();
            $this->end_date = now()->addMonth()->toDateString();
        }
    }

    public function save()
    {
        $this->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'company_name' => 'required|string|max:255',
            'supervisor_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        // Nonaktifkan periode KP lama jika ada
        Auth::user()->kpPeriods()->update(['is_active' => false]);

        // Buat periode KP baru
        KpPeriod::create([
            'user_id' => Auth::id(),
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'company_name' => $this->company_name,
            'supervisor_name' => $this->supervisor_name,
            'description' => $this->description,
            'is_active' => true
        ]);

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
