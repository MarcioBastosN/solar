<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\User;
use Exception;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use WireUi\Traits\Actions;

class ShowClienteProjet extends Component
{
    use Actions;
    public $projetos;

    public function mount(HttpRequest $request)
    {
        $this->projetos = User::find($request->cliente)->register()->with('statusRequest.status', 'possuiProjeto')->get();
    }

    public function export($path)
    {
        return Storage::disk('public')->download($path);
    }

    public function showObs($obs)
    {
        $this->dialog()->show([
            'title'       => 'Observação',
            'description' => $obs,
            'icon'        => 'info'
        ]);
    }

    public function trabalhar($projeto_id)
    {
        DB::beginTransaction();
        try {
            DB::transaction(fn () => Project::create([
                'manager_id' => auth()->user()->id,
                'user_request_id' => $projeto_id,
            ]));
        } catch (Exception $e) {
            DB::rollBack();
        }
        $this->notification()->success(
            $title = 'Registro realizado',
            $description = 'Você e o responsavel deste projeto'
        );
        DB::commit();
    }

    public function render()
    {
        return view('livewire.show-cliente-projet');
    }
}
