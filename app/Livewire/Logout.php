<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    protected $listeners = ['logout'];

    public function render()
    {
        return view('livewire.logout');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Sampai jumpa');
    }
}
