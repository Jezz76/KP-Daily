<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    /**
     * Relasi ke periode KP
     */
    public function kpPeriods()
    {
        return $this->hasMany(KpPeriod::class);
    }

    /**
     * Mendapatkan periode KP yang aktif
     */
    public function activeKpPeriod()
    {
        return $this->hasOne(KpPeriod::class)->where('is_active', true);
    }

    /**
     * Mendapatkan periode KP yang sedang berlangsung
     */
    public function currentKpPeriod()
    {
        return $this->kpPeriods()->where('is_active', true)->first();
    }
}
