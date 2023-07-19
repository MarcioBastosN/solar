<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\{
    HomeUser,
    ShowClienteProjet,
    ShowDijuntor,
    ShowProjectUser,
    ShowStatusProject,
    ShowUsers,
};
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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])
    ->prefix('cliente')
    ->group(function () {
        Route::get('/home', HomeUser::class)->name('cliente.home');
        Route::get('/projects', ShowProjectUser::class)->name('cliente.porjects');
    });

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dijuntor', ShowDijuntor::class)->name('admin.dijuntor');
        Route::get('/clientes', ShowUsers::class)->name('admin.clientes');
        Route::get('/clienteProject', ShowClienteProjet::class)->name('admin.cliente.project');
        Route::get('/statusProjet', ShowStatusProject::class)->name('admin.status.project');
    });

require __DIR__ . '/auth.php';
