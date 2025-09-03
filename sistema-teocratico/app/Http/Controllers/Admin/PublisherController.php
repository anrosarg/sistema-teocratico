<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use App\Models\Circuit;
use App\Models\Congregation;
use App\Models\Group;
use App\Models\Privilege;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Throwable;

class PublisherController extends Controller
{
    public function index(Request $request)
    {
        $q              = trim((string) $request->get('q'));
        $circuitId      = $request->integer('circuit_id');
        $congregationId = $request->integer('congregation_id');
        $groupId        = $request->integer('group_id');
        $status         = $request->get('status');
        $condition      = $request->get('condition');

        $publishers = Publisher::with(['circuit','congregation','group'])
            ->when($q, function ($query) use ($q) {
                $query->where(function ($qq) use ($q) {
                    $qq->where('first_name','like',"%{$q}%")
                       ->orWhere('last_name','like',"%{$q}%")
                       ->orWhereRaw("CONCAT(first_name,' ',last_name) like ?", ["%{$q}%"]);
                });
            })
            ->when($circuitId, fn($query) => $query->where('circuit_id', $circuitId))
            ->when($congregationId, fn($query) => $query->where('congregation_id', $congregationId))
            ->when($groupId, fn($query) => $query->where('group_id', $groupId))
            ->when(in_array($status, ['bautizado','no bautizado'], true), fn($q2) => $q2->where('status',$status))
            ->when(in_array($condition, ['ejemplar','no ejemplar'], true), fn($q2) => $q2->where('condition',$condition))
            ->orderBy('last_name')->orderBy('first_name')
            ->paginate(12)
            ->withQueryString();

        $circuits       = Circuit::orderBy('name')->pluck('name','id');
        $congregations  = Congregation::orderBy('name')->pluck('name','id');
        $groups         = Group::orderBy('name')->pluck('name','id');

        return view('admin.publishers.index', compact(
            'publishers','q','circuitId','congregationId','groupId','status','condition',
            'circuits','congregations','groups'
        ));
    }

    public function show(Publisher $publisher)
{
    $publisher->load([
        'circuit:id,name',
        'congregation:id,name',
        'group:id,name',
        'privileges:id,name',
        'assignments:id,name',
    ]);

    return view('admin.publishers.show', compact('publisher'));
}

    public function create()
    {
        $circuits      = Circuit::orderBy('name')->pluck('name','id');
        $congregations = Congregation::orderBy('name')->pluck('name','id');
        $groups        = Group::orderBy('name')->pluck('name','id');
        $privileges    = Privilege::orderBy('name')->pluck('name','id');
        $assignments   = Assignment::orderBy('name')->pluck('name','id');

        return view('admin.publishers.create', compact(
            'circuits','congregations','groups','privileges','assignments'
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'last_name'       => ['required','string','max:120'],
            'first_name'      => ['required','string','max:120'],
            'circuit_id'      => ['required','exists:circuits,id'],
            'congregation_id' => ['required','exists:congregations,id'],
            'group_id'        => ['required','exists:groups,id'],
            'status'          => ['required', Rule::in(['bautizado','no bautizado'])],
            'condition'       => ['required', Rule::in(['ejemplar','no ejemplar'])],
            'privileges'      => ['array'],
            'privileges.*'    => ['integer','exists:privileges,id'],
            'assignments'     => ['array'],
            'assignments.*'   => ['integer','exists:assignments,id'],
        ]);

        $publisher = Publisher::create($data);

        // Sincroniza pivots (si no vienen, los deja vacíos)
        $publisher->privileges()->sync($request->input('privileges', []));
        $publisher->assignments()->sync($request->input('assignments', []));

        return redirect()->route('admin.publishers.index')
            ->with('ok','Publicador creado correctamente.');
    }

    public function edit(Publisher $publisher)
    {
        $circuits      = Circuit::orderBy('name')->pluck('name','id');
        $congregations = Congregation::orderBy('name')->pluck('name','id');
        $groups        = Group::orderBy('name')->pluck('name','id');
        $privileges    = Privilege::orderBy('name')->pluck('name','id');
        $assignments   = Assignment::orderBy('name')->pluck('name','id');

        $selectedPrivileges  = $publisher->privileges()->pluck('privileges.id')->toArray();
        $selectedAssignments = $publisher->assignments()->pluck('assignments.id')->toArray();

        return view('admin.publishers.edit', compact(
            'publisher','circuits','congregations','groups','privileges','assignments',
            'selectedPrivileges','selectedAssignments'
        ));
    }

    public function update(Request $request, Publisher $publisher)
    {
        $data = $request->validate([
            'last_name'       => ['required','string','max:120'],
            'first_name'      => ['required','string','max:120'],
            'circuit_id'      => ['required','exists:circuits,id'],
            'congregation_id' => ['required','exists:congregations,id'],
            'group_id'        => ['required','exists:groups,id'],
            'status'          => ['required', Rule::in(['bautizado','no bautizado'])],
            'condition'       => ['required', Rule::in(['ejemplar','no ejemplar'])],
            'privileges'      => ['array'],
            'privileges.*'    => ['integer','exists:privileges,id'],
            'assignments'     => ['array'],
            'assignments.*'   => ['integer','exists:assignments,id'],
        ]);

        $publisher->update($data);

        $publisher->privileges()->sync($request->input('privileges', []));
        $publisher->assignments()->sync($request->input('assignments', []));

        return redirect()->route('admin.publishers.index')
            ->with('ok','Publicador actualizado.');
    }

    public function destroy(Publisher $publisher)
    {
        try {
            $publisher->privileges()->detach();
            $publisher->assignments()->detach();
            $publisher->delete();

            return back()->with('ok','Publicador eliminado.');
        } catch (Throwable $e) {
            return back()->with('error','No se pudo eliminar: '.$e->getMessage());
        }
    }
}