<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profil.index', [
            'title' => 'Profil'
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'position' => 'required',
        ]);
        User::where('id', $id)->update($validatedData);

        return back()->with('success', 'Profil berhasil diperbarui');
    }
}
