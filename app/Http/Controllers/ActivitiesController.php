<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['users', 'divisions'])->where('status', 'success')->orWhere('status', 'cancel')->orderBy('updated_at', 'desc')->get();
        return view('activities.index', [
            'title' => 'Activitas',
            'tasks' => $tasks
        ]);
    }

    public function calendar()
    {
        $tasks = Task::with(['users', 'divisions'])->where('status', 'success')->orWhere('status', 'cancel')->orderBy('updated_at', 'desc')->get();
        return view('activities.calendar', [
            'title' => 'Kalender',
            'tasks' => $tasks
        ]);
    }
}
