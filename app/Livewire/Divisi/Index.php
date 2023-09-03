<?php

namespace App\Livewire\Divisi;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;
use App\Models\Division;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;

#[Title('Divisi')]
class Index extends Component
{
    public $divisions;
    protected $listeners = ['indexDivisi' => 'render', 'deleteDivisi'];
    // #[On('deleteDivisi')]
    // public function updateList($divisi)
    // {
    // }
    #[Rule('required', 'max:100')]
    public $name;
    #[Rule('')]
    public $leader;
    #[Rule('required')]
    public $description;

    public function store()
    {
        $validatedData = $this->validate();
        $result = Division::create($validatedData);
        if (!$result->leader) {
            return redirect()->route('divisi.index')->with('success', 'Data divisi berhasil ditambahkan');
        } else {
            User::where('name', $validatedData['leader'])->update([
                'division_id' => $result->id
            ]);
            return redirect()->route('divisi.index')->with('success', 'Data divisi berhasil ditambahkan');
        }
    }

    public function render()
    {
        $this->divisions = Division::latest()->get();
        $users = User::where('position', 'leader')->get();
        return view('livewire.divisi.index', [
            'divisions' => $this->divisions,
            'users' => $users,
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

        Division::where('id', $id)->delete();
        $this->dispatch('swal:success', [
            "title" => 'Berhasil',
            "text" => 'Berhasil menghapus pengurus baru',
            "icon" => 'success',
        ]);
    }
}
