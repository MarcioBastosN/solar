<?php

namespace App\Http\Livewire;

use App\Models\StatusDocumentos;
use App\Models\StatusProjet;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use WireUi\Traits\Actions;

class ShowStatusProject extends Component
{

    use Actions;

    public $id_selecionado, $value;

    public function showEditStatusProject($id)
    {
        $selecionado = StatusProjet::find($id);
        $this->id_selecionado = $selecionado->id;
        $this->value = $selecionado->label;
    }

    public function showEditStatusDoc($id)
    {
        $selecionado = StatusDocumentos::find($id);
        $this->id_selecionado = $selecionado->id;
        $this->value = $selecionado->label;

    }

    public function editarProjeto($id)
    {
        DB::beginTransaction();
        try {
            DB::transaction(fn () => StatusProjet::find($id)->update(['label' => $this->value]));
            $this->notification()->success(
                $title = 'Sucesso',
                $description = 'Projeto alterado'
            );
            DB::commit();
        } catch (Exception $e) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'projeto '.$e->getMessage()
            );
            DB::rollBack();
        }

    }

    public function editarDoc($id)
    {
        DB::beginTransaction();
        try {
            DB::transaction(fn () => StatusDocumentos::find($id)->update(['label' => $this->value]));
            $this->notification()->success(
                $title = 'Sucesso',
                $description = 'Registro alterado'
            );
        } catch (Exception $e) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'Registro '.$e->getMessage()
            );
            DB::rollBack();
        }
        DB::commit();
        $this->render();
    }



    public function render()
    {
        $statusProject = StatusProjet::all();
        $statusDocumentos = StatusDocumentos::all();
        return view('livewire.show-status-project')->with(compact('statusProject', 'statusDocumentos'));
    }
}
