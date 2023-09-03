<?php

namespace App\Livewire\Section;

use App\Models\Section;
use Livewire\Component;
use App\Models\Committee;
use Livewire\Attributes\Title;

#[Title('Detail Seksi Seksi')]
class Show extends Component
{
    public \App\Models\Division $section;
    public $committees;
    protected $listeners = ['deleteSection'];

    public function mount()
    {
        $this->section;
        // ddd($this->section);
        $this->committees = Committee::with(['tasks', 'users', 'sections'])->findOrFail($this->section->id)->get();
    }

    public function render()
    {
        return view('livewire.section.show');
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

    public function deleteSection($id)
    {
        Section::findOrFail($id)->delete();
        return redirect()->route('section.index')->with('success', 'Data seksi berhasil dihapus');
    }
}
