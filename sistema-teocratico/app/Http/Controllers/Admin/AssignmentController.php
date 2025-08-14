<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Throwable;

class AssignmentController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->get('q'));

        $assignments = Assignment::when($q, fn($query) =>
                $query->where('name', 'like', "%{$q}%")
            )
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        return view('admin.assignments.index', compact('assignments', 'q'));
    }

    public function create()
    {
        return view('admin.assignments.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:120','unique:assignments,name'],
        ]);

        Assignment::create($data);

        return redirect()->route('admin.assignments.index')
            ->with('ok', 'Asignación creada correctamente.');
    }

    public function edit(Assignment $assignment)
    {
        return view('admin.assignments.edit', compact('assignment'));
    }

    public function update(Request $request, Assignment $assignment)
    {
        $data = $request->validate([
            'name' => ['required','string','max:120', Rule::unique('assignments','name')->ignore($assignment->id)],
        ]);

        $assignment->update($data);

        return redirect()->route('admin.assignments.index')
            ->with('ok', 'Asignación actualizada.');
    }

    public function destroy(Assignment $assignment)
    {
        // Por si hay referencias en el pivot, las limpiamos antes de borrar
        try {
            $assignment->publishers()->detach();
            $assignment->delete();
            return back()->with('ok', 'Asignación eliminada.');
        } catch (Throwable $e) {
            return back()->with('error', 'No se pudo eliminar: '.$e->getMessage());
        }
    }
}