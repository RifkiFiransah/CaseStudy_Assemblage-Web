<?php

namespace App\Livewire\Divisi;

// use App\Models\Division;
use App\Models\Task;
use App\Models\User;
use Livewire\Component;
use App\Models\Division;
use Livewire\Attributes\Title;

#[Title('Detail Divisi')]
class Show extends Component
{
    public \App\Models\Division $divisi;
    protected $listeners = ['deleteDivisi'];
    public function render()
    {
        // ddd($this->divisi);
        $divisi = $this->divisi->load(['tasks', 'users']);
        return view('livewire.divisi.show', [
            'divisi' => $divisi
        ]);
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

    public function deleteDivisi($id)
    {
        // menghapus data proker mengenai divisi yang terkait
        $task = Task::where('division_id', $id);
        if ($task->count()) {
            $task->delete();
        }

        // Mengubah data user menjadi null terkait divisinya
        $user = User::where('division_id', $id);
        if ($user->count()) {
            $user->update(["division_id" => null]);
        }

        return redirect()->route('divisi.index')->with('success', 'Data divisi berhasil dihapus');
    }
}
