<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Bo\ImportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChefZoneController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/importer-demandes', [ImportController::class, 'showForm'])->name('demandes.form');
Route::post('/importer-demandes', [ImportController::class, 'import'])->name('demandes.import');
});



Route::get('/importer-demandes', [ImportController::class, 'showForm'])->name('demandes.form');
Route::post('/importer-demandes', [ImportController::class, 'import'])->name('demandes.import');

Route::get('/chef-zone', [ChefZoneController::class, 'index'])->name('chefZone.index');
Route::post('/chef-zone/affecter', [ChefZoneController::class, 'affecter'])->name('chefZone.affecter');
Route::get('/chef-zone/equipes', [ChefZoneController::class, 'equipes'])->name('chefZone.equipes');



require __DIR__.'/auth.php';
