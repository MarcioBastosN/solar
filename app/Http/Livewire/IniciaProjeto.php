<?php

namespace App\Http\Livewire;

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

    public function trocarFase()
    {
        DB::beginTransaction();
        try {
            DB::commit();
        } catch (Exception $e) {
            $this->notification()->error(
                $title = "Ops!, algo deu errado",
                $description = $e->getMessage(),
            );
            DB::rollBack();
        }
        DB::commit();
        $this->notification()->success(
            $title = "Sucesso",
            $description = "Fase alterada"
        );
    }

    public function render()
    {
        $projeto = Register::find($this->register_id);
        return view('livewire.inicia-projeto')->with(compact('projeto'));
    }
}
