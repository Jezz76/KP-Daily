<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activity extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'activity',
        'next_plan',
        'evidence_file'
    ];

    protected $casts = [
        'date' => 'date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getEvidenceUrlAttribute(): ?string
    {
        if ($this->evidence_file) {
            return asset('storage/bukti-kerja/' . $this->evidence_file);
        }
        return null;
    }
}
