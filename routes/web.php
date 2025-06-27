<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
    Route::get('/kp-settings', App\Livewire\KpPeriodSettings::class)->name('kp.settings');
    Route::get('/activity-log', App\Livewire\ActivityLog::class)->name('activity.log');
    Route::get('/activities-recap', App\Livewire\ActivitiesRecap::class)->name('activities.recap');
});

Route::post('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

require __DIR__.'/auth.php';
