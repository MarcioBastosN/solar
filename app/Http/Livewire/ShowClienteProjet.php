<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\User;
use App\Models\ValidaDocumento;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use WireUi\Traits\Actions;

class ShowClienteProjet extends Component
{
    use Actions;
    public $user_id;

    public function mount($id)
    {
        $this->user_id = $id;
    }

    public function export($path)
    {
        return Storage::disk('public')->download($path);
    }

    public function validar($documento, $registro)
    {
        $this->dialog()->confirm([
            'title'       => 'Altera status do Documento',
            'description' => 'aprove ou rejeite o Documento',
            'icon'        => 'info',
            'accept'      => [
                'label'  => 'Aprovar arquivo',
                'method' => 'valide',
                'params' => [$documento, $registro, 3],
            ],
            'reject' => [
                'label'  => 'Rejeitar arquivo',
                'method' => 'valide',
                'params' => [$documento, $registro, 2],
            ],
        ]);
    }

    public function valide($documento, $registro, $status)
    {
        DB::beginTransaction();
        try {
            DB::transaction(fn () => ValidaDocumento::where('register_id', $registro)->where('documento', 'ilike', "%" . $documento . "%")->update(['status_id' => $status]));
        } catch (Exception $e) {
            DB::rollBack();
        }
        DB::commit();
        $this->render();
    }

    public function cancel($documento, $registro)
    {
        dd("rejeitar", $documento, $registro);
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
        $this->render();
    }

    public function render()
    {
        $projetos = User::find($this->user_id)->register()->with('statusRequest.status', 'possuiProjeto')->get();
        return view('livewire.show-cliente-projet')->with(compact('projetos'));
    }
}
