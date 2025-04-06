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
            ->get(['id', 'nombre1', 'apellido1', 'producto', 'cantida_formula', 'valor']);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Apellido',
            'Producto',
            'Cantidad',
            'Valor',
        ];
    }
}

