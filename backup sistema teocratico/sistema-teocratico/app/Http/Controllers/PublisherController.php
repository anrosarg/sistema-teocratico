<?php

namespace App\Http\Controllers;
use App\Models\Publisher;

use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
       return view('dashboard');
    }

    public function show($id)
{
    $publisher = \App\Models\Publisher::with([
        'group',
        'circuit',
        'congregation',
        'privileges',
        'assignments'
    ])->findOrFail($id);

    return view('publishers.show', compact('publisher'));
}


    public function create()
{
    $grupos = \App\Models\Group::all();
    $circuitos = \App\Models\Circuit::all();
    $congregaciones = \App\Models\Congregation::all();
    $estados = ['bautizado', 'no bautizado'];
    $condiciones = ['ejemplar', 'no ejemplar'];
    $privilegios = \App\Models\Privilege::all();
    $asignaciones = \App\Models\Assignment::all();

    return view('publishers.create', compact(
        'grupos',
        'circuitos',
        'congregaciones',
        'estados',
        'condiciones',
        'privilegios',
        'asignaciones'
    ));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'group_id' => 'required|exists:groups,id',
        'circuit_id' => 'required|exists:circuits,id',
        'congregation_id' => 'required|exists:congregations,id',
        'status' => 'required|in:bautizado,no bautizado',
        'condition' => 'required|in:ejemplar,no ejemplar',
        'privilegios' => 'nullable|array',
        'privilegios.*' => 'exists:privileges,id',
        'asignaciones' => 'nullable|array',
        'asignaciones.*' => 'exists:assignments,id',
    ]);

    // Crear el publicador
    $publisher = \App\Models\Publisher::create($validated);

    // Asociar privilegios y asignaciones
    $publisher->privileges()->sync($request->input('privilegios', []));
    $publisher->assignments()->sync($request->input('asignaciones', []));

    return redirect()->route('publishers.index')->with('success', 'Publicador creado correctamente.');
}


public function edit($id)
{
    $publisher = \App\Models\Publisher::findOrFail($id);
    $grupos = \App\Models\Group::all();
    $circuitos = \App\Models\Circuit::all();
    $congregaciones = \App\Models\Congregation::all();
    $estados = ['bautizado', 'no bautizado'];
    $condiciones = ['ejemplar', 'no ejemplar'];
    $privilegios = \App\Models\Privilege::all();
    $asignaciones = \App\Models\Assignment::all();

    return view('publishers.edit', compact(
        'publisher',
        'grupos',
        'circuitos',
        'congregaciones',
        'estados',
        'condiciones',
        'privilegios',
        'asignaciones'
    ));
}

public function update(Request $request, $id)
{
    // Validar datos
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'group_id' => 'required|exists:groups,id',
        'circuit_id' => 'required|exists:circuits,id',
        'congregation_id' => 'required|exists:congregations,id',
        'status' => 'required|in:bautizado,no bautizado',
        'condition' => 'required|in:ejemplar,no ejemplar',
        'privilegios' => 'nullable|array',
        'privilegios.*' => 'exists:privileges,id',
        'asignaciones' => 'nullable|array',
        'asignaciones.*' => 'exists:assignments,id',
    ]);

    // Buscar publicador
    $publisher = \App\Models\Publisher::findOrFail($id);

    // Actualizar datos básicos
    $publisher->update($validated);

    // Sincronizar relaciones
    $publisher->privileges()->sync($request->input('privilegios', []));
    $publisher->assignments()->sync($request->input('asignaciones', []));

    return redirect()->route('publishers.index')->with('success', 'Publicador actualizado correctamente.');
}

public function destroy($id)
{
    $publisher = \App\Models\Publisher::findOrFail($id);
    $publisher->delete();
    return redirect()->route('publishers.index')->with('success', 'Publicador eliminado correctamente.');
}
    
}
