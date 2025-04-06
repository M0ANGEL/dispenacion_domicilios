<?php

namespace App\Http\Controllers;

use App\Exports\DispensacionesExport;
use App\Models\Dispensacion;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function index(Request $request)
    {
       
        return view('dis.domicilio.exportar.index');
    }

    public function exportar(Request $request)
    {
        $cantidad = min($request->cantidad, 50);
        $tipo = $request->tipo;

        // Obtener registros con estado 2
        $registros = Dispensacion::where('estado', 2)->limit($cantidad)->get();

        // Cambiar estado a 3 después de obtenerlos
        $ids = $registros->pluck('id');
        Dispensacion::whereIn('id', $ids)->update([
            'estado' => 3,
            'fecha_domicilio' => now(),
            'usuario_baja_reporte_id' => auth()->user()->id,

        ]);

        if ($tipo === 'excel') {
            return Excel::download(new DispensacionesExport($registros), 'dispensaciones.xlsx');
        } elseif ($tipo === 'txt') {
            $contenido = '';
            foreach ($registros as $r) {
                $contenido .= "{$r->id};{$r->paciente_id};{$r->valor};{$r->producto};{$r->estado}\n";
            }

            $filename = 'dispensaciones.txt';
            return response($contenido)
                ->header('Content-Type', 'text/plain')
                ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
        }

        return back()->with('error', 'Tipo de exportación no válida.');
    }
}
