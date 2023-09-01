<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class PengurusForm extends Form
{
    #[Rule('required', 'unique:users', 'max:100')]
    public $name;

    #[Rule('required', 'email')]
    public $email;

    #[Rule('required', 'min:5')]
    public $position;

    #[Rule('')]
    public $division_id;

    public function validateStore()
    {
        $data = $this->validate();
        return $data;
    }

    public function validateUpdate()
    {
        $data = $this->validate();
        return $data;
    }
}
