<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Registrasi')]
class Registrasi extends Component
{
    #[Rule('required', 'unique:users', 'max:100')]
    public $name;
    #[Rule('required', 'email')]
    public $email;
    #[Rule('required')]
    public $position;
    #[Rule('required', 'min:5')]
    public $password;

    public function render()
    {
        return view('livewire.registrasi');
    }

    public function register()
    {
        $validatedData = $this->validate();
        $validatedData['password'] = bcrypt($this->password);
        if ($validatedData['position'] == 'leader') {
            User::create($validatedData)->assignRole('leader');
            return redirect()->route('login')->with('success', 'Registrasi berhasil!!, Silahkan Login');
        }
        User::create($validatedData)->assignRole('member');
        return redirect()->route('login')->with('success', 'Registrasi berhasil!!, Silahkan Login');
    }
}
