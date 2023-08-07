<?php

namespace App\Http\Livewire;

use App\Models\DadosProject;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class EditarDocumentoEtapa extends Component
{

    use Actions, WithFileUploads;

    public $idProjeto, $idStatus;

    public function mount($projeto, $status)
    {
        $this->idProjeto = $projeto;
        $this->idStatus = $status;
    }

    public function trocarDocumento($docuemnto_id)
    {
        //
    }

    public function infoApagarDocumento()
    {
        //
    }

    public function apagarDocumento($docuemnto_id)
    {
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
