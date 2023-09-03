<?php

namespace App\Livewire\Section;

use Livewire\Attributes\Title;
use App\Models\Section;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Title('Seksi Seksi')]
class Index extends Component
{
    public $sections;
    protected $listeners = ['deleteSection', 'indexSection' => 'render'];

    #[Rule('required', 'unique:sections', 'max:100')]
    public $name;

    public function mount()
    {
        $this->sections = Section::orderBy('name', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.section.index');
    }

    public function store()
    {
        Section::create($this->validate());
        // $this->dispatch('swal:success', [
        //     "title" => 'Berhasil',
        //     "text" => 'Berhasil menambah proker baru',
        //     "icon" => 'success',
        // ]);
        return redirect()->route('section.index')->with('success', 'Data seksi berhasil ditambahkan');
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
        // $this->dispatch('swal:success', [
        //     "title" => 'Berhasil',
        //     "text" => 'Berhasil menambah proker baru',
        //     "icon" => 'success',
        // ]);
        return redirect()->route('section.index')->with('success', 'Data seksi berhasil dihapus');
    }
}
