<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Privilege;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PrivilegeController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->get('q'));

        $privileges = Privilege::when($q, fn ($query) =>
                $query->where('name', 'like', "%{$q}%")
            )
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        return view('admin.privileges.index', compact('privileges', 'q'));
    }

    public function create()
    {
        return view('admin.privileges.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:120','unique:privileges,name'],
        ]);

        Privilege::create($data);

        return redirect()->route('admin.privileges.index')
            ->with('ok', 'Privilegio creado correctamente.');
    }

    public function edit(Privilege $privilege)
    {
        return view('admin.privileges.edit', compact('privilege'));
    }

    public function update(Request $request, Privilege $privilege)
    {
        $data = $request->validate([
            'name' => ['required','string','max:120', Rule::unique('privileges','name')->ignore($privilege->id)],
        ]);

        $privilege->update($data);

        return redirect()->route('admin.privileges.index')
            ->with('ok', 'Privilegio actualizado.');
    }

    public function destroy(Privilege $privilege)
    {
        $privilege->delete();

        return back()->with('ok', 'Privilegio eliminado.');
    }
}