<?php

namespace App\Livewire\Proker;

use App\Models\Task;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Proker')]
class Show extends Component
{
    public \App\Models\Task $proker;
    protected $listeners = ['deleteProker'];

    public function mount()
    {
        $this->proker->load(['users', 'divisions']);
    }

    public function render()
    {
        return view('livewire.proker.show');
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

    public function deleteProker($id)
    {
        $proker = Task::findOrFail($id);
        $proker->delete();

        return redirect()->route('proker.index')->with('success', 'Data Proker berhasil dihapus');
    }
}
