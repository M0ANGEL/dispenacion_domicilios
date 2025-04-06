<?php

namespace App\Http\Controllers\mipres;

use App\Http\Controllers\Controller;
use App\Models\mipres\Medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mypres.medicamento.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo_huv' => 'nullable',
            'codigo_sebthi' => 'nullable',
            'descripcion' => 'required',
        ]);

        // Crear el registro si no existe
        $huv = Medicamento::create([
            'codigo_huv' => $request->codigo_huv,
            'codigo_sebthi' => $request->codigo_sebthi,
            'descripcion' => $request->descripcion,
            'user_id' => Auth::id(),
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El medicamento se creó correctamente',
        ]);

        return redirect()->route('medicamentos_mipres.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
