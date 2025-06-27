<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\KpPeriod;
use Carbon\Carbon;

class KpPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil user pertama (jika ada)
        $user = User::first();
        
        if ($user) {
            // Buat periode KP contoh
            KpPeriod::create([
                'user_id' => $user->id,
                'start_date' => Carbon::now()->startOfMonth(),
                'end_date' => Carbon::now()->addMonths(2)->endOfMonth(),
                'company_name' => 'PT. Teknologi Inovatif Indonesia',
                'supervisor_name' => 'Dr. Ahmad Susanto, S.T., M.T.',
                'description' => 'Kerja praktik bidang pengembangan aplikasi web dengan fokus pada teknologi Laravel dan Vue.js. Mengembangkan sistem manajemen aktivitas harian untuk mahasiswa KP.',
                'is_active' => true
            ]);
        }
    }
}
