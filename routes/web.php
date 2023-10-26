<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SMSController;
use App\Http\Livewire\{
    EditarDocumentoEtapa,
    HomeUser,
    IniciaProjeto,
    ShowClienteProjet,
    ShowDijuntor,
    ShowProjectUser,
    ShowStatusProject,
    ShowUsers,
    UpdateDocumentos,
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
})->name('welcome');


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
        Route::get('/documento/corrige/{id}', UpdateDocumentos::class)->name('cliente.documentos.correcao');
    });

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/disjuntor', ShowDijuntor::class)->name('admin.disjuntor');
        Route::get('/clientes', ShowUsers::class)->name('admin.clientes');
        Route::get('/clienteProject/{user_id}', ShowClienteProjet::class)->name('admin.cliente.project');
        Route::get('/statusProjet', ShowStatusProject::class)->name('admin.status.project');
        Route::get('/iniciaProjeto/{id}', IniciaProjeto::class)->name('admin.start.project');
        Route::get('/editarDocumentoEtapa/{projeto}/{status}', EditarDocumentoEtapa::class)->name('admin.editar.documento');
    });


Route::get('/send-sms', function () {
    $teste = (new SMSController('whatsapp:+5593991753545', "Vai ... fdm !!"));
    return $teste->sendSMS();
});

require __DIR__ . '/auth.php';
