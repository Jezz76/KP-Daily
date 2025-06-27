<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ActivitiesExport;

class ActivitiesRecap extends Component
{
    public $activities;
    public $editingId = null;
    public $editActivity = '';
    public $editNextPlan = '';
    public $successMsg = null;

    public function mount()
    {
        $this->loadActivities();
    }

    public function loadActivities()
    {
        $this->activities = Activity::where('user_id', Auth::id())
                                   ->orderBy('date', 'desc')
                                   ->get();
    }

    public function editActivity($id)
    {
        $activity = $this->activities->find($id);
        $this->editingId = $id;
        $this->editActivity = $activity->activity;
        $this->editNextPlan = $activity->next_plan;
    }

    public function updateActivity()
    {
        $this->validate([
            'editActivity' => 'required|string|min:10',
            'editNextPlan' => 'nullable|string'
        ]);

        $activity = Activity::where('user_id', Auth::id())->findOrFail($this->editingId);
        $activity->update([
            'activity' => $this->editActivity,
            'next_plan' => $this->editNextPlan
        ]);

        $this->successMsg = 'Aktivitas berhasil diperbarui!';
        $this->cancelEdit();
        $this->loadActivities();
    }

    public function cancelEdit()
    {
        $this->editingId = null;
        $this->editActivity = '';
        $this->editNextPlan = '';
    }

    public function deleteActivity($id)
    {
        $activity = Activity::where('user_id', Auth::id())->findOrFail($id);
        
        if ($activity->evidence_file) {
            \Storage::disk('public')->delete('bukti-kerja/' . $activity->evidence_file);
        }
        
        $activity->delete();
        $this->successMsg = 'Aktivitas berhasil dihapus!';
        $this->loadActivities();
    }

    public function exportToExcel()
    {
        return Excel::download(new ActivitiesExport(Auth::id()), 'rekap-aktivitas-kp.xlsx');
    }

    public function exportToExcelWithImages()
    {
        return Excel::download(new \App\Exports\ActivitiesWithImagesExport(Auth::id()), 'rekap-aktivitas-kp-dengan-gambar.xlsx');
    }

    public function render()
    {
        return view('livewire.activities-recap')
            ->layout('layouts.app');
    }
}
