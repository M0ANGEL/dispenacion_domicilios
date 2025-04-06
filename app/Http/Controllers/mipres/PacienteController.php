<?php

namespace App\Http\Controllers\mipres;

use App\Http\Controllers\Controller;
use App\Models\mipres\Mipres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $busqueda = $request->get('text', '');
        $users = Mipres::orderBy('id', 'desc')
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
            'direcciones' => 'string',
        ]);

        // Verificar si el documento ya existe
        $existingPatient = Mipres::where('documento', $request->documento)->first();
        if ($existingPatient) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Error',
                'text' => 'Este documento ya está registrado.',
            ]);
            return back()->withInput();
        }

        // Crear el registro si no existe
        $huv = Mipres::create([
            'nombre1' => $request->nombre1,
            'nombre2' => $request->nombre2,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'tipo_doc' => $request->tipo_doc,
            'documento' => $request->documento,
            'telfono' => $request->telfono,
            'observacion' => $request->observacion,
            'direcciones' => $request->direcciones,
            // 'user_id' => Auth::id(),
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El paciente se creó correctamente',
        ]);

        return view('dis.paciente.create');
    }

    public function edit(Mipres $paciente)
    {
        return view('dis.paciente.edit', compact('paciente'));
    }

    public function update(Request $request, Mipres $paciente)
    {
        // Verificar si el documento ya existe en otro paciente
        $existingPatient = Mipres::where('documento', $request->documento)
            ->where('id', '!=', $paciente->id) // Asegura que no sea el mismo paciente
            ->first();

        if ($existingPatient) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Error',
                'text' => 'Este documento ya está registrado en otro paciente.',
            ]);
            return back()->withInput();
        }

        // Actualizar el registro si no hay duplicados
        $paciente->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El usuario se actualizó correctamente',
        ]);

        return redirect()->route('pacientes.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Mipres $Mipre) {}
}
