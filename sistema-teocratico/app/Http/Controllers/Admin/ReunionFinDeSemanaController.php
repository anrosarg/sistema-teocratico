<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReunionFinDeSemana;
use App\Models\Assignment;
use App\Models\Publisher;
use Illuminate\Http\Request;

class ReunionFinDeSemanaController extends Controller
{
    public function index()
    {
        // Solo mes actual y siguiente
        $start = now()->startOfMonth()->toDateString();
        $end   = now()->copy()->addMonthNoOverflow()->endOfMonth()->toDateString();

        $reuniones = ReunionFinDeSemana::with(['presidente','lector'])
            ->whereBetween('fecha', [$start, $end])
            ->orderBy('fecha', 'asc')
            ->paginate(50);

        $breadcrumbs = [
            ['label' => 'Inicio', 'url' => route('admin.dashboard')],
            ['label' => 'Reunión fin de semana'],
        ];

        return view('admin.reunion_fin_de_semana.index', compact('reuniones','breadcrumbs'));
    }

    public function create()
    {
        // Buscar IDs de asignaciones por nombre
        $idPresidente = Assignment::where('name', 'Presidente')->value('id');
        $idLector     = Assignment::where('name', 'Lector de La Atalaya')->value('id');

        // Si no existen, cargamos todos para no romper (podés cambiar a abort si preferís)
        $presidentes = $idPresidente
            ? Publisher::whereHas('assignments', fn($q) => $q->where('assignment_id', $idPresidente))
                ->orderBy('last_name')->orderBy('first_name')->get()
            : Publisher::orderBy('last_name')->orderBy('first_name')->get();

        $lectores = $idLector
            ? Publisher::whereHas('assignments', fn($q) => $q->where('assignment_id', $idLector))
                ->orderBy('last_name')->orderBy('first_name')->get()
            : Publisher::orderBy('last_name')->orderBy('first_name')->get();

        $breadcrumbs = [
            ['label' => 'Inicio', 'url' => route('admin.dashboard')],
            ['label' => 'Reunión fin de semana', 'url' => route('admin.reunion_fin_de_semana.index')],
            ['label' => 'Crear'],
        ];

        return view('admin.reunion_fin_de_semana.create', compact('presidentes','lectores','breadcrumbs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha'          => ['required','date','unique:reunion_fin_de_semana,fecha'],
            'presidente_id'  => ['required','exists:publishers,id'],
            'orador'         => ['required','string','max:255'],
            'congregacion'   => ['required','string','max:255'],
            'tema'           => ['required','string','max:256'],
            'la_atalaya'     => ['required','string','max:255'],
            'lector_id'      => ['required','exists:publishers,id'],
        ]);

        ReunionFinDeSemana::create($request->all());

        return redirect()
            ->route('admin.reunion_fin_de_semana.index')
            ->with('success', 'Reunión guardada correctamente.');
    }

    public function edit($id)
    {
        $reunion = ReunionFinDeSemana::findOrFail($id);

        $idPresidente = Assignment::where('name', 'Presidente')->value('id');
        $idLector     = Assignment::where('name', 'Lector de La Atalaya')->value('id');

        $presidentes = $idPresidente
            ? Publisher::whereHas('assignments', fn($q) => $q->where('assignment_id', $idPresidente))
                ->orderBy('last_name')->orderBy('first_name')->get()
            : Publisher::orderBy('last_name')->orderBy('first_name')->get();

        $lectores = $idLector
            ? Publisher::whereHas('assignments', fn($q) => $q->where('assignment_id', $idLector))
                ->orderBy('last_name')->orderBy('first_name')->get()
            : Publisher::orderBy('last_name')->orderBy('first_name')->get();

        $breadcrumbs = [
            ['label' => 'Inicio', 'url' => route('admin.dashboard')],
            ['label' => 'Reunión fin de semana', 'url' => route('admin.reunion_fin_de_semana.index')],
            ['label' => 'Editar'],
        ];

        return view('admin.reunion_fin_de_semana.edit', compact('reunion','presidentes','lectores','breadcrumbs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha'          => ['required','date','unique:reunion_fin_de_semana,fecha,'.$id],
            'presidente_id'  => ['required','exists:publishers,id'],
            'orador'         => ['required','string','max:255'],
            'congregacion'   => ['required','string','max:255'],
            'tema'           => ['required','string','max:256'],
            'la_atalaya'     => ['required','string','max:255'],
            'lector_id'      => ['required','exists:publishers,id'],
        ]);

        $reunion = ReunionFinDeSemana::findOrFail($id);
        $reunion->update($request->all());

        return redirect()
            ->route('admin.reunion_fin_de_semana.index')
            ->with('success', 'Reunión actualizada correctamente.');
    }

    public function destroy($id)
    {
        $reunion = ReunionFinDeSemana::findOrFail($id);
        $reunion->delete();

        return redirect()
            ->route('admin.reunion_fin_de_semana.index')
            ->with('success', 'Reunión eliminada correctamente.');
    }
}
