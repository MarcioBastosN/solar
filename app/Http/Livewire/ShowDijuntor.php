<?php

namespace App\Http\Livewire;

use App\Models\Dijuntor;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use WireUi\Traits\Actions;

class ShowDijuntor extends Component
{

    use Actions;

    public $name, $selecionado, $new_value, $id_selcionado;

    protected $rules = [
        'name' => 'required',
    ];

    protected $messages = [
        'name.required' => "Nome e Obrigatório",
    ];

    public function save()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            DB::transaction(fn () => Dijuntor::create(['name' => $this->name]));
        } catch (Exception $e) {
            DB::rollBack();
            $this->notification()->error(
                $title = 'Error !!!',
                $description = 'Não foi possivel salvar'
            );
        }
        DB::commit();
        $this->name = '';
        $this->notification()->success(
            $title = 'Sucesso',
            $description = 'Registro salvo'
        );
        // $this->mount();
        $this->render();
    }

    public function mount()
    {
        // $this->disjuntores = Dijuntor::all();
    }

    public function showEditar($id)
    {
        $this->selecionado = Dijuntor::find($id);
        $this->new_value = $this->selecionado->name;
        $this->id_selcionado = $this->selecionado->id;
    }

    public function editar($id){
        try {
            DB::beginTransaction();
            DB::transaction(fn () => Dijuntor::find($id)->update(['name' => $this->new_value]));
            DB::commit();
            $this->notification()->success(
                $title = 'Sucesso',
                $description = 'Registro alterado'
            );
        } catch (Exception $e) {
            DB::rollBack();
            $this->notification()->error(
                $title = 'Error',
                $description = 'Registro não editado'
            );
        }

        $this->render();

    }

    public function render()
    {
        $disjuntores = Dijuntor::all();
        return view('livewire.show-dijuntor')->with(compact('disjuntores'));
    }
}
