<?php

namespace App\Livewire\Pengurus;

use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    public \App\Models\User $user;
    protected $listeners = ['onDelete'];
    #[On('onDelete')]
    public function render()
    {
        // $user = User::with('divisions')->findOrFail($id);

        return view('livewire.pengurus.show');
    }
}
