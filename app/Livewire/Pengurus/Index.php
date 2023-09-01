<?php

namespace App\Livewire\Pengurus;

use App\Livewire\Forms\PengurusForm;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;
use Livewire\Component;

#[Title('Pengurus')]

class Index extends Component
{
    public $users;
    protected $listeners = [
        // 'delete',
        'index' => 'render'
    ];

    #[On('delete')]
    public function updateList($user)
    {
    }

    public PengurusForm $form;

    public function store()
    {
        $data = $this->form->validateStore();
        $data['password'] = bcrypt($data['position'] . "123");
        if ($data['position'] == 'leader') {
            User::create($data)->assignRole('leader');
            return redirect()->route('pengurus.index')->with('success', 'Berhasil menambahkan pengurus baru');
            // session()->flash('success', 'Berhasil menambahkan pengurus baru');
        } else {
            $data['created_at'] = now();
            $data['updated_at'] = now();
            User::insert($data);
            $id = User::latest()->first();
            $id->assignRole('member');
            return redirect()->route('pengurus.index')->with('success', 'Berhasil menambahkan pengurus baru');
        }
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

    public function delete($id)
    {
        $user = User::findOrFail($id);
        ddd($user);
        $user->delete();
        // flash('Berhasil menghapus pengurus baru');
        // $this->dispatch('index', $user->id);
        $this->dispatch('swal:success', [
            "title" => 'Berhasil',
            "text" => 'Berhasil menghapus pengurus baru',
            "icon" => 'success',
        ]);
    }

    public function render()
    {
        $this->users = User::with(['divisions'])->latest()->get();
        return view('livewire.pengurus.index', [
            'users' => $this->users
        ]);
    }
}
