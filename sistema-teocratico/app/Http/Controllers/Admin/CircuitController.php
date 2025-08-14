<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Circuit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CircuitController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->get('q'));

        $circuits = Circuit::when($q, fn ($query) =>
                $query->where('name', 'like', "%{$q}%")
            )
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        return view('admin.circuits.index', compact('circuits', 'q'));
    }

    public function create()
    {
        return view('admin.circuits.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:120','unique:circuits,name'],
        ]);

        Circuit::create($data);

        return redirect()->route('admin.circuits.index')
            ->with('ok', 'Circuito creado correctamente.');
    }

    public function edit(Circuit $circuit)
    {
        return view('admin.circuits.edit', compact('circuit'));
    }

    public function update(Request $request, Circuit $circuit)
    {
        $data = $request->validate([
            'name' => ['required','string','max:120', Rule::unique('circuits','name')->ignore($circuit->id)],
        ]);

        $circuit->update($data);

        return redirect()->route('admin.circuits.index')
            ->with('ok', 'Circuito actualizado correctamente.');
    }

    public function destroy(Circuit $circuit)
    {
        $circuit->delete();

        return back()->with('ok', 'Circuito eliminado.');
    }
}