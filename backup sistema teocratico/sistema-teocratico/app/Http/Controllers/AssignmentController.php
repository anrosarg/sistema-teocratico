<?php

namespace App\Http\Controllers;

use App\Models\Assignment;

use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   public function index()
    {
        $assignments = Assignment::orderBy('name')->get();
        return view('assignments.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assignments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Assignment::create($request->only('name'));

        return redirect()->route('assignments.index')
                         ->with('success', 'Asignación creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Assignment $assignment)
    {
        return view('assignments.edit', compact('assignment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assignment $assignment)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $assignment->update($request->only('name'));

        return redirect()->route('assignments.index')
                         ->with('success', 'Asignación actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignment $assignment)
    {
        $assignment->delete();

        return redirect()->route('assignments.index')
                         ->with('success', 'Asignación eliminada con éxito.');
    }
}
