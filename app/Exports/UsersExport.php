<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    public function collection()
    {
        return User::select('name', 'email', 'no_telp', 'role')->get();
    }

    public function headings(): array
    {
        return ['Nama', 'Email', 'No HP', 'Role'];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [ // Baris heading
                'font' => ['bold' => true],
                'alignment' => ['horizontal' => 'center'],
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => ['argb' => 'FFEEEEEE'],
                ],
            ],
        ];
    }
}
