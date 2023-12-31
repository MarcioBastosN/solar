<?php

namespace App\Http\Livewire;

use App\Models\faturas_uc;
use App\Models\Project;
use App\Models\Register;
use App\Models\StatusProjet;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class ShowProjectUser extends Component
{
    use WithPagination, Actions;

    public $infoProjet, $statusProjeto, $projeto;

    public $cardDetalhes = false;
    public $cardReenvio = false;

    public $projetoSelecionado;

    public function mount()
    {
        $this->statusProjeto = StatusProjet::all();
    }

    public function detalhes($id)
    {
        $this->infoProjet = Project::where('user_request_id', $id)->get();
    }

    public function filedownload($docuemnto)
    {
        return Storage::disk('public')->download($docuemnto);
    }

    public function export($path)
    {
        return Storage::disk('public')->download($path);
    }


    public function paginaArquivosCliente($id)
    {
        return redirect()->route('cliente.documentos.correcao', $id);
    }


    public function exbibeDetalhes($id)
    {
        $this->projetoSelecionado = $id;
        if ($this->cardReenvio) {
            $this->cardReenvio = false;
        }
        $this->cardDetalhes = true;
        $this->projeto = Register::find($id);
    }

    public function showObs($obs)
    {
        $this->dialog()->show([
            'title'       => 'Observação',
            'description' => $obs,
            'icon'        => 'info'
        ]);
    }

    public function render()
    {
        $register = auth()->user()->register()->with('validaDocumentos.status')->orderBy('created_at', 'DESC')->paginate(2);
        $pendencia = auth()->user()->pendencia;
        return view('livewire.show-project-user')->with(compact('register', 'pendencia'));
    }
}
