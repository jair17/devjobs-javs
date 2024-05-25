<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacantController;
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

Route::get('/', HomeController::class)->name('home');

Route::get('vacantes/{vacant:title}/show', [VacantController::class,'show'])->name('vacants.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/notificaciones', NotificationController::class)->name('notifications');
    Route::controller(ProfileController::class)
        ->as('profile.')
        ->prefix('perfil')
        ->group(function () {
            Route::get('/', 'edit')
                ->name('edit');
            Route::patch('/', 'update')
                ->name('update');
            Route::delete('/', 'destroy')
                ->name('destroy');
        });
    Route::controller(VacantController::class)
        ->as('vacants.')
        ->prefix('vacantes')
        ->group(function () {
            Route::get('/', 'index')
                ->middleware('recluiter.role')
                ->name('index');
            Route::get('/create', 'create')
                ->name('create');
            route::get('/{vacant}/edit', 'edit')
                ->name('edit');
            route::put('{vacant}/update', 'update')
                ->name('update');
        });
    Route::controller(ApplicantController::class)
        ->as('applicants.')
        ->prefix('candidatos')
        ->group(function () {
            Route::get('/{vacant}',
                'index')
                ->name('index');
        });
});

require __DIR__ . '/auth.php';
