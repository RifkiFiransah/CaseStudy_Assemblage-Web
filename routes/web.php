<?php

use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home', [
        'title' => 'Home'
    ]);
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/aktivitas', [ActivitiesController::class, 'index'])->name('aktivitas');
    Route::get('/calendar', [ActivitiesController::class, 'calendar'])->name('calendar');

    Route::resource('/pengurus', PengurusController::class)->except(['show', 'create']);
    Route::resource('/divisi', DivisionController::class)->except(['show', 'create']);
    Route::resource('/proker', TaskController::class)->except(['show', 'create']);
    Route::resource('/seksi-seksi', SectionController::class)->except(['show', 'create']);
    Route::resource('/kepanitiaan', CommitteeController::class)->except(['show', 'create']);
});
