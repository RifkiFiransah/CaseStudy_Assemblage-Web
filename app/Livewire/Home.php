<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Home')]
class Home extends Component
{
    protected $listeners = ['home' => 'render'];
    public function render()
    {
        return view('livewire.home');
    }
}
