<?php

namespace App\Livewire\Profil;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Profil')]
class Index extends Component
{
    protected $listeners = ['indexProfil'];
    public $id;

    #[Rule('required', 'min:3', 'max:100')]
    public $name;
    #[Rule('required', 'email')]
    public $email;
    #[Rule('required')]
    public $position;

    public function mount()
    {
        $this->id = auth()->user()->id;
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->position = auth()->user()->position;
    }

    public function render()
    {
        return view('livewire.profil.index');
    }

    public function update()
    {
        User::findOrFail($this->id)->update($this->validate());
        $this->dispatch('swal:success', [
            "title" => 'Berhasil',
            "text" => 'Berhasil mengubah profil',
            "icon" => 'success',
        ]);
    }
}
