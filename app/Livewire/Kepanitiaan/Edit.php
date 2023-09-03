<?php

namespace App\Livewire\Kepanitiaan;

use App\Models\Committee;
use App\Models\Section;
use App\Models\Task;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Panitia')]

class Edit extends Component
{
    public \App\Models\Committee $panitia;
    public $sections;
    public $tasks;
    public $users;
    protected $listeners = ['updatePanitia'];

    public $id;
    #[Rule('required')]
    public $user_id;

    #[Rule('required')]
    public $section_id;

    #[Rule('required')]
    public $task_id;

    #[Rule('required')]
    public $role;

    public function mount()
    {
        $this->sections = Section::orderBy('name')->get();
        $this->tasks = Task::orderBy('name')->get();
        $this->users = User::orderBy('name')->where('position', 'leader')->orWhere('position', 'member')->get();

        $this->id = $this->panitia->id;
        $this->user_id = $this->panitia->user_id;
        $this->section_id = $this->panitia->section_id;
        $this->task_id = $this->panitia->task_id;
        $this->role = $this->panitia->role;
    }

    public function render()
    {
        return view('livewire.kepanitiaan.edit');
    }

    public function updatePanitia()
    {
        Committee::findOrFail($this->id)->update($this->validate());
        return redirect()->route('kepanitiaan.index')->with('success', 'Berhasil mengubah data panitia');
    }
}
