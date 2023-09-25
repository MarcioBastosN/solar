<?php

namespace App\Http\Livewire;

use App\Mail\EmailController;
use App\Models\DadosProject;
use App\Models\Register;
use App\Models\StatusProjet;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class IniciaProjeto extends Component
{
    use Actions, WithFileUploads;

    public $register_id, $statusProjeto;
    public $faseProjeto, $documento = [], $obs;

    // id - registro_id
    public function mount($id)
    {
        $this->register_id = $id;
        $this->statusProjeto = StatusProjet::all();
    }

    protected $rules = [
        'documento.*' => 'max:1024',
    ];

    protected $messages = [
        'documento.*.max' => 'Um ou mais Arquivos é maior que 1 mb',
    ];

    public function trocarFase()
    {
        $this->validate(
            ['faseProjeto' => 'required',],
            ['faseProjeto.required' => 'Necessario Selecionar uma fase do projeto',]
        );

        $id_projeto = Register::find($this->register_id)->possuiprojeto->id;
        DB::beginTransaction();
        try {
            DB::transaction(fn () => DadosProject::create([
                'projects_id' => $id_projeto,
                'status_project_id' => $this->faseProjeto
            ]));
        } catch (Exception $e) {
            $this->notification()->error(
                $title = "Ops!, algo deu errado",
                $description = $e->getMessage(),
            );
            DB::rollBack();
        }
        DB::commit();
        $fase = StatusProjet::find($this->faseProjeto)->label;
        $this->notification()->success(
            $title = "Sucesso",
            $description = "Fase alterada: " . $fase
        );
    }

    public function updated($documento)
    {
        $this->validateOnly($documento);
    }

    public function novoRegistro()
    {
        $registro = Register::find($this->register_id);
        $id_projeto = $registro->possuiprojeto->id;
        $fase = $registro->dadosProject->last()->status->id;

        $this->validate();
        if (!empty($this->documento) || !empty($this->obs)) {

            DB::beginTransaction();
            try {
                $caminho = "arquivos/";
                if (!empty($this->documento)) {
                    foreach ($this->documento as $documento) {
                        $documentoPath = $documento->store($caminho);
                        DB::transaction(fn () => DadosProject::create([
                            'projects_id' => $id_projeto,
                            'status_project_id' => $fase,
                            'documento' => $documentoPath,
                        ]));
                    }
                    if (!empty($this->obs)) {
                        DB::transaction(fn () => DadosProject::create([
                            'projects_id' => $id_projeto,
                            'status_project_id' => $fase,
                            'notas' => $this->obs,
                        ]));
                    }
                } else {
                    if (!empty($this->obs)) {
                        DB::transaction(fn () => DadosProject::create([
                            'projects_id' => $id_projeto,
                            'status_project_id' => $fase,
                            'notas' => $this->obs,
                        ]));
                    }
                }
            } catch (Exception $e) {
                DB::rollBack();
                $this->notification()->error(
                    $title = "Ops!, algo deu errado",
                    $description = $e->getMessage(),
                );
            }
            DB::commit();
            $this->obs = null;
            $this->documento = null;

            $this->notification()->success(
                $title = "Sucesso",
                $description = "etapa registrada",
            );

            $destinatario = Register::find($this->register_id);
            try {
                Mail::to(auth()->user()->email, "Solar-Project")->send(new EmailController([
                    'fromName' => $destinatario->user->name,
                    'fromEmail' => $destinatario->user->email,
                    'subject' => "Houve uma alteração nas etapas do projeto na fase de:",
                    'message' => $destinatario->dadosProject->last()->status->label,
                ]));
            } catch (Exception $e) {
                $this->notification()->error(
                    $title = "Error",
                    $description = "Error envio do E-mail"
                );
            }
        } else {
            $this->notification()->error(
                $title = "Ops!",
                $description = "informe um documento ou anotação",
            );
        }
    }

    public function filedownload($docuemnto)
    {
        return Storage::disk('public')->download($docuemnto);
    }

    public function editarDocumentos($project_id, $status_id)
    {
        return redirect()->route('admin.editar.documento', [$project_id, $status_id]);
    }

    public function render()
    {
        $projeto = Register::find($this->register_id);
        $dados = DadosProject::where('projects_id', $this->register_id)
            ->where(function ($query) {
                $query->where('documento', '!=', null)
                    ->orWhere('notas', '<>', null);
            })->get();
        return view('livewire.inicia-projeto')->with(compact('projeto', 'dados'));
    }
}
