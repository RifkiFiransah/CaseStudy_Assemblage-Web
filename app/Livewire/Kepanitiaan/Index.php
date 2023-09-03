<?php

namespace App\Livewire\Kepanitiaan;

use App\Models\Committee;
use App\Models\Section;
use App\Models\Task;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Kepanitiaan')]
class Index extends Component
{
    public $kepanitiaan;
    public $sections;
    public $users;
    public $tasks;
    protected $listeners = ['indexPanitia' => 'render', 'deletePanitia'];

    #[Rule('required')]
    public $user_id;

    #[Rule('required')]
    public $task_id;

    #[Rule('required')]
    public $section_id;

    #[Rule('required')]
    public $role;

    public function mount()
    {
        $this->kepanitiaan = Committee::with(['users', 'tasks', 'sections'])->latest()->get();
        $this->sections = Section::orderBy('name')->get();
        $this->users = User::orderBy('name')->where('position', 'leader')->orWhere('position', 'member')->get();
        $this->tasks = Task::orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.kepanitiaan.index');
    }

    public function store()
    {
        Committee::create($this->validate());

        return redirect()->route('kepanitiaan.index')->with('success', 'Berhasil menambah data kepanitiaan');
    }

    public function destroy($id)
    {
        $this->dispatch('swal:confirm', [
            "title" => 'Are you sure?',
            "text" => 'Once deleted, you will not be able to recover this imaginary file!',
            "icon" => 'warning',
            "id" => $id
        ]);
    }

    public function deletePanitia($id)
    {
        Committee::findOrFail($id)->delete();

        return redirect()->route('kepanitiaan.index')->with('success', 'Berhasil menghapus data kepanitiaan');
    }
}
