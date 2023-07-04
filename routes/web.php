<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\{
    ShowUser,
    ShowDijuntor,
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', ShowUser::class)->name('dashboard');
    Route::get('/dijuntor', ShowDijuntor::class)->name('dijuntor');
    Route::get('/usuarios', ShowUsers::class)->name('usuarios');
});

require __DIR__ . '/auth.php';
