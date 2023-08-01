<?php

namespace App\Http\Livewire;

use App\Models\DadosProject;
use App\Models\Register;
use App\Models\StatusProjet;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class IniciaProjeto extends Component
{
    use Actions, WithFileUploads;

    public $register_id, $statusProjeto;
    public $faseProjeto;

    // id - registro_id
    public function mount($id)
    {
        $this->register_id = $id;
        $this->statusProjeto = StatusProjet::all();
    }

    protected $rules = [
        'faseProjeto' => 'required'
    ];

    protected $messages = [
        'faseProjeto.required' => 'Necessario Selecionar uma fase do projeto'
    ];

    public function trocarFase()
    {
        $this->validate();

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

    public function render()
    {
        $projeto = Register::find($this->register_id);
        return view('livewire.inicia-projeto')->with(compact('projeto'));
    }
}
