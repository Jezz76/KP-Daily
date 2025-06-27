<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Activity;
use App\Models\KpPeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ActivityLog extends Component
{
    use WithFileUploads;
    
    public $date;
    public $activity;
    public $next_plan;
    public $evidence_file;
    public $start_date;
    public $end_date;
    public $errorMsg = null;
    public $successMsg = null;

    public function mount()
    {
        // Cek apakah periode KP sudah diatur untuk user ini
        $kpPeriod = Auth::user()->currentKpPeriod();
        
        if (!$kpPeriod) {
            return redirect()->route('kp.settings');
        }
        
        $this->start_date = $kpPeriod->start_date->format('Y-m-d');
        $this->end_date = $kpPeriod->end_date->format('Y-m-d');
    }

    public function addActivity()
    {
        $this->errorMsg = null;
        $this->successMsg = null;
        
        // Validasi basic input terlebih dahulu (tanpa file)
        $this->validate([
            'date' => 'required|date',
            'activity' => 'required|string|min:10',
            'next_plan' => 'nullable|string'
        ]);
        
        // Validasi tanggal harus dalam periode KP
        if ($this->date < $this->start_date || $this->date > $this->end_date) {
            $this->errorMsg = 'Tanggal di luar periode KP (' . date('d M Y', strtotime($this->start_date)) . ' - ' . date('d M Y', strtotime($this->end_date)) . ')!';
            return;
        }
        
        // Validasi tidak boleh double entry
        $existingActivity = Activity::where('user_id', Auth::id())
                                   ->where('date', $this->date)
                                   ->first();
        
        if ($existingActivity) {
            $this->errorMsg = 'Aktivitas untuk tanggal ini sudah ada!';
            return;
        }
        
        // Validasi file hanya jika ada file yang diupload
        if ($this->evidence_file) {
            $this->validate([
                'evidence_file' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048'
            ]);
        }
        
        // Upload file jika ada
        $fileName = null;
        if ($this->evidence_file) {
            $fileName = time() . '_' . $this->evidence_file->getClientOriginalName();
            $this->evidence_file->storeAs('bukti-kerja', $fileName, 'public');
        }
        
        // Simpan ke database
        Activity::create([
            'user_id' => Auth::id(),
            'date' => $this->date,
            'activity' => $this->activity,
            'next_plan' => $this->next_plan,
            'evidence_file' => $fileName
        ]);
        
        $this->successMsg = 'Aktivitas berhasil disimpan!';
        $this->reset(['date', 'activity', 'next_plan', 'evidence_file']);
    }

    public function deleteActivity($id)
    {
        $activity = Activity::where('user_id', Auth::id())->findOrFail($id);
        
        // Hapus file bukti jika ada
        if ($activity->evidence_file) {
            Storage::disk('public')->delete('bukti-kerja/' . $activity->evidence_file);
        }
        
        $activity->delete();
        $this->successMsg = 'Aktivitas berhasil dihapus!';
    }

    public function messages()
    {
        return [
            'date.required' => 'Tanggal harus diisi.',
            'date.date' => 'Format tanggal tidak valid.',
            'activity.required' => 'Aktivitas harus diisi.',
            'activity.min' => 'Aktivitas minimal 10 karakter.',
            'evidence_file.file' => 'File bukti kerja tidak valid.',
            'evidence_file.mimes' => 'File bukti kerja harus berformat: jpg, jpeg, png, pdf, doc, atau docx.',
            'evidence_file.max' => 'Ukuran file bukti kerja maksimal 2MB (2048KB).'
        ];
    }

    public function render()
    {
        $activities = Activity::where('user_id', Auth::id())
                             ->orderBy('date', 'desc')
                             ->get();
                             
        return view('livewire.activity-log', compact('activities'))
            ->layout('layouts.app');
    }
}
