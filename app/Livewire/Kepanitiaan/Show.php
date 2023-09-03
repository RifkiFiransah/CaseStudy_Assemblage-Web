<?php

namespace App\Livewire\Kepanitiaan;

use App\Models\Committee;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Kepanitiaan')]
class Show extends Component
{
    public \App\Models\Committee $panitia;

    protected $listeners = ['deletePanitia'];

    public function mount()
    {
        $this->panitia->load(['users', 'sections', 'tasks']);
    }

    public function render()
    {
        return view('livewire.kepanitiaan.show');
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
        $panitia = Committee::findOrFail($id);
        $panitia->delete();

        return redirect()->route('kepanitiaan.index')->with('success', 'Data Panitia berhasil dihapus');
    }
}
