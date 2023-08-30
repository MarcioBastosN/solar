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

    public $disjuntores, $name;

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
        $this->mount();
    }

    public function mount()
    {
        $this->disjuntores = Dijuntor::all();
    }

    public function render()
    {
        return view('livewire.show-dijuntor');
    }
}
