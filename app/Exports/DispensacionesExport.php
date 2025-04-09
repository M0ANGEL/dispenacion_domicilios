<?php

namespace App\Exports;

use App\Models\Dispensacion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DispensacionesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Dispensacion::where('estado', 2)
            ->take(50)
            ->get(['id', 'valor']);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Valor',
        ];
    }
}

