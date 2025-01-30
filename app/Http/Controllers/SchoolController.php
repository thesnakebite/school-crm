<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::paginate(10);

        return view('schools.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('schools.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('public/logos');
            $validated['logo'] = Storage::url($path);
        }

        School::create($validated);

        return redirect()->route('schools.index')->with('success', 'Escuela creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        return view('schools.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        return view('schools.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SchoolRequest $request, School $school)
    {
        $validated = $request->validated();

        if ($request->hasFile('logo')) {
            if ($school->logo) {
                Storage::delete(str_replace('/storage', 'public', $school->logo));
            }
            $path = $request->file('logo')->store('public/logos');
            $validated['logo'] = Storage::url($path);
        }

        $school->update($validated);

        return redirect()->route('schools.index')->with('success', 'Escuela actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        if ($school->logo) {
            Storage::delete(str_replace('storage/', 'public/', $school->logo));
        }

        $school->delete();

        return redirect()->route('schools.index')->with('success', 'Escuela eliminada con éxito');
    }
}
