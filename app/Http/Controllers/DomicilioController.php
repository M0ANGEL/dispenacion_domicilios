<?php

namespace App\Http\Controllers;

use App\Exports\DispensacionesExport;
use App\Models\Dispensacion;
use App\Models\Domicilio;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DomicilioController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->get('text', '');

        $users = Solicitud::with('paciente')
            ->whereHas('paciente', function ($query) use ($busqueda) {
                $query->where('documento', 'like', '%' . $busqueda . '%');
            })
            ->orderBy('id', 'desc')
            ->where('estado', 2)
            ->paginate(6);

        return view('dis.domicilio.index', compact('users', 'busqueda'));
    }


    // public function update(Request $request, Dispensacion $dispensacion)
    // {
    //     $dispensacion->update([
    //         'usuario_dispensacion_id' => Auth::id(),
    //         'cantida_formula' => $request->cantida_formula,
    //         'valor' => $request->valor,
    //         'producto' => $request->producto,
    //         'estado' => 2,
    //         'observacion_dispensacion' => $request->observacion_dispensacion,
    //         'fecha_dispensacion' => now(),
    //     ]);

    //     session()->flash('swal', [
    //         'icon' => 'success',
    //         'title' => 'Bien hecho',
    //         'text' => 'Dispensacion confirmada correctamente',
    //     ]);

    //     return redirect()->route('domicilios.index');
    // }
  
}
