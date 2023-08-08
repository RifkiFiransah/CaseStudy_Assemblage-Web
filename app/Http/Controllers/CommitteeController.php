<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\Section;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::orderBy('name')->get();
        $users = User::orderBy('name')->where('position', 'leader')->orWhere('position', 'member')->get();
        $tasks = Task::orderBy('name')->get();
        $committees = Committee::latest()->get();
        return view('committees.index', [
            'title' => 'Kepanitiaan Proker',
            'sections' => $sections,
            'users' => $users,
            'tasks' => $tasks,
            'committees' => $committees
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
            'user_id' => 'required',
            'task_id' => 'required',
            'section_id' => 'required',
            'role' => 'required',
        ]);

        Committee::create($validatedData);
        return back()->with('success', 'Data Panitia berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Committee $committee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Committee $committee, $id)
    {
        $sections = Section::orderBy('name')->get();
        $users = User::orderBy('name')->where('position', 'leader')->orWhere('position', 'member')->get();
        $tasks = Task::orderBy('name')->get();
        $panitia = $committee::findOrFail($id);
        return view('committees.edit', [
            'title' => 'Edit Kepanitiaan Proker',
            'sections' => $sections,
            'users' => $users,
            'tasks' => $tasks,
            'panitia' => $panitia
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Committee $committee, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'task_id' => 'required',
            'section_id' => 'required',
            'role' => 'required',
        ]);

        $committee::findOrFail($id)->update($validatedData);
        return redirect('/kepanitiaan')->with('success', 'Data Panitia berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Committee $committee, $id)
    {
        $committee::findOrFail($id)->delete();

        return back()->with('success', 'Data Panitia berhasil dihapus');
    }
}
