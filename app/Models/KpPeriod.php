<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class KpPeriod extends Model
{
    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'company_name',
        'supervisor_name',
        'description',
        'is_active'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_active' => 'boolean'
    ];

    /**
     * Relasi ke user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope untuk mendapatkan periode aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk mendapatkan periode berdasarkan user
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Cek apakah periode sedang berlangsung
     */
    public function getIsCurrentAttribute(): bool
    {
        $now = Carbon::now();
        $startDate = Carbon::parse($this->start_date);
        $endDate = Carbon::parse($this->end_date);
        return $now->between($startDate, $endDate);
    }

    /**
     * Hitung durasi KP dalam hari
     */
    public function getDurationInDaysAttribute(): int
    {
        return Carbon::parse($this->start_date)->diffInDays(Carbon::parse($this->end_date)) + 1;
    }

    /**
     * Hitung progress KP dalam persen
     */
    public function getProgressPercentageAttribute(): float
    {
        $now = Carbon::now();
        $startDate = Carbon::parse($this->start_date);
        $endDate = Carbon::parse($this->end_date);
        
        if ($now->lt($startDate)) {
            return 0;
        }
        
        if ($now->gt($endDate)) {
            return 100;
        }
        
        $totalDays = $this->duration_in_days;
        $passedDays = $startDate->diffInDays($now) + 1;
        
        return round(($passedDays / $totalDays) * 100, 2);
    }

    /**
     * Hitung sisa hari KP
     */
    public function getRemainingDaysAttribute(): int
    {
        $now = Carbon::now();
        $startDate = Carbon::parse($this->start_date);
        $endDate = Carbon::parse($this->end_date);
        
        if ($now->gt($endDate)) {
            return 0;
        }
        
        if ($now->lt($startDate)) {
            return $this->duration_in_days;
        }
        
        return $now->diffInDays($endDate);
    }

    /**
     * Format tanggal untuk display
     */
    public function getFormattedDateRangeAttribute(): string
    {
        $startDate = Carbon::parse($this->start_date);
        $endDate = Carbon::parse($this->end_date);
        return $startDate->format('d M Y') . ' - ' . $endDate->format('d M Y');
    }
}
