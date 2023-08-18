<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{
    public function login()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $id = auth()->user()->id;
            $time_login = now();
            User::where('id', $id)->update(['time_login' => $time_login]);
            return redirect()->intended('home');
        }
        return back()->with('error', 'Maaf username atau password salah');
    }

    public function registrasi()
    {
        return view('registrasi', [
            'title' => 'Registrasi'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:users|max:100',
            'email' => 'required|email',
            'position' => 'required',
            'password' => 'required|min:5',
        ]);
        $validatedData['password'] = bcrypt($request->input('password'));
        if ($validatedData['position'] == 'leader') {
            User::create($validatedData)->assignRole('leader');
            return redirect('/login')->with('success', 'Registrasi berhasil!!, Silahkan Login');
        }
        User::create($validatedData)->assignRole('member');
        return redirect('/login')->with('success', 'Registrasi berhasil!!, Silahkan Login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Sampai jumpa');
    }
}
