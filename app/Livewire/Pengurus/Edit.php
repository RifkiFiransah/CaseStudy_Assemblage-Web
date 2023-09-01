<?php

namespace App\Livewire\Pengurus;


use App\Models\User;
use Livewire\Component;
use App\Models\Division;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;

#[Title('Edit Pengurus')]
class Edit extends Component
{
    public \App\Models\User $user;
    public $id;

    #[Rule('required', 'unique:users', 'max:100')]
    public $name;

    #[Rule('required', 'email')]
    public $email;

    #[Rule('required', 'min:5')]
    public $position;

    #[Rule('')]
    public $division_id;

    public function mount()
    {
        $this->id = $this->user->id;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->position = $this->user->position;

        $this->division_id = $this->user->division_id ?? null;
    }

    public function update()
    {
        $validatedData = $this->validate();
        if ($validatedData['position'] == 'leader' && $this->division_id) {
            Division::where('id', $validatedData['division_id'])->update([
                'leader' => $validatedData['name']
            ]);
        }
        User::where('id', $this->id)->update($validatedData);
        return redirect()->route('pengurus.index')->with('success', 'Data Pengurus berhasil diperbarui');
    }

    public function render()
    {
        return view('livewire.pengurus.edit', ['divisions' => Division::all()]);
    }
}
