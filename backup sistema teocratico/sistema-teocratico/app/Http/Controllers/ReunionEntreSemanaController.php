<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReunionEntreSemana;
use App\Models\Publisher;
use Carbon\Carbon;

class ReunionEntreSemanaController extends Controller
{
    public function index()
    {
        $hoy = Carbon::now();
        $inicioMesActual = $hoy->copy()->startOfMonth();
        $finMesSiguiente = $hoy->copy()->addMonth()->endOfMonth();

        $reuniones = ReunionEntreSemana::with([
            'acomodadorPuerta',
            'acomodadorAuditorio',
            'microfono1',
            'microfono2',
            'encargadoAudio',
            'encargadoVideo',
            'plataforma',
        ])
        ->whereBetween('fecha', [$inicioMesActual, $finMesSiguiente])
        ->orderBy('fecha', 'asc')
        ->get();

        return view('reuniones.entre_semana.index', compact('reuniones'));
    }

    public function create()
{
    return view('reuniones.entre_semana.create', [
        // Acomodador → id: 2
        'puerta'     => Publisher::whereHas('assignments', fn($q) => $q->where('assignment_id', 2))->orderBy('last_name')->get(),
        'auditorio'  => Publisher::whereHas('assignments', fn($q) => $q->where('assignment_id', 2))->orderBy('last_name')->get(),

        // Micrófonos → id: 3
        'mic1'       => Publisher::whereHas('assignments', fn($q) => $q->where('assignment_id', 3))->orderBy('last_name')->get(),
        'mic2'       => Publisher::whereHas('assignments', fn($q) => $q->where('assignment_id', 3))->orderBy('last_name')->get(),

        // Audio → id: 5
        'audio'      => Publisher::whereHas('assignments', fn($q) => $q->where('assignment_id', 5))->orderBy('last_name')->get(),

        // Video → id: 6
        'video'      => Publisher::whereHas('assignments', fn($q) => $q->where('assignment_id', 6))->orderBy('last_name')->get(),

        // Plataforma → id: 4
        'plataforma' => Publisher::whereHas('assignments', fn($q) => $q->where('assignment_id', 4))->orderBy('last_name')->get(),
    ]);
}

    public function store(Request $request)
{
    // Validación
    $request->validate([
        'fecha' => 'required|date|unique:reunion_entre_semana,fecha',
        'acomodador_puerta_id' => 'required|exists:publishers,id',
        'acomodador_auditorio_id' => 'required|exists:publishers,id',
        'microfono_1_id' => 'required|exists:publishers,id',
        'microfono_2_id' => 'required|exists:publishers,id',
        'encargado_audio_id' => 'required|exists:publishers,id',
        'encargado_video_id' => 'required|exists:publishers,id',
        'plataforma_id' => 'required|exists:publishers,id',
    ]);

    // Guardar reunión
    ReunionEntreSemana::create($request->all());

    // Redireccionar con mensaje
    return redirect()->route('reunion-entre-semana.index')->with('success', 'Reunión guardada correctamente');
}

    public function show(string $id) { }

    public function edit($id)
{
    $reunion = ReunionEntreSemana::findOrFail($id);

    return view('reuniones.entre_semana.edit', [
        'reunion'    => $reunion,

        // Acomodador → id: 2
        'puerta'     => Publisher::whereHas('assignments', fn($q) => $q->where('assignment_id', 2))->orderBy('last_name')->get(),
        'auditorio'  => Publisher::whereHas('assignments', fn($q) => $q->where('assignment_id', 2))->orderBy('last_name')->get(),

        // Micrófonos → id: 3
        'mic1'       => Publisher::whereHas('assignments', fn($q) => $q->where('assignment_id', 3))->orderBy('last_name')->get(),
        'mic2'       => Publisher::whereHas('assignments', fn($q) => $q->where('assignment_id', 3))->orderBy('last_name')->get(),

        // Audio → id: 5
        'audio'      => Publisher::whereHas('assignments', fn($q) => $q->where('assignment_id', 5))->orderBy('last_name')->get(),

        // Video → id: 6
        'video'      => Publisher::whereHas('assignments', fn($q) => $q->where('assignment_id', 6))->orderBy('last_name')->get(),

        // Plataforma → id: 4
        'plataforma' => Publisher::whereHas('assignments', fn($q) => $q->where('assignment_id', 4))->orderBy('last_name')->get(),
    ]);
}

    public function update(Request $request, $id)
{
    $request->validate([
        'fecha' => 'required|date',
        'acomodador_puerta_id' => 'required|exists:publishers,id',
        'acomodador_auditorio_id' => 'required|exists:publishers,id',
        'microfono_1_id' => 'required|exists:publishers,id',
        'microfono_2_id' => 'required|exists:publishers,id',
        'encargado_audio_id' => 'required|exists:publishers,id',
        'encargado_video_id' => 'required|exists:publishers,id',
        'plataforma_id' => 'required|exists:publishers,id',
    ]);

    $reunion = ReunionEntreSemana::findOrFail($id);

    $reunion->update([
        'fecha' => $request->fecha,
        'acomodador_puerta_id' => $request->acomodador_puerta_id,
        'acomodador_auditorio_id' => $request->acomodador_auditorio_id,
        'microfono_1_id' => $request->microfono_1_id,
        'microfono_2_id' => $request->microfono_2_id,
        'encargado_audio_id' => $request->encargado_audio_id,
        'encargado_video_id' => $request->encargado_video_id,
        'plataforma_id' => $request->plataforma_id,
    ]);

    return redirect()->route('reunion-entre-semana.index')->with('success', 'Reunión actualizada correctamente.');
}

    public function destroy($id)
{
    $reunion = ReunionEntreSemana::findOrFail($id);
    $reunion->delete();

    return redirect()->route('reunion-entre-semana.index')->with('success', 'Reunión eliminada correctamente.');
}
}

