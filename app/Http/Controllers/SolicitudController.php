<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->get('text', '');
        $users = Solicitud::orderBy('id', 'desc')
            ->where('nombre1', 'like', '%' . $busqueda . '%')
            ->orWhere('documento', 'like', '%' . $busqueda . '%')
            ->orWhere('apellido1', 'like', '%' . $busqueda . '%')
            ->paginate(6);

        return view('dis.paciente.index', compact('users', 'busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dis.paciente.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'nombre1' => 'string',
            'nombre2' => 'string',
            'apellido1' => 'string',
            'apellido2' => 'string',
            'tipo_doc' => 'string',
            'documento' => 'string',
            'telfono' => 'string',
            'observacion' => 'string',
        ]);

        // Verificar si el documento ya existe
        $existingPatient = Solicitud::where('documento', $request->documento)->first();
        if ($existingPatient) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Error',
                'text' => 'Este documento ya está registrado.',
            ]);
            return back()->withInput();
        }

        // Crear el registro si no existe
        $huv = Solicitud::create([
            'nombre1' => $request->nombre1,
            'nombre2' => $request->nombre2,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'tipo_doc' => $request->tipo_doc,
            'documento' => $request->documento,
            'telfono' => $request->telfono,
            'observacion' => $request->observacion,
            // 'user_id' => Auth::id(),
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El paciente se creó correctamente',
        ]);

        return view('dis.paciente.create');
    }
}
