<?php

namespace App\Livewire\Divisi;

use App\Models\Division;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;

#[Title('Edit Divisi')]
class Edit extends Component
{
    public \App\Models\Division $divisi;
    protected $listeners = ['updateDivisi'];

    public $id;
    #[Rule('required', 'max:100')]
    public $name;
    #[Rule('')]
    public $leader;
    #[Rule('required')]
    public $description;

    public function mount()
    {
        $this->id = $this->divisi->id;
        $this->name = $this->divisi->name;
        $this->leader = $this->divisi->leader;
        $this->description = $this->divisi->description;
    }

    public function render()
    {
        return view('livewire.divisi.edit', ['users' => User::where('position', 'leader')->get()]);
    }

    public function updateDivisi()
    {
        Division::where('id', $this->id)->update($this->validate());
        return redirect()->route('divisi.index')->with('success', 'Data Divisi berhasil diperbarui');
    }
}
