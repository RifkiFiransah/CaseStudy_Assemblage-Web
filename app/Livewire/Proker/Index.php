<?php

namespace App\Livewire\Proker;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;
use App\Models\Division;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;

#[Title('Proker')]
class Index extends Component
{
    protected $listeners = ['deleteProker', 'indexProker'];

    #[Rule('required', 'max:100', 'unique:tasks')]
    public $name;
    #[Rule('required')]
    public $status;
    #[Rule('required')]
    public $tanggal;
    #[Rule('required')]
    public $division_id;
    #[Rule('required')]
    public $user_id;

    public function render()
    {
        $divisions = Division::select('name', 'id')->get();
        $users = User::select('name', 'id')->where('position', 'leader')->orWhere('position', 'member')->get();
        $tasks = Task::with(['users'])->latest()->get();
        return view('livewire.proker.index', [
            'divisions' => $divisions,
            'users' => $users,
            'tasks' => $tasks
        ]);
    }

    public function indexProker()
    {
        return redirect()->route('proker.index');
    }

    public function storeProker()
    {
        Task::create($this->validate());
        // $this->dispatch('swal:success', [
        //     "title" => 'Berhasil',
        //     "text" => 'Berhasil menambah proker baru',
        //     "icon" => 'success',
        // ]);
        return redirect()->route('proker.index')->with('success', 'Berhasil menambah proker baru');
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
        $this->dispatch('swal:success', [
            "title" => 'Berhasil',
            "text" => 'Berhasil menghapus pengurus baru',
            "icon" => 'success',
        ]);
    }
}
