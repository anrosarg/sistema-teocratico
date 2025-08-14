<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Congregation;
use App\Models\Circuit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CongregationController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->get('q'));
        $circuitId = $request->integer('circuit_id');

        $congregations = Congregation::with('circuit')
            ->when($q, fn($query) => $query->where('name', 'like', "%{$q}%"))
            ->when($circuitId, fn($query) => $query->where('circuit_id', $circuitId))
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        $circuits = Circuit::orderBy('name')->pluck('name', 'id');

        return view('admin.congregations.index', compact('congregations', 'q', 'circuitId', 'circuits'));
    }

    public function create()
    {
        $circuits = Circuit::orderBy('name')->pluck('name', 'id');
        return view('admin.congregations.create', compact('circuits'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => ['required','string','max:120','unique:congregations,name'],
            'circuit_id' => ['required','exists:circuits,id'],
        ]);

        Congregation::create($data);

        return redirect()->route('admin.congregations.index')
            ->with('ok', 'Congregación creada correctamente.');
    }

    public function edit(Congregation $congregation)
    {
        $circuits = Circuit::orderBy('name')->pluck('name', 'id');
        return view('admin.congregations.edit', compact('congregation','circuits'));
    }

    public function update(Request $request, Congregation $congregation)
    {
        $data = $request->validate([
            'name'       => ['required','string','max:120', Rule::unique('congregations','name')->ignore($congregation->id)],
            'circuit_id' => ['required','exists:circuits,id'],
        ]);

        $congregation->update($data);

        return redirect()->route('admin.congregations.index')
            ->with('ok', 'Congregación actualizada.');
    }

    public function destroy(Congregation $congregation)
    {
        $congregation->delete();
        return back()->with('ok', 'Congregación eliminada.');
    }
}