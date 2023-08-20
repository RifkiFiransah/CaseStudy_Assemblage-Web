<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::orderBy('name', 'asc')->get();
        return view('sections.index', [
            'title' => "Seksi-seksi Proker",
            'sections' => $sections
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100|unique:sections'
        ]);
        Section::create($validatedData);
        return back()->with('success', 'Data seksi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section, $id)
    {
        $seksi = $section->load(['committees'])->findOrFail($id);
        $committees = Committee::with(['tasks', 'users', 'sections'])->findOrFail($id)->get();
        return view('sections.show', [
            'title' => 'Detail Seksi',
            'seksi' => $seksi,
            'committees' => $committees
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section, $id)
    {
        $seksi = $section::findOrFail($id);
        return view('sections.edit', [
            'title' => 'Edit Seksi Proker',
            'section' => $seksi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100'
        ]);

        $section::findOrFail($id)->update($validatedData);
        return redirect('/seksi-seksi')->with('success', 'Data seksi berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section, $id)
    {
        $section::findOrFail($id)->delete();

        return back()->with('success', 'Data seksi berhasil dihapus');
    }
}
