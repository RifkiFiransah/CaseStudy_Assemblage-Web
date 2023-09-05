<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Title('Login')]
class Login extends Component
{
    #[Rule('required', 'email')]
    public $email;
    #[Rule('required')]
    public $password;

    public function render()
    {
        return view('livewire.login');
    }

    public function login(Request $request)
    {
        $credential = $this->validate();
        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            $id = auth()->user()->id;
            $time_login = now();
            User::where('id', $id)->update(['time_login' => $time_login]);
            return redirect()->route('home');
            // $this->dispatch('success', [
            //     "title" => 'Berhasil',
            //     "text" => 'Berhasil Login',
            //     "icon" => 'success',
            //     'id' => $id
            // ]);
        }
        return back()->with('error', 'Maaf username atau password salah');
    }
}
