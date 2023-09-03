<?php

namespace App\Livewire\Proker;

use App\Models\User;
use Livewire\Component;
use App\Models\Division;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;

#[Title('Edit Proker')]

class Edit extends Component
{
    public \App\Models\Task $proker;
    public $divisions;
    public $users;

    #[Rule('required', 'max:100')]
    public $name;

    #[Rule('required')]
    public $status;

    #[Rule('required')]
    public $tanggal;

    #[Rule('required')]
    public $division_id;

    #[Rule('required')]
    public $user_id;

    #[Rule('')]
    public $tema;

    public function mount()
    {
        $this->divisions = Division::select('name', 'id')->get();
        $this->users = User::select('name', 'id')->where('position', 'leader')->orWhere('position', 'member')->get();

        $this->name = $this->proker->name;
        $this->status = $this->proker->status;
        $this->tanggal = $this->proker->tanggal;
        $this->tema = $this->proker->tema;
        $this->division_id = $this->proker->division_id;
        $this->user_id = $this->proker->user_id;
    }

    public function render()
    {
        return view('livewire.proker.edit');
    }

    public function update()
    {
        $this->proker->update($this->validate());
        return redirect()->route('proker.index')->with('Berhasil mengubah data proker');
    }
}
