<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with(['divisions'])->latest()->get();
        return view('users.index', [
            'title' => 'Pengurus',
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
        // ddd($request);
        $validatedData = $request->validate([
            'name' => 'required|unique:users|max:100',
            'email' => 'required|email',
            'position' => 'required|min:5',
        ]);
        $validatedData['password'] = bcrypt($request->input('position') . "123");
        // ddd($validatedData);
        if ($validatedData['position'] == 'leader') {
            User::create($validatedData)->assignRole('leader');
            return back()->with('success', 'Berhasil menambahkan pengurus baru');
        } else {
            $validatedData['created_at'] = now();
            $validatedData['updated_at'] = now();
            User::insert($validatedData);
            $id = User::latest()->first();
            $id->assignRole('member');
            return back()->with('success', 'Berhasil menambahkan pengurus baru');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('divisions')->findOrFail($id);
        return view('users.show', [
            "title" => "Detail Pengurus",
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $user = User::findOrFail($id);
        $divisions = Division::all();
        return view('users.edit', [
            'title' => 'Edit Pengurus',
            'user' => $user,
            'divisions' => $divisions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'position' => 'required',
            'division_id' => ''
        ]);
        // $validatedData['division_id'] = $request->input('division_id');

        if ($validatedData['position'] == 'leader' && $request->input('division_id')) {
            Division::where('id', $validatedData['division_id'])->update([
                'leader' => $validatedData['name']
            ]);
        }
        User::where('id', $id)->update($validatedData);

        return redirect('/pengurus')->with('success', 'Data Pengurus berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $committee = Committee::where('user_id', $id)->get();

        if ($committee) {
            Committee::where('user_id', $id)->delete();
        }

        User::findOrFail($id)->delete();

        return redirect('/pengurus')->with('success', 'Data Pengurus berhasil dihapus');
    }
}
