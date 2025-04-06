<?php

namespace App\Http\Controllers;

use App\Models\mipres\Mipres;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SolicitudController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->get('text', '');
    
        $users = Solicitud::with('paciente')
            ->whereHas('paciente', function ($query) use ($busqueda) {
                $query->where('documento', 'like', '%' . $busqueda . '%');
            })
            ->orderBy('id', 'desc')
            ->where('estado',1)
            ->paginate(6);
    
        return view('dis.solicitud.index', compact('users', 'busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dis.solicitud.create');
    }

    public function buscar($cedula)
    {

        $paciente = Mipres::where('documento', $cedula)->first();

        if ($paciente) {
            return response()->json([
                'success' => true,
                'paciente' => $paciente
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'string',
            'observacion_solicitud' => 'string',
            'fecha_solicitud' => 'string',
        ]);

        // Crear el registro si no existe
        Solicitud::create([
            'paciente_id' => $request->paciente_id,
            'observacion_solicitud' => $request->observacion_solicitud,
            'fecha_solicitud' => $request->fecha_solicitud,
            'usuario_solicitud_id' => Auth::id(),
            'fecha_solicitud' => now()
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'La solicitu se creó correctamente',
        ]);

        return redirect()->route('solicitud.create');
    }
}
