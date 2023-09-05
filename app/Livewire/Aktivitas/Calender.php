<?php

namespace App\Livewire\Aktivitas;

use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Kalender')]
class Calender extends Component
{
    public $tasks;

    public function mount()
    {
        $this->tasks = Task::with(['users', 'divisions'])->where('status', 'success')->orWhere('status', 'cancel')->orderBy('updated_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.aktivitas.calender');
    }
}
