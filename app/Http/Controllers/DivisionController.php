<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisions = Division::orderBy('id', 'desc')->get();
        $users = User::where('position', 'leader')->get();
        return view('divisions.index', [
            'title' => 'Divisi',
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
            'name' => 'required|max:100',
            'description' => 'required',
            'leader' => ''
        ]);
        $result = Division::create($validatedData);
        if (!$result->leader) {
            return back()->with('success', 'Data divisi berhasil ditambahkan');
        } else {
            User::where('name', $validatedData['leader'])->update([
                'division_id' => $result->id
            ]);
            return back()->with('success', 'Data divisi berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Division $division, $id)
    {
        $divisi = $division->load(['tasks', 'users'])->findOrFail($id);
        return view('divisions.show', [
            'title' => 'Detail Divisi',
            'divisi' => $divisi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $users = User::where('position', 'leader')->get();
        $divisi = Division::findOrFail($id);

        return view('divisions.edit', [
            'title' => 'Edit Divisi',
            'users' => $users,
            'divisi' => $divisi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required',
            'leader' => ''
        ]);

        Division::findOrFail($id)->update($validatedData);

        return redirect('/divisi')->with('success', 'Data divisi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // menghapus data proker mengenai divisi yang terkait
        $task = Task::where('division_id', $id);
        if ($task->count()) {
            $task->delete();
        }

        // Mengubah data user menjadi null terkait divisinya
        $user = User::where('division_id', $id);
        if ($user->count()) {
            $user->update(["division_id" => null]);
        }

        Division::where('id', $id)->delete();

        return redirect('/divisi')->with('success', 'Data Divisi berhasil dihapus');
    }
}
