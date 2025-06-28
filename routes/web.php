<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementController;
use App\Models\Evenement;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'role:organisateur'])->group(function () {
    Route::get('/orga', function () {
        return view('organisateur.dashboard');
    })->name('organisateur.dashboard');
});
Route::middleware(['auth', 'role:organisateur'])->group(function () {
    Route::resource('/evenements', EvenementController::class);
});
Route::get('/evenements', function () {
    $evenements = Evenement::latest()->get();
    return view('evenements.index', compact('evenements'));
});
Route::get('/evenements', function () {
    $evenements = \App\Models\Evenement::latest()->get();
    return view('evenements.public', compact('evenements'));
});
Route::get('/public-events', function () {
    $evenements = \App\Models\Evenement::latest()->get();
    return view('evenements.public', compact('evenements'));
});

require __DIR__.'/auth.php';
