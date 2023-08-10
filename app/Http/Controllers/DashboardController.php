<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\Division;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $divisions = Division::all();
        $tasks = Task::all();
        $committees = Committee::all();

        return view('dashboard', [
            'title' => 'Dashboard',
            'users' => $users,
            'divisions' => $divisions,
            'tasks' => $tasks,
            'committees' => $committees
        ]);
    }
}
