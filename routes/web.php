<?php

use App\Http\Controllers\DivisionController;
use App\Http\Controllers\PengurusController;
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

Route::get('/dashboard', function () {
    return view('dashboard', [
        'title' => 'Dashboard'
    ]);
})->name('dashboard');

Route::get('/home', function () {
    return view('home', [
        'title' => 'Home'
    ]);
})->name('home');

Route::middleware('guest')->group(function () {
    Route::resource('/pengurus', PengurusController::class)->except(['show', 'create']);
    Route::resource('/divisi', DivisionController::class)->except(['show', 'create']);
});
