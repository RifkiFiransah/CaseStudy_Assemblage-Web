<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;
use App\Models\Division;
use App\Models\Committee;
use Illuminate\Http\Request;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Title('Dashboard')]

class Dashboard extends Component
{
    protected $listeners = ['logout'];

    protected $users;
    protected $userCount;
    protected $divisions;
    protected $tasks;
    protected $committees;

    public function render()
    {
        $this->users = User::orderBy('time_login', 'desc')->limit(3)->get();
        $this->userCount  = User::count();
        $this->divisions = Division::all();
        $this->tasks = Task::all();
        $this->committees = Committee::all();

        return view('livewire.dashboard', [
            'users' => $this->users,
            'userCount' => $this->userCount,
            'divisions' => $this->divisions,
            'tasks' => $this->tasks,
            'committees' => $this->committees
        ]);
    }

    // public function logout()
    // {
    //     Auth::logout();

    //     return redirect()->route('login')->with('success', 'Sampai jumpa');
    // }
}
