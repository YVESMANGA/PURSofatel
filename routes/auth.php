<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Bo\ImportController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

<<<<<<< HEAD



=======
>>>>>>> b6b4f3f1acbfcbbc50dbb2dd95d6d81f137130dc
    Route::get('Acceuil/bo', [AuthenticatedSessionController::class, 'acceuilBo'])
        ->name('acceuil.bo')
        ->middleware(['auth', 'role:bo']);
    
<<<<<<< HEAD
    Route::get('Acceuil/bo/importer', [AuthenticatedSessionController::class, 'acceuilBo'])
        ->name('acceuil.bo.importer')
        ->middleware(['auth', 'role:bo']);

    Route::get('/fichiers/{id}/visualiser', [ImportController::class, 'visualiser'])
    ->name('fichiers.visualiser')
    ->middleware(['auth', 'role:bo']);

    Route::get('/fichiers/{id}/dispatch', [ImportController::class, 'dispatch'])
    ->name('fichiers.dispatch')
    ->middleware(['auth', 'role:bo']);
    
    
=======
>>>>>>> b6b4f3f1acbfcbbc50dbb2dd95d6d81f137130dc

    Route::get('Acceuil/chef_zone', [AuthenticatedSessionController::class, 'acceuilChef_zone'])
        ->name('acceuil.chef_zone')
        ->middleware(['auth', 'role:chef_zone']);
    Route::get('Acceuil/technicien', [AuthenticatedSessionController::class, 'acceuilTechnicien'])
        ->name('acceuil.technicien');

});
