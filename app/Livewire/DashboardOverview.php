<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use Carbon\Carbon;

class DashboardOverview extends Component
{
    public $start_date;
    public $end_date;
    public $total_days;
    public $days_passed;
    public $days_remaining;
    public $progress_percentage;
    public $activities;
    public $total_activities;
    public $last_activity_date;
    public $today_filled;

    public function mount()
    {
        $this->start_date = Cache::get('kp_start_date');
        $this->end_date = Cache::get('kp_end_date');
        
        if ($this->start_date && $this->end_date) {
            $start = Carbon::parse($this->start_date);
            $end = Carbon::parse($this->end_date);
            $today = Carbon::today();
            
            $this->total_days = $start->diffInDays($end) + 1;
            $this->days_passed = max(0, $start->diffInDays($today));
            $this->days_remaining = max(0, $today->diffInDays($end));
            $this->progress_percentage = $this->total_days > 0 ? min(100, round(($this->days_passed / $this->total_days) * 100)) : 0;
        }
        
        // Load real activities from database
        $activities = Activity::where('user_id', Auth::id())
                             ->orderBy('date', 'desc')
                             ->take(3)
                             ->get();
        
        $this->activities = $activities->toArray();
        $this->total_activities = Activity::where('user_id', Auth::id())->count();
        $this->last_activity_date = $activities->first()->date ?? null;
        $this->today_filled = Activity::where('user_id', Auth::id())
                                     ->where('date', Carbon::today()->toDateString())
                                     ->exists();
    }

    public function render()
    {
        return view('livewire.dashboard-overview');
    }
}
