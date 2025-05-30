<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Bo\ImportController;
use Illuminate\Support\Facades\Route;

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



Route::get('/importer-demandes', [ImportController::class, 'showForm'])->name('demandes.form');
Route::post('/importer-demandes', [ImportController::class, 'import'])->name('demandes.import');

require __DIR__.'/auth.php';
