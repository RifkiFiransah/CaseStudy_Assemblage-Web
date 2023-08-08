<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $divisions = Division::all();
        return view('dashboard', [
            'title' => 'Dashboard',
            'users' => $users,
            'divisions' => $divisions
        ]);
    }
}
