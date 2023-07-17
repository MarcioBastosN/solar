<?php

namespace App\Http\Livewire;

use App\Models\Dijuntor;
use App\Models\Register;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class HomeUser extends Component
{

    use WithFileUploads;
    //controller exibir campos da view
    public $exibir_empresa;

    // arquivos
    public $rg_cnh, $cnpj, $procuracao, $fatura_da_uc, $padrao_de_entrada;
    // nao obrigatorios
    public $kwp, $fotovoltaico, $inversor, $datasheet, $telefone, $kit_id;
    //

    protected $rules = [
        'rg_cnh' => 'max:1024',
        'cnpj' => 'max:1024',
        'telefone' => "required|min:10",
    ];

    protected $messages = [
        'rg_cnh.max' => 'Arquivo e maior que 1 mb',
        'cnpj.max' => 'Arquivo e maior que 1 mb',

        'telefone.required' => 'Necessario informar o telefone',
        'telefone.min' => 'Telefone deve ter no minimo 11 digitos'
    ];

    public function trocaStatus()
    {
        $this->exibir_empresa = !$this->exibir_empresa;
    }

    public function save()
    {
        $caminho = "documentos/" . auth()->user()->id;
        $this->validate();
        $rg_path = null;
        $cnpj_path = null;
        if (!empty($this->rg_cnh)) {
            $rg_path = $this->rg_cnh->store($caminho);
        }
        if (!empty($this->cnpj)) {
            $cnpj_path = $this->cnpj->store($caminho);
        }
        // 1 passo salvar documentos (tabela Register)
        DB::beginTransaction();
        try {
            DB::transaction(fn () => Register::create([
                'user_id' => auth()->user()->id,
                'rg_cnh' => $rg_path,
                'cnpj' => $cnpj_path,
            ]));
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
        DB::commit();
        return redirect()->route('cliente.porjects');
    }

    public function render()
    {
        $dijuntores = Dijuntor::all();
        return view('livewire.home-user')->with(compact('dijuntores'));
    }
}
