<?php

namespace App\Http\Livewire;

use App\Models\DadosProject;
use App\Models\Project;
use App\Models\StatusProjet;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class EditarDocumentoEtapa extends Component
{

    use Actions, WithFileUploads;

    public $idProjeto, $idStatus, $dadosProjeto, $status;
    public $exibeCampoEditarNota = false, $idNota, $valorNota;


    public function mount($projeto, $status)
    {
        $this->idProjeto = $projeto;
        $this->idStatus = $status;
        $this->dadosProjeto = Project::with('contratante.customer')->find($projeto);
        $this->status = StatusProjet::find($status);
    }

    public function export($path)
    {
        return Storage::disk('public')->download($path);
    }

    public function editarNota($nota)
    {
        $this->idNota = $nota;
        $this->exibeCampoEditarNota = true;
        $this->valorNota =  DadosProject::find($nota)->notas;
    }

    public function alteraNota()
    {
        DB::beginTransaction();
        try {
            DB::transaction(fn () => DadosProject::where('id', $this->idNota)->update(['notas' => $this->valorNota]));
        } catch (Exception $e) {
            DB::rollBack();
            $this->notification()->error($title = "Error", $description = "Nota não foi alterada!");
        }
        DB::commit();
        $this->ocultarNota();

        $this->notification()->success($title = "Sucesso", $description = "Nota editada");
    }

    public function ocultarNota()
    {
        $this->exibeCampoEditarNota = false;
        $this->idNota = null;
        $this->valorNota = '';
    }

    public function infoApagarDocumento($documento_id)
    {
        $this->dialog()->confirm([
            'title'       => 'Deseja apagar esse documento?',
            'description' => 'confirme uma ação',
            'icon'        => 'info',
            'accept'      => [
                'label'  => 'Apagar',
                'method' => 'apagarDocumento',
                'params' => [$documento_id],
            ],
            'reject' => [
                'label'  => 'Manter documento',
                'method' => 'infoManter',
            ],
        ]);
    }

    public function infoManter()
    {
        return $this->notification()->success($title = "Documento não alterado");
    }

    public function apagarDocumento($documento_id)
    {
        DB::beginTransaction();
        try {
            $arquivo = DadosProject::where('id', $documento_id);
            DB::transaction(fn () => $arquivo->delete());
        } catch (Exception $e) {
            DB::rollBack();
            $this->notification()->error($title = "Error", $description = "Documento não apagado!");
        }
        DB::commit();

        $this->notification()->success($title = "Sucesso", $description = "Ducumento apagado");
    }


    public function render()
    {
        $project = DadosProject::where(function ($query) {
            $query->where('projects_id', $this->idProjeto)
                ->where('status_project_id', $this->idStatus);
        })->where(function ($query) {
            $query->where('documento', '!=', null)
                ->orWhere('notas', '<>', null);
        })->get();
        return view('livewire.editar-documento-etapa')->with(compact('project'));
    }
}
