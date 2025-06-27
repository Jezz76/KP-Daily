<?php

namespace App\Exports;

use App\Models\Activity;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Illuminate\Contracts\View\View;

class ActivitiesWithImagesExport implements FromView, WithStyles
{
    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function view(): View
    {
        $activities = Activity::where('user_id', $this->userId)
                             ->orderBy('date', 'asc')
                             ->get();

        return view('exports.activities-with-images', [
            'activities' => $activities
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true, 'size' => 14],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'color' => ['rgb' => '4F81BD']
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER
                ]
            ]
        ];
    }
}
