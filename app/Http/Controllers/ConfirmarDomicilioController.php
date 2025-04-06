<?php

namespace App\Http\Controllers;

use App\Models\Dispensacion;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmarDomicilioController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->get('text', '');
    
        $users = Solicitud::with('paciente')
            ->whereHas('paciente', function ($query) use ($busqueda) {
                $query->where('documento', 'like', '%' . $busqueda . '%');
            })
            ->orderBy('id', 'desc')
            ->where('estado',3)
            ->paginate(6);
    
        return view('dis.domicilio.confirmarEntrega.index', compact('users', 'busqueda'));
    }

    public function edit(Dispensacion $confirmacion)
    {
        $confirmacion = Dispensacion::where('id', $confirmacion->id)->first();

        return view('dis.domicilio.confirmarEntrega.edit', compact('confirmacion'));
        
    }

    public function update(Request $request, Dispensacion $confirmacion)
    {
        $confirmacion->update([
            'usuario_confirma_domicilio_id' => Auth::id(),
            'fecha_entrega' => now(),
            'fecha_donfirmacion_entrega' => $request->fecha_donfirmacion_entrega,
            'observacion_entrega_domicilio' => $request->observacion_entrega_domicilio,
            'producto' => $request->producto,
            'estado' => 4,
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'Entrega confirmada correctamente',
        ]);

        return redirect()->route('confirmacion.index');

    }

}
