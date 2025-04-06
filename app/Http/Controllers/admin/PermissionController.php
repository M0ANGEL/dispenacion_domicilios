<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission as ModelsPermission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = ModelsPermission::paginate(12);
        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:permissions,name']
        ]);

        $permissions = ModelsPermission::create($request->all());

        session()->flash('swal', [
            'icon' => 'succes',
            'title' => 'Bien hecho',
            'text' => 'El permiso se creo correctamente',
        ]);

        return redirect()->route('permissions.create', $permissions);
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
    public function edit(ModelsPermission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsPermission $permission)
    {
        $request->validate([
            'name' => ['required', 'unique:permissions,name,' . $permission->id]
        ]);

        $permission->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El permiso se creo correctamente',
        ]);

        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelsPermission $permission)
    {
        $permission->delete();


        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El permiso se elimino correctamente',
        ]);

        return redirect()->route('permissions.index');
    }
}