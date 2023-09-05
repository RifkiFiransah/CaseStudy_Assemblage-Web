<?php

namespace App\Livewire\Aktivitas;

use App\Models\Task;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Aktivitas')]
class Index extends Component
{
    public $tasks;

    public function mount()
    {
        $this->tasks = Task::with(['users', 'divisions'])->where('status', 'success')->orWhere('status', 'cancel')->orderBy('updated_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.aktivitas.index');
    }
}
