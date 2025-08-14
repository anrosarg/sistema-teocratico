<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Congregation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->get('q'));
        $congregationId = $request->integer('congregation_id');

        $groups = Group::with('congregation')
            ->when($q, fn($query) => $query->where('name', 'like', "%{$q}%"))
            ->when($congregationId, fn($query) => $query->where('congregation_id', $congregationId))
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        $congregations = Congregation::orderBy('name')->pluck('name','id');

        return view('admin.groups.index', compact('groups','q','congregationId','congregations'));
    }

    public function create()
    {
        $congregations = Congregation::orderBy('name')->pluck('name','id');
        return view('admin.groups.create', compact('congregations'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'            => ['required','string','max:120',
                Rule::unique('groups','name')->where(fn($q) => $q->where('congregation_id', $request->congregation_id))
            ],
            'congregation_id' => ['required','exists:congregations,id'],
        ]);

        Group::create($data);

        return redirect()->route('admin.groups.index')->with('ok','Grupo creado correctamente.');
    }

    public function edit(Group $group)
    {
        $congregations = Congregation::orderBy('name')->pluck('name','id');
        return view('admin.groups.edit', compact('group','congregations'));
    }

    public function update(Request $request, Group $group)
    {
        $data = $request->validate([
            'name'            => ['required','string','max:120',
                Rule::unique('groups','name')
                    ->ignore($group->id)
                    ->where(fn($q) => $q->where('congregation_id', $request->congregation_id))
            ],
            'congregation_id' => ['required','exists:congregations,id'],
        ]);

        $group->update($data);

        return redirect()->route('admin.groups.index')->with('ok','Grupo actualizado.');
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return back()->with('ok','Grupo eliminado.');
    }
}