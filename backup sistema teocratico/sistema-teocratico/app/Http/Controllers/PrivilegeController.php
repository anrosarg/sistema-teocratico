<?php

namespace App\Http\Controllers;

use App\Models\Privilege;
use Illuminate\Http\Request;

class PrivilegeController extends Controller
{
    /**
     * Constructor para aplicar middleware.
     */
   

    /**
     * Muestra una lista de privilegios.
     */
    public function index()
    {
        $privileges = Privilege::orderBy('name')->get();
        return view('privileges.index', compact('privileges'));
    }

    /**
     * Muestra el formulario para crear un nuevo privilegio.
     */
    public function create()
    {
        return view('privileges.create');
    }

    /**
     * Guarda un nuevo privilegio en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Privilege::create($request->only('name'));

        return redirect()->route('privileges.index')
                         ->with('success', 'Privilegio creado con éxito.');
    }

    /**
     * Muestra el formulario para editar un privilegio.
     */
    public function edit(Privilege $privilege)
    {
        return view('privileges.edit', compact('privilege'));
    }

    /**
     * Actualiza un privilegio existente en la base de datos.
     */
    public function update(Request $request, Privilege $privilege)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $privilege->update($request->only('name'));

        return redirect()->route('privileges.index')
                         ->with('success', 'Privilegio actualizado con éxito.');
    }

    /**
     * Elimina un privilegio de la base de datos.
     */
    public function destroy(Privilege $privilege)
    {
        $privilege->delete();

        return redirect()->route('privileges.index')
                         ->with('success', 'Privilegio eliminado con éxito.');
    }
}