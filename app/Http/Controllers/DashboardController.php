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
        $users = User::orderBy('time_login', 'desc')->limit(3)->get();
        $userCount = User::count();
        $divisions = Division::all();
        $tasks = Task::all();
        $committees = Committee::all();

        return view('dashboard', [
            'title' => 'Dashboard',
            'userCount' => $userCount,
            'users' => $users,
            'divisions' => $divisions,
            'tasks' => $tasks,
            'committees' => $committees
        ]);
    }
}
