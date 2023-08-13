<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisions = Division::select('name', 'id')->get();
        $users = User::select('name', 'id')->where('position', 'leader')->orWhere('position', 'member')->get();
        $tasks = Task::with(['users'])->latest()->get();
        return view('prokers.index', [
            'title' => 'Program kerja',
            'tasks' => $tasks,
            'divisions' => $divisions,
            'users' => $users
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
            'name' => 'required|max:100|unique:tasks',
            'status' => 'required',
            'tanggal' => 'required',
            'division_id' => 'required',
            'user_id' => 'required'
        ]);
        Task::create($validatedData);

        return back()->with('success', 'Data proker berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task, $id)
    {
        $divisions = Division::select('name', 'id')->get();
        $users = User::select('name', 'id')->where('position', 'leader')->orWhere('position', 'member')->get();
        $proker = $task::findOrFail($id);
        return view('prokers.edit', [
            'title' => 'Program kerja',
            'proker' => $proker,
            'divisions' => $divisions,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'status' => 'required',
            'tanggal' => 'required',
            'division_id' => 'required',
            'user_id' => 'required',
            'tema' => ''
        ]);

        $task::findOrFail($id)->update($validatedData);

        return redirect('/proker')->with('success', 'Data proker berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task, $id)
    {
        $task::findOrFail($id)->delete();

        return back()->with('success', 'Data proker berhasil dihapus');
    }
}
