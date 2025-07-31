<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReunionFinDeSemana;

class ReunionFinDeSemanaController extends Controller
{
    public function index()
{
    $reuniones = ReunionFinDeSemana::with(['presidente', 'lector'])->orderBy('fecha', 'desc')->get();

    return view('reuniones.fin_de_semana.index', compact('reuniones'));
}

    public function create()
{
    // Buscamos el ID de las asignaciones que nos interesan
    $idPresidente = \App\Models\Assignment::where('name', 'Presidente')->first()?->id;
    $idLector = \App\Models\Assignment::where('name', 'Lector de La Atalaya')->first()?->id;

    // Validamos que existan
    if (!$idPresidente || !$idLector) {
        abort(500, 'Asignaciones requeridas no encontradas en la base de datos.');
    }

    // Obtenemos los publicadores que tienen esas asignaciones
    $presidentes = \App\Models\Publisher::whereHas('assignments', function ($query) use ($idPresidente) {
        $query->where('assignment_id', $idPresidente);
    })->orderBy('last_name')->get();

    $lectores = \App\Models\Publisher::whereHas('assignments', function ($query) use ($idLector) {
        $query->where('assignment_id', $idLector);
    })->orderBy('last_name')->get();

    return view('reuniones.fin_de_semana.create', compact('presidentes', 'lectores'));
}


    public function store(Request $request)
{
    // Validación
    $request->validate([
        'fecha' => 'required|date',
        'presidente_id' => 'required|exists:publishers,id',
        'orador' => 'required|string|max:255',
        'congregacion' => 'required|string|max:255',
        'tema' => 'required|string|max:256',
        'la_atalaya' => 'required|string|max:255',
        'lector_id' => 'required|exists:publishers,id',
    ]);

    // Guardar la reunión
    ReunionFinDeSemana::create([
        'fecha' => $request->fecha,
        'presidente_id' => $request->presidente_id,
        'orador' => $request->orador,
        'congregacion' => $request->congregacion,
        'tema' => $request->tema,
        'la_atalaya' => $request->la_atalaya,
        'lector_id' => $request->lector_id,
    ]);

    return redirect()->route('reunion-fin-de-semana.index')->with('success', 'Reunión guardada correctamente.');
}

    public function show(string $id) { }

    public function edit(string $id) { }

    public function update(Request $request, string $id) { }

    public function destroy(string $id) { }
}
