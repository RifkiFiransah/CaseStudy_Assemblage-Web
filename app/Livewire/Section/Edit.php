<?php

namespace App\Livewire\Section;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Edit Seksi Seksi')]

class Edit extends Component
{
    public \App\Models\Section $section;
    public $id;

    #[Rule('required', 'unique:sections', 'max:100')]
    public $name;

    public function mount()
    {
        $this->name = $this->section->name;
        $this->id = $this->section->id;
    }

    public function render()
    {
        return view('livewire.section.edit');
    }

    public function update()
    {
        $this->section->update($this->validate());

        return redirect()->route('section.index')->with('success', 'Data seksi berhasil diperbarui');
    }
}
