<?php

namespace App\Exports;

use App\Models\Activity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Illuminate\Support\Facades\Storage;

class ActivitiesExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithTitle
{
    protected $userId;
    protected $activities;

    public function __construct($userId)
    {
        $this->userId = $userId;
        $this->activities = Activity::where('user_id', $this->userId)
                                   ->orderBy('date', 'asc')
                                   ->get();
    }

    public function collection()
    {
        return $this->activities;
    }

    public function headings(): array
    {
        return [
            'No',
            'Tanggal',
            'Aktivitas',
            'Rencana Besok', 
            'Status Bukti Kerja',
            'Link Bukti Kerja'
        ];
    }

    public function map($activity): array
    {
        static $index = 0;
        $index++;

        $evidenceStatus = 'Tidak ada';
        $evidenceLink = '-';
        
        if ($activity->evidence_file) {
            $evidenceStatus = 'Ada bukti kerja';
            $evidenceLink = Storage::disk('public')->url('bukti-kerja/' . $activity->evidence_file);
        }

        return [
            $index,
            $activity->date->format('d/m/Y'),
            $activity->activity,
            $activity->next_plan ?? '-',
            $evidenceStatus,
            $evidenceLink
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $rowCount = $this->activities->count() + 1; // +1 untuk header
        
        return [
            // Header style
            1 => [
                'font' => ['bold' => true, 'size' => 12],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'color' => ['rgb' => '4F81BD']
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000']
                    ]
                ]
            ],
            
            // Data rows style
            "2:$rowCount" => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000']
                    ]
                ],
                'alignment' => [
                    'vertical' => Alignment::VERTICAL_TOP,
                    'wrapText' => true
                ]
            ],
            
            // Column specific styles
            'A:A' => ['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]], // No
            'B:B' => ['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]], // Tanggal
            'C:C' => ['alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT]],   // Aktivitas
            'D:D' => ['alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT]],   // Rencana
            'E:E' => ['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]], // Status
            'F:F' => ['alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT]]    // Link
        ];
    }
    
    public function columnWidths(): array
    {
        return [
            'A' => 5,   // No
            'B' => 12,  // Tanggal  
            'C' => 40,  // Aktivitas
            'D' => 30,  // Rencana Besok
            'E' => 15,  // Status Bukti
            'F' => 50,  // Link Bukti
        ];
    }

    public function title(): string
    {
        return 'Rekap Aktivitas KP';
    }
}
